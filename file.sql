--Phase 1 — Create the Database (DDL)
--Open MySQL Workbench, create a schema called smart_parking, and run this:

CREATE DATABASE smart_parking;
USE smart_parking;

-- 1. Parking rates (locality-wise, Chandigarh)
CREATE TABLE Parking_Rate (
    rate_id INT PRIMARY KEY AUTO_INCREMENT,
    locality VARCHAR(100) NOT NULL,
    rate_per_hour DECIMAL(6,2) NOT NULL
);

-- 2. Parking areas
CREATE TABLE Parking_Area (
    area_id INT PRIMARY KEY AUTO_INCREMENT,
    area_name VARCHAR(100) NOT NULL,
    location VARCHAR(150) NOT NULL,
    rate_id INT NOT NULL,
    FOREIGN KEY (rate_id) REFERENCES Parking_Rate(rate_id)
);

-- 3. Parking slots
CREATE TABLE Parking_Slot (
    slot_id INT PRIMARY KEY AUTO_INCREMENT,
    slot_status ENUM('available','occupied') DEFAULT 'available',
    area_id INT NOT NULL,
    FOREIGN KEY (area_id) REFERENCES Parking_Area(area_id)
);

-- 4. User login
CREATE TABLE User_Login (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    user_type ENUM('admin','staff','user') DEFAULT 'user'
);

-- 5. Vehicle (master table, just number plates)
CREATE TABLE Vehicle (
    vehicle_number VARCHAR(20) PRIMARY KEY
);

-- 6. Vehicle entry log
CREATE TABLE Vehicle_Entry (
    entry_id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_number VARCHAR(20) NOT NULL,
    slot_id INT NOT NULL,
    user_id INT,
    entry_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_number) REFERENCES Vehicle(vehicle_number),
    FOREIGN KEY (slot_id) REFERENCES Parking_Slot(slot_id),
    FOREIGN KEY (user_id) REFERENCES User_Login(user_id)
);

-- 7. Vehicle exit log
CREATE TABLE Vehicle_Exit (
    exit_id INT PRIMARY KEY AUTO_INCREMENT,
    entry_id INT NOT NULL UNIQUE,
    exit_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(8,2),
    FOREIGN KEY (entry_id) REFERENCES Vehicle_Entry(entry_id)
);

-- 8. Valet / advance reservations
CREATE TABLE Valet_Reservation (
    reservation_id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_number VARCHAR(20) NOT NULL,
    slot_id INT NOT NULL,
    reservation_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_number) REFERENCES Vehicle(vehicle_number),
    FOREIGN KEY (slot_id) REFERENCES Parking_Slot(slot_id)
);

-- 9. Parking history (billing summary)
CREATE TABLE Parking_History (
    history_id INT PRIMARY KEY AUTO_INCREMENT,
    entry_id INT NOT NULL,
    amount_paid DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (entry_id) REFERENCES Vehicle_Entry(entry_id)
);

--Phase 2 — Insert Sample Data (Chandigarh)
-- Parking rates by locality
INSERT INTO Parking_Rate (locality, rate_per_hour) VALUES
('Sector 17 - City Centre',    30.00),
('Sector 22 - Commercial',     25.00),
('Sector 43 - ISBT',           20.00),
('Sector 8 - Medical Hub',     35.00),
('Sector 35 - Market',         22.00);

-- Parking areas in Chandigarh
INSERT INTO Parking_Area (area_name, location, rate_id) VALUES
('Piccadilly Square Parking',   'Sector 17, Chandigarh', 1),
('Elante Mall Parking',         'Industrial Area Phase 1, Chandigarh', 2),
('ISBT Parking Complex',        'Sector 43, Chandigarh', 3),
('PGIMER Parking',              'Sector 12, Chandigarh', 4),
('Sector 35 Market Parking',    'Sector 35, Chandigarh', 5),
('Rose Garden Parking',         'Sector 16, Chandigarh', 1);

-- Slots (3–4 per area)
INSERT INTO Parking_Slot (slot_status, area_id) VALUES
('available', 1), ('occupied', 1), ('available', 1),
('available', 2), ('occupied', 2), ('available', 2), ('available', 2),
('available', 3), ('available', 3), ('occupied', 3),
('occupied', 4),  ('available', 4), ('available', 4),
('available', 5), ('occupied', 5),
('available', 6), ('available', 6), ('occupied', 6);

-- Users
INSERT INTO User_Login (username, password, user_type) VALUES
('admin_chd',   'admin@123',   'admin'),
('staff_elante','staff@456',   'staff'),
('staff_isbt',  'staff@789',   'staff'),
('rahul_verma', 'rahul@chd',   'user'),
('priya_singh', 'priya@chd',   'user'),
('amit_sharma', 'amit@chd',    'user'),
('neha_kapoor', 'neha@chd',    'user');

-- Vehicles (PB = Punjab plates, CH = Chandigarh)
INSERT INTO Vehicle (vehicle_number) VALUES
('CH01AB1234'), ('PB10CD5678'), ('CH04EF9012'),
('PB65GH3456'), ('HR26IJ7890'), ('CH02KL2345'),
('PB08MN6789');

-- Entry logs
INSERT INTO Vehicle_Entry (vehicle_number, slot_id, user_id, entry_time) VALUES
('CH01AB1234', 2,  4, '2025-04-16 09:15:00'),
('PB10CD5678', 5,  5, '2025-04-16 10:30:00'),
('CH04EF9012', 10, 6, '2025-04-16 11:00:00'),
('PB65GH3456', 11, 7, '2025-04-16 12:45:00'),
('HR26IJ7890', 15, 4, '2025-04-16 14:00:00'),
('CH02KL2345', 18, 5, '2025-04-16 15:20:00');

