# Smart Parking Management System
### UCS310 – DBMS Project | Thapar Institute | 2025-26

---

## SETUP INSTRUCTIONS

### Step 1 — Prerequisites
- Install **XAMPP** (includes Apache + MySQL + PHP)
  → https://www.apachefriends.org/download.html

### Step 2 — Place the project
Copy the entire `smart_parking/` folder to:
```
C:\xampp\htdocs\smart_parking\
```

### Step 3 — Start XAMPP
- Open XAMPP Control Panel
- Click **Start** next to **Apache**
- Click **Start** next to **MySQL**

### Step 4 — Set up the database
1. Open browser → go to http://localhost/phpmyadmin
2. Click **New** → create database named `smart_parking`
3. Click on `smart_parking` → go to **SQL** tab
4. Paste and run all your Phase 1–2 SQL (DDL + DML)
5. Also run Phase 4 SQL (stored procedure, function, trigger)

### Step 5 — Configure DB connection (if needed)
Open `includes/db.php` and update:
```php
define('DB_USER', 'root');
define('DB_PASS', '');   // XAMPP default = empty password
```

### Step 6 — Open the website
Go to: **http://localhost/smart_parking/index.html**

---

## PROJECT STRUCTURE
```
smart_parking/
├── index.html          ← Main website (all pages in one file)
├── api.php             ← Backend API (handles all DB queries)
├── includes/
│   └── db.php          ← Database connection config
└── README.md           ← This file
```

## PAGES IN THE WEBSITE
| Page | What it does |
|---|---|
| Dashboard | Live stats + all areas overview |
| Parking Areas | All 6 Chandigarh areas with occupancy |
| Vehicle Entry | Select area → pick slot → record entry |
| Vehicle Exit | Enter number plate → get bill receipt |
| Live Monitor | All vehicles currently parked |
| History | Last 20 completed sessions |
| Reports | Revenue bar chart per area |

## API ENDPOINTS (for reference)
All served from `api.php?action=...`

| Action | Method | Description |
|---|---|---|
| `stats` | GET | Dashboard statistics |
| `areas` | GET | All parking areas |
| `slots&area_id=N` | GET | Slots for a specific area |
| `entry` | POST | Record vehicle entry |
| `exit` | POST | Record exit + generate bill |
| `live` | GET | Currently parked vehicles |
| `history` | GET | Past sessions |
| `revenue` | GET | Revenue per area |

---

## TECHNOLOGIES USED
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Backend**: PHP 8.x
- **Database**: MySQL (via XAMPP)
- **API**: REST-style PHP endpoints
- **Fonts**: DM Sans + Space Mono (Google Fonts)

## TEAM
- Dikshit Gupta (1024170274)
- Harshit Goyal (1024170265)
- Arnav Gupta (1024170057)

**Submitted to**: Ms. Reaya Grewal  
**Department**: CSE, Thapar Institute of Engineering & Technology
