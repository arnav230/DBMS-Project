<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once 'includes/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {

    case 'stats':
        $stats = [];
        $r = $conn->query("SELECT COUNT(*) AS total FROM Parking_Slot");
        $stats['total_slots'] = $r->fetch_assoc()['total'];
        $r = $conn->query("SELECT COUNT(*) AS avail FROM Parking_Slot WHERE slot_status='available'");
        $stats['available'] = $r->fetch_assoc()['avail'];
        $stats['occupied'] = $stats['total_slots'] - $stats['available'];
        $r = $conn->query("SELECT IFNULL(SUM(vx.total_amount),0) AS rev FROM Vehicle_Exit vx WHERE DATE(vx.exit_time) = CURDATE()");
        $stats['today_revenue'] = $r->fetch_assoc()['rev'];
        $r = $conn->query("SELECT COUNT(*) AS active FROM Vehicle_Entry ve LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id WHERE vx.exit_id IS NULL");
        $stats['active_vehicles'] = $r->fetch_assoc()['active'];
        $r = $conn->query("SELECT IFNULL(SUM(total_amount),0) AS total FROM Vehicle_Exit");
        $stats['total_revenue'] = $r->fetch_assoc()['total'];
        echo json_encode(['success' => true, 'data' => $stats]);
        break;

    case 'areas':
        $sql = "SELECT pa.area_id, pa.area_name, pa.location,
                       pr.rate_per_hour, pr.locality,
                       COUNT(ps.slot_id) AS total_slots,
                       SUM(ps.slot_status = 'available') AS available_slots,
                       SUM(ps.slot_status = 'occupied')  AS occupied_slots
                FROM Parking_Area pa
                JOIN Parking_Rate pr ON pa.rate_id = pr.rate_id
                LEFT JOIN Parking_Slot ps ON pa.area_id = ps.area_id
                GROUP BY pa.area_id ORDER BY pa.area_name";
        $result = $conn->query($sql);
        $areas = [];
        while ($row = $result->fetch_assoc()) $areas[] = $row;
        echo json_encode(['success' => true, 'data' => $areas]);
        break;

    case 'slots':
        $area_id = intval($_GET['area_id'] ?? 0);
        $stmt = $conn->prepare("SELECT slot_id, slot_status FROM Parking_Slot WHERE area_id = ? ORDER BY slot_id");
        $stmt->bind_param('i', $area_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $slots = [];
        while ($row = $result->fetch_assoc()) $slots[] = $row;
        echo json_encode(['success' => true, 'data' => $slots]);
        break;

    case 'entry':
        $vehicle = strtoupper(trim($_POST['vehicle_number'] ?? ''));
        $slot_id = intval($_POST['slot_id'] ?? 0);
        $user_id = intval($_POST['user_id'] ?? 1);
        if (!$vehicle || !$slot_id) { echo json_encode(['success'=>false,'message'=>'Vehicle number and slot are required.']); break; }
        $r = $conn->query("SELECT slot_status FROM Parking_Slot WHERE slot_id = $slot_id");
        $slot = $r->fetch_assoc();
        if (!$slot || $slot['slot_status'] !== 'available') { echo json_encode(['success'=>false,'message'=>'Slot is not available.']); break; }
        $stmt = $conn->prepare("SELECT ve.entry_id FROM Vehicle_Entry ve LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id WHERE ve.vehicle_number = ? AND vx.exit_id IS NULL");
        $stmt->bind_param('s', $vehicle);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) { echo json_encode(['success'=>false,'message'=>'Vehicle is already parked inside.']); break; }
        $conn->query("INSERT IGNORE INTO Vehicle (vehicle_number) VALUES ('$vehicle')");
        $stmt = $conn->prepare("CALL RecordEntry(?, ?, ?)");
        $stmt->bind_param('sii', $vehicle, $slot_id, $user_id);
        if ($stmt->execute()) {
            echo json_encode(['success'=>true,'message'=>"Entry recorded for $vehicle"]);
        } else {
            echo json_encode(['success'=>false,'message'=>'Error: '.$conn->error]);
        }
        break;

    case 'exit':
        $vehicle = strtoupper(trim($_POST['vehicle_number'] ?? ''));
        if (!$vehicle) { echo json_encode(['success'=>false,'message'=>'Vehicle number required.']); break; }
        $stmt = $conn->prepare("SELECT ve.entry_id, ve.entry_time, pa.area_name, pr.rate_per_hour
                                FROM Vehicle_Entry ve LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id
                                JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
                                JOIN Parking_Area pa ON ps.area_id = pa.area_id
                                JOIN Parking_Rate pr ON pa.rate_id = pr.rate_id
                                WHERE ve.vehicle_number = ? AND vx.exit_id IS NULL");
        $stmt->bind_param('s', $vehicle);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) { echo json_encode(['success'=>false,'message'=>'No active session found for this vehicle.']); break; }
        $entry = $result->fetch_assoc();
        $entry_id = $entry['entry_id'];
        $now = date('Y-m-d H:i:s');
        $r = $conn->query("SELECT CalcCharge($entry_id, '$now') AS charge");
        $charge = $r->fetch_assoc()['charge'];
        $stmt = $conn->prepare("INSERT INTO Vehicle_Exit (entry_id, exit_time, total_amount) VALUES (?, ?, ?)");
        $stmt->bind_param('isd', $entry_id, $now, $charge);
        if ($stmt->execute()) {
            $mins = round((strtotime($now) - strtotime($entry['entry_time'])) / 60);
            echo json_encode(['success'=>true,'message'=>'Exit recorded','vehicle'=>$vehicle,'area'=>$entry['area_name'],'entry_time'=>$entry['entry_time'],'exit_time'=>$now,'duration_mins'=>$mins,'charge'=>$charge]);
        } else {
            echo json_encode(['success'=>false,'message'=>'Error: '.$conn->error]);
        }
        break;

    case 'live':
        $sql = "SELECT ve.vehicle_number, pa.area_name, ps.slot_id, ve.entry_time,
                       TIMESTAMPDIFF(MINUTE, ve.entry_time, NOW()) AS minutes_parked, pr.rate_per_hour
                FROM Vehicle_Entry ve LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id
                JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
                JOIN Parking_Area pa ON ps.area_id = pa.area_id
                JOIN Parking_Rate pr ON pa.rate_id = pr.rate_id
                WHERE vx.exit_id IS NULL ORDER BY ve.entry_time DESC";
        $result = $conn->query($sql);
        $vehicles = [];
        while ($row = $result->fetch_assoc()) $vehicles[] = $row;
        echo json_encode(['success'=>true,'data'=>$vehicles]);
        break;

    case 'history':
        $limit = intval($_GET['limit'] ?? 20);
        $sql = "SELECT ve.vehicle_number, pa.area_name, ve.entry_time, vx.exit_time,
                       TIMESTAMPDIFF(MINUTE, ve.entry_time, vx.exit_time) AS duration_mins, vx.total_amount
                FROM Vehicle_Exit vx JOIN Vehicle_Entry ve ON vx.entry_id = ve.entry_id
                JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
                JOIN Parking_Area pa ON ps.area_id = pa.area_id
                ORDER BY vx.exit_time DESC LIMIT ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $history = [];
        while ($row = $result->fetch_assoc()) $history[] = $row;
        echo json_encode(['success'=>true,'data'=>$history]);
        break;

    case 'revenue':
        $sql = "SELECT pa.area_name, COUNT(vx.exit_id) AS total_sessions,
                       IFNULL(SUM(vx.total_amount), 0) AS revenue
                FROM Parking_Area pa
                LEFT JOIN Parking_Slot ps ON pa.area_id = ps.area_id
                LEFT JOIN Vehicle_Entry ve ON ps.slot_id = ve.slot_id
                LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id
                GROUP BY pa.area_id ORDER BY revenue DESC";
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        echo json_encode(['success'=>true,'data'=>$data]);
        break;

    default:
        echo json_encode(['success'=>false,'message'=>'Unknown action.']);
}
$conn->close();
?>
