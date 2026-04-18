# Smart Parking Management System — Setup Guide

## Tech Stack
- **Backend**: PHP 7.4+
- **Database**: MySQL 8.0 (via MySQL Workbench)
- **Frontend**: HTML5 + Vanilla JS (no framework needed)
- **Local Server**: XAMPP (recommended for Windows)

---

## Step 1 — Install XAMPP

1. Download XAMPP from https://www.apachefriends.org
2. Install and open the XAMPP Control Panel
3. Start **Apache** and **MySQL**

---

## Step 2 — Place Project Files

Copy the project folder to XAMPP's web root:

```
C:\xampp\htdocs\smart_parking\
├── index.php       ← Main website (all pages)
├── api.php         ← Backend API (handles all DB calls)
├── db.php          ← Database connection config
└── SETUP.md        ← This file
```

---

## Step 3 — Configure Database Connection

Open `db.php` and update these lines if needed:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');          // Your MySQL password (blank by default in XAMPP)
define('DB_NAME', 'smart_parking');
```

---

## Step 4 — Import Database

Make sure you have already run all Phase 1–4 SQL from your report:
- All CREATE TABLE statements
- All INSERT sample data (Chandigarh locations)
- All stored procedures, functions, triggers

Verify in MySQL Workbench:
```sql
USE smart_parking;
SHOW TABLES;
-- Should show: Parking_Rate, Parking_Area, Parking_Slot,
--              User_Login, Vehicle, Vehicle_Entry,
--              Vehicle_Exit, Valet_Reservation, Parking_History
```

---

## Step 5 — Run the Website

Open your browser and go to:
```
http://localhost/smart_parking/
```

---

## Pages Available

| Page | URL (tab) | Description |
|------|-----------|-------------|
| Dashboard | Default | Live stats, area cards, active vehicles |
| Entry/Exit | Entry / Exit tab | Record new entries, process exits, view bill |
| Slot Map | Slot Map tab | Visual grid of all slots per area |
| History | History tab | Filter past sessions by date |
| Reports | Reports tab | Revenue per area with bar charts |

---

## API Endpoints (for reference)

All calls go to `api.php?action=...`

| Action | Method | Description |
|--------|--------|-------------|
| `stats` | GET | Dashboard numbers |
| `areas` | GET | All areas with availability |
| `slots` | GET + `area_id` | Slot status for one area |
| `active` | GET | Currently parked vehicles |
| `entry` | POST | Record new vehicle entry |
| `exit` | POST + `entry_id` | Process exit + calculate bill |
| `history` | GET | Past 50 sessions |
| `revenue` | GET | Area-wise revenue report |

---

## Troubleshooting

**Blank page / PHP errors**: Enable error reporting in php.ini or add to db.php:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

**"Connection failed"**: Check MySQL is running in XAMPP and password matches.

**No data showing**: Re-run your INSERT statements in MySQL Workbench.

---

## For Your Report Screenshots

Take screenshots of:
1. Dashboard with stats and area cards
2. Entry form with slot grid selected
3. Bill modal after processing an exit
4. History table with filter buttons
5. Reports page with revenue bars

These cover: DDL, DML, SELECT queries, JOINs, triggers (auto-fires on exit), and transaction management.