-- Exit logs (for completed sessions)
INSERT INTO Vehicle_Exit (entry_id, exit_time, total_amount) VALUES
(1, '2025-04-16 11:15:00', 60.00),
(2, '2025-04-16 13:00:00', 62.50),
(3, '2025-04-16 14:30:00', 70.00);

-- Reservations
INSERT INTO Valet_Reservation (vehicle_number, slot_id, reservation_time) VALUES
('PB08MN6789', 1,  '2025-04-17 08:00:00'),
('CH01AB1234', 7,  '2025-04-17 09:30:00'),
('PB10CD5678', 9,  '2025-04-17 11:00:00'),
('HR26IJ7890', 14, '2025-04-17 13:00:00');

-- Parking history
INSERT INTO Parking_History (entry_id, amount_paid) VALUES
(1, 60.00), (2, 62.50), (3, 70.00);

--Phase 3 — Key SELECT Queries for Your Report
--These demonstrate JOINs, aggregates, subqueries — exactly what your report needs:
-- 1. All current vehicles with their slot and area
SELECT v.vehicle_number, pa.area_name, ps.slot_id, ve.entry_time
FROM Vehicle_Entry ve
JOIN Vehicle v ON ve.vehicle_number = v.vehicle_number
JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
JOIN Parking_Area pa ON ps.area_id = pa.area_id
LEFT JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id
WHERE vx.exit_id IS NULL;

-- 2. Total revenue per parking area
SELECT pa.area_name, SUM(vx.total_amount) AS total_revenue
FROM Vehicle_Exit vx
JOIN Vehicle_Entry ve ON vx.entry_id = ve.entry_id
JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
JOIN Parking_Area pa ON ps.area_id = pa.area_id
GROUP BY pa.area_name
ORDER BY total_revenue DESC;

-- 3. Available slot count per area
SELECT pa.area_name, COUNT(*) AS available_slots
FROM Parking_Slot ps
JOIN Parking_Area pa ON ps.area_id = pa.area_id
WHERE ps.slot_status = 'available'
GROUP BY pa.area_name;

-- 4. Parking duration and charge for each completed session
SELECT ve.vehicle_number,
       pa.area_name,
       ve.entry_time,
       vx.exit_time,
       TIMESTAMPDIFF(MINUTE, ve.entry_time, vx.exit_time) AS duration_mins,
       vx.total_amount
FROM Vehicle_Entry ve
JOIN Vehicle_Exit vx ON ve.entry_id = vx.entry_id
JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
JOIN Parking_Area pa ON ps.area_id = pa.area_id;

--Phase 4 — PL/SQL Components
--Stored Procedure — Record vehicle entry:

DELIMITER //
CREATE PROCEDURE RecordEntry(
    IN p_vehicle VARCHAR(20),
    IN p_slot_id INT,
    IN p_user_id INT
)
BEGIN
    INSERT INTO Vehicle_Entry (vehicle_number, slot_id, user_id)
    VALUES (p_vehicle, p_slot_id, p_user_id);
    
    UPDATE Parking_Slot SET slot_status = 'occupied'
    WHERE slot_id = p_slot_id;
    
    SELECT 'Entry recorded successfully' AS message;
END//
DELIMITER ;

--Function — Calculate parking charge:
DELIMITER //
CREATE FUNCTION CalcCharge(p_entry_id INT, p_exit_time DATETIME)
RETURNS DECIMAL(8,2)
DETERMINISTIC
BEGIN
    DECLARE v_hours DECIMAL(6,2);
    DECLARE v_rate  DECIMAL(6,2);
    DECLARE v_charge DECIMAL(8,2);
    
    SELECT TIMESTAMPDIFF(MINUTE, ve.entry_time, p_exit_time) / 60.0,
           pr.rate_per_hour
    INTO v_hours, v_rate
    FROM Vehicle_Entry ve
    JOIN Parking_Slot ps ON ve.slot_id = ps.slot_id
    JOIN Parking_Area pa ON ps.area_id = pa.area_id
    JOIN Parking_Rate pr ON pa.rate_id = pr.rate_id
    WHERE ve.entry_id = p_entry_id;
    
    SET v_charge = CEILING(v_hours) * v_rate;
    RETURN v_charge;
END//
DELIMITER ;

--Trigger — Auto-free slot on exit:
DELIMITER //
CREATE TRIGGER AfterVehicleExit
AFTER INSERT ON Vehicle_Exit
FOR EACH ROW
BEGIN
    DECLARE v_slot INT;
    
    SELECT slot_id INTO v_slot
    FROM Vehicle_Entry WHERE entry_id = NEW.entry_id;
    
    UPDATE Parking_Slot SET slot_status = 'available'
    WHERE slot_id = v_slot;
    
    INSERT INTO Parking_History (entry_id, amount_paid)
    VALUES (NEW.entry_id, NEW.total_amount);
END//
DELIMITER ;

--Transaction Example (ACID demo for report):
START TRANSACTION;

INSERT INTO Vehicle_Exit (entry_id, exit_time, total_amount)
VALUES (4, NOW(), CalcCharge(4, NOW()));

-- If no error:
COMMIT;

-- If something goes wrong, use:
-- ROLLBACK;