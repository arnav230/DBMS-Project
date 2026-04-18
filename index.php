<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ParkSmart Chandigarh</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
<style>
/* ── Reset & Base ────────────────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --ink:       #0a0a0f;
  --ink2:      #3a3a4a;
  --ink3:      #7a7a8a;
  --bg:        #f4f3ef;
  --bg2:       #eceae3;
  --bg3:       #e0ddd4;
  --white:     #ffffff;
  --accent:    #e8440a;
  --accent2:   #ff6b35;
  --green:     #1a7a4a;
  --green-bg:  #e6f5ee;
  --red:       #cc2200;
  --red-bg:    #fdecea;
  --amber:     #c47a00;
  --amber-bg:  #fff8e6;
  --blue:      #1a4f8a;
  --blue-bg:   #e8f0fc;
  --radius:    12px;
  --radius-lg: 20px;
  --shadow:    0 2px 12px rgba(10,10,15,0.08);
  --shadow-lg: 0 8px 40px rgba(10,10,15,0.14);
  --font-head: 'Syne', sans-serif;
  --font-body: 'DM Sans', sans-serif;
  --nav-h:     64px;
  --sidebar-w: 240px;
}

html { scroll-behavior: smooth; }
body {
  font-family: var(--font-body);
  background: var(--bg);
  color: var(--ink);
  min-height: 100vh;
  font-size: 15px;
  line-height: 1.6;
}

/* ── Typography ──────────────────────────────────────────────────────── */
h1,h2,h3,h4 { font-family: var(--font-head); line-height: 1.15; }
h1 { font-size: 2.6rem; font-weight: 800; }
h2 { font-size: 1.7rem; font-weight: 700; }
h3 { font-size: 1.15rem; font-weight: 600; }

/* ── Nav ─────────────────────────────────────────────────────────────── */
.nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  height: var(--nav-h);
  background: var(--ink);
  display: flex; align-items: center;
  padding: 0 32px;
  gap: 0;
}
.nav-logo {
  font-family: var(--font-head);
  font-size: 1.25rem; font-weight: 800;
  color: var(--white);
  letter-spacing: -0.02em;
  display: flex; align-items: center; gap: 10px;
  margin-right: auto;
  text-decoration: none;
}
.nav-logo-dot {
  width: 28px; height: 28px; border-radius: 8px;
  background: var(--accent);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.9rem;
}
.nav-tabs {
  display: flex; gap: 4px;
}
.nav-tab {
  padding: 8px 18px;
  border-radius: 8px;
  color: rgba(255,255,255,0.6);
  font-size: 0.875rem; font-weight: 500;
  cursor: pointer;
  border: none; background: none;
  font-family: var(--font-body);
  transition: all 0.18s;
  letter-spacing: 0.01em;
}
.nav-tab:hover { color: var(--white); background: rgba(255,255,255,0.08); }
.nav-tab.active { color: var(--white); background: rgba(255,255,255,0.15); }

.nav-badge {
  display: inline-flex; align-items: center; justify-content: center;
  width: 18px; height: 18px; border-radius: 50%;
  background: var(--accent); color: var(--white);
  font-size: 0.7rem; font-weight: 700;
  margin-left: 6px; vertical-align: middle;
}

/* ── Layout ──────────────────────────────────────────────────────────── */
.main { padding-top: var(--nav-h); min-height: 100vh; }
.page { display: none; }
.page.active { display: block; }

.container { max-width: 1160px; margin: 0 auto; padding: 40px 32px; }

/* ── Dashboard Hero ──────────────────────────────────────────────────── */
.hero {
  background: var(--ink);
  padding: 56px 32px 48px;
  position: relative; overflow: hidden;
}
.hero::before {
  content: '';
  position: absolute; top: -60px; right: -60px;
  width: 320px; height: 320px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(232,68,10,0.25) 0%, transparent 70%);
  pointer-events: none;
}
.hero::after {
  content: '';
  position: absolute; bottom: -80px; left: 30%;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(232,68,10,0.1) 0%, transparent 70%);
  pointer-events: none;
}
.hero-inner { max-width: 1160px; margin: 0 auto; position: relative; z-index: 1; }
.hero-label {
  display: inline-block;
  background: rgba(232,68,10,0.2);
  color: var(--accent2);
  font-size: 0.75rem; font-weight: 600;
  letter-spacing: 0.12em; text-transform: uppercase;
  padding: 5px 12px; border-radius: 20px;
  margin-bottom: 16px;
  border: 1px solid rgba(232,68,10,0.3);
}
.hero h1 {
  color: var(--white);
  font-size: 2.8rem;
  margin-bottom: 8px;
}
.hero h1 span { color: var(--accent2); }
.hero-sub {
  color: rgba(255,255,255,0.5);
  font-size: 1rem; margin-bottom: 40px;
  font-weight: 300;
}

/* ── Stats Grid ──────────────────────────────────────────────────────── */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  margin-bottom: 0;
}
.stat-card {
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-lg);
  padding: 24px;
  backdrop-filter: blur(10px);
  transition: transform 0.2s, background 0.2s;
}
.stat-card:hover { transform: translateY(-2px); background: rgba(255,255,255,0.1); }
.stat-icon {
  width: 40px; height: 40px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem; margin-bottom: 16px;
}
.stat-icon.orange { background: rgba(232,68,10,0.2); }
.stat-icon.green  { background: rgba(26,122,74,0.25); }
.stat-icon.red    { background: rgba(204,34,0,0.2); }
.stat-icon.blue   { background: rgba(26,79,138,0.25); }
.stat-value {
  font-family: var(--font-head);
  font-size: 2.2rem; font-weight: 800;
  color: var(--white);
  line-height: 1;
  margin-bottom: 4px;
}
.stat-label {
  font-size: 0.8rem; font-weight: 400;
  color: rgba(255,255,255,0.45);
  letter-spacing: 0.05em; text-transform: uppercase;
}
.stat-sub {
  font-size: 0.78rem;
  color: rgba(255,255,255,0.3);
  margin-top: 6px;
}

/* ── Section ─────────────────────────────────────────────────────────── */
.section-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 24px;
}
.section-header h2 { font-size: 1.4rem; }
.section-tag {
  font-size: 0.75rem; font-weight: 600;
  letter-spacing: 0.08em; text-transform: uppercase;
  color: var(--ink3);
  padding: 4px 10px;
  background: var(--bg3);
  border-radius: 20px;
}

/* ── Area Cards ──────────────────────────────────────────────────────── */
.areas-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 18px;
}
.area-card {
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 24px;
  border: 1px solid var(--bg3);
  box-shadow: var(--shadow);
  transition: transform 0.2s, box-shadow 0.2s;
  cursor: pointer;
}
.area-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-lg); }
.area-card-top {
  display: flex; align-items: flex-start; justify-content: space-between;
  margin-bottom: 16px;
}
.area-icon {
  width: 44px; height: 44px; border-radius: 12px;
  background: var(--bg2);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.3rem;
}
.area-badge {
  font-size: 0.72rem; font-weight: 600;
  padding: 4px 10px; border-radius: 20px;
  letter-spacing: 0.05em; text-transform: uppercase;
}
.area-badge.good    { background: var(--green-bg); color: var(--green); }
.area-badge.medium  { background: var(--amber-bg); color: var(--amber); }
.area-badge.full    { background: var(--red-bg); color: var(--red); }
.area-name { font-family: var(--font-head); font-size: 1rem; font-weight: 700; margin-bottom: 4px; }
.area-loc  { font-size: 0.82rem; color: var(--ink3); margin-bottom: 16px; }
.area-meter { height: 5px; background: var(--bg2); border-radius: 99px; margin-bottom: 12px; overflow: hidden; }
.area-meter-fill { height: 100%; border-radius: 99px; background: var(--green); transition: width 0.6s ease; }
.area-meter-fill.medium { background: var(--amber); }
.area-meter-fill.full   { background: var(--red); }
.area-stats {
  display: flex; justify-content: space-between;
  font-size: 0.82rem; color: var(--ink2);
}
.area-stats strong { font-weight: 600; color: var(--ink); }
.area-rate {
  display: flex; align-items: center; justify-content: space-between;
  margin-top: 14px; padding-top: 14px;
  border-top: 1px solid var(--bg2);
  font-size: 0.82rem; color: var(--ink3);
}
.area-rate-val {
  font-family: var(--font-head); font-size: 1.05rem; font-weight: 700;
  color: var(--accent);
}

/* ── Active Vehicles Table ────────────────────────────────────────────── */
.table-wrap {
  background: var(--white);
  border-radius: var(--radius-lg);
  border: 1px solid var(--bg3);
  box-shadow: var(--shadow);
  overflow: hidden;
}
table { width: 100%; border-collapse: collapse; }
thead th {
  background: var(--bg);
  font-size: 0.75rem; font-weight: 600;
  letter-spacing: 0.08em; text-transform: uppercase;
  color: var(--ink3);
  padding: 14px 20px;
  text-align: left;
  border-bottom: 1px solid var(--bg3);
}
tbody tr { border-bottom: 1px solid var(--bg2); transition: background 0.15s; }
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: var(--bg); }
tbody td { padding: 14px 20px; font-size: 0.88rem; vertical-align: middle; }
.vehicle-plate {
  font-family: var(--font-head);
  font-size: 0.92rem; font-weight: 700;
  background: var(--ink);
  color: var(--white);
  padding: 4px 10px; border-radius: 6px;
  letter-spacing: 0.08em;
  display: inline-block;
}
.duration-pill {
  display: inline-flex; align-items: center; gap: 4px;
  background: var(--amber-bg); color: var(--amber);
  font-size: 0.78rem; font-weight: 600;
  padding: 3px 10px; border-radius: 20px;
}
.status-dot {
  display: inline-block;
  width: 7px; height: 7px; border-radius: 50%;
  background: var(--green);
  animation: pulse 2s infinite;
  margin-right: 6px;
}
@keyframes pulse {
  0%,100% { opacity: 1; }
  50%      { opacity: 0.4; }
}
.btn-exit {
  background: var(--red-bg); color: var(--red);
  border: 1px solid rgba(204,34,0,0.2);
  padding: 6px 14px; border-radius: 8px;
  font-size: 0.8rem; font-weight: 600;
  cursor: pointer; font-family: var(--font-body);
  transition: all 0.15s;
}
.btn-exit:hover { background: var(--red); color: var(--white); }

/* ── Forms / Entry Page ───────────────────────────────────────────────── */
.page-title {
  margin-bottom: 32px;
}
.page-title h2 { margin-bottom: 4px; }
.page-title p { color: var(--ink3); font-size: 0.9rem; }

.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  align-items: start;
}
.form-card {
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 32px;
  border: 1px solid var(--bg3);
  box-shadow: var(--shadow);
}
.form-card h3 {
  margin-bottom: 24px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--bg2);
  display: flex; align-items: center; gap: 10px;
}
.form-card h3 .icon {
  width: 32px; height: 32px; border-radius: 8px;
  background: var(--bg2);
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem;
}
.form-group { margin-bottom: 20px; }
label {
  display: block;
  font-size: 0.78rem; font-weight: 600;
  letter-spacing: 0.06em; text-transform: uppercase;
  color: var(--ink3);
  margin-bottom: 8px;
}
input[type="text"], select {
  width: 100%;
  padding: 12px 16px;
  border: 1.5px solid var(--bg3);
  border-radius: 10px;
  font-size: 0.92rem;
  font-family: var(--font-body);
  color: var(--ink);
  background: var(--bg);
  transition: border-color 0.18s, background 0.18s;
  outline: none;
  appearance: none;
}
input[type="text"]:focus, select:focus {
  border-color: var(--accent);
  background: var(--white);
}
input[type="text"]::placeholder { color: var(--ink3); }

.input-hint {
  font-size: 0.77rem; color: var(--ink3);
  margin-top: 5px;
}
.btn-primary {
  width: 100%;
  padding: 14px;
  background: var(--ink);
  color: var(--white);
  border: none; border-radius: 10px;
  font-size: 0.92rem; font-weight: 600;
  font-family: var(--font-head);
  cursor: pointer;
  letter-spacing: 0.03em;
  transition: background 0.18s, transform 0.15s;
}
.btn-primary:hover { background: var(--accent); transform: translateY(-1px); }
.btn-primary:active { transform: translateY(0); }
.btn-primary.green  { background: var(--green); }
.btn-primary.green:hover { background: #1a6040; }

/* ── Slot Grid ────────────────────────────────────────────────────────── */
.slot-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(56px, 1fr));
  gap: 10px;
  margin-top: 12px;
}
.slot-item {
  aspect-ratio: 1;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.8rem; font-weight: 700;
  font-family: var(--font-head);
  border: 2px solid transparent;
  cursor: default;
  transition: all 0.15s;
}
.slot-item.available {
  background: var(--green-bg); color: var(--green);
  border-color: rgba(26,122,74,0.2);
  cursor: pointer;
}
.slot-item.available:hover {
  background: var(--green); color: var(--white);
  border-color: var(--green);
  transform: scale(1.08);
}
.slot-item.occupied {
  background: var(--red-bg); color: var(--red);
  border-color: rgba(204,34,0,0.15);
}
.slot-item.selected {
  background: var(--accent); color: var(--white);
  border-color: var(--accent);
  transform: scale(1.08);
}
.slot-legend {
  display: flex; gap: 16px; margin-bottom: 12px;
  font-size: 0.78rem; color: var(--ink3);
}
.slot-legend span { display: flex; align-items: center; gap: 5px; }
.dot-green { width: 8px; height: 8px; border-radius: 50%; background: var(--green); }
.dot-red   { width: 8px; height: 8px; border-radius: 50%; background: var(--red); }
.dot-orange{ width: 8px; height: 8px; border-radius: 50%; background: var(--accent); }

/* ── Toast ────────────────────────────────────────────────────────────── */
.toast-wrap {
  position: fixed; bottom: 28px; right: 28px;
  display: flex; flex-direction: column; gap: 10px;
  z-index: 9999;
}
.toast {
  background: var(--ink); color: var(--white);
  padding: 14px 20px; border-radius: 12px;
  font-size: 0.88rem; font-weight: 500;
  box-shadow: var(--shadow-lg);
  display: flex; align-items: center; gap: 10px;
  animation: slideIn 0.3s ease;
  max-width: 340px;
}
.toast.success { border-left: 4px solid var(--green); }
.toast.error   { border-left: 4px solid var(--red); }
.toast.info    { border-left: 4px solid var(--accent); }
@keyframes slideIn {
  from { transform: translateX(40px); opacity: 0; }
  to   { transform: translateX(0); opacity: 1; }
}

/* ── Bill Modal ───────────────────────────────────────────────────────── */
.modal-overlay {
  display: none;
  position: fixed; inset: 0;
  background: rgba(10,10,15,0.65);
  backdrop-filter: blur(4px);
  z-index: 999;
  align-items: center; justify-content: center;
}
.modal-overlay.open { display: flex; }
.modal {
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 0;
  width: 420px; max-width: 90vw;
  box-shadow: var(--shadow-lg);
  overflow: hidden;
  animation: popIn 0.25s ease;
}
@keyframes popIn {
  from { transform: scale(0.92); opacity: 0; }
  to   { transform: scale(1); opacity: 1; }
}
.modal-head {
  background: var(--ink); padding: 28px 28px 24px;
  color: var(--white);
}
.modal-head h3 {
  font-size: 1.3rem; margin-bottom: 4px;
}
.modal-head p { color: rgba(255,255,255,0.5); font-size: 0.85rem; }
.modal-body { padding: 28px; }
.bill-row {
  display: flex; justify-content: space-between; align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid var(--bg2);
  font-size: 0.88rem;
}
.bill-row:last-child { border-bottom: none; }
.bill-row .k { color: var(--ink3); }
.bill-row .v { font-weight: 600; }
.bill-total {
  background: var(--bg); border-radius: 10px; padding: 16px;
  display: flex; justify-content: space-between; align-items: center;
  margin-top: 12px;
}
.bill-total-label { font-size: 0.85rem; color: var(--ink3); font-weight: 500; }
.bill-total-amount {
  font-family: var(--font-head); font-size: 2rem; font-weight: 800;
  color: var(--accent);
}
.modal-actions { padding: 0 28px 28px; display: flex; gap: 10px; }
.btn-close {
  flex: 1; padding: 12px;
  background: var(--bg2); color: var(--ink);
  border: none; border-radius: 10px;
  font-size: 0.88rem; font-weight: 600;
  font-family: var(--font-body);
  cursor: pointer; transition: background 0.15s;
}
.btn-close:hover { background: var(--bg3); }

/* ── History Page ────────────────────────────────────────────────────── */
.history-filter {
  display: flex; gap: 10px; margin-bottom: 24px;
}
.filter-btn {
  padding: 8px 16px; border-radius: 20px;
  border: 1.5px solid var(--bg3);
  background: var(--white); color: var(--ink2);
  font-size: 0.82rem; font-weight: 600;
  cursor: pointer; font-family: var(--font-body);
  transition: all 0.15s;
}
.filter-btn:hover, .filter-btn.active {
  border-color: var(--ink);
  background: var(--ink); color: var(--white);
}

/* ── Revenue / Reports ───────────────────────────────────────────────── */
.revenue-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 18px;
  margin-bottom: 32px;
}
.revenue-card {
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 24px;
  border: 1px solid var(--bg3);
  box-shadow: var(--shadow);
}
.revenue-card-name {
  font-family: var(--font-head); font-size: 1rem; font-weight: 700;
  margin-bottom: 16px;
}
.revenue-bar-wrap { height: 8px; background: var(--bg2); border-radius: 99px; overflow: hidden; margin-bottom: 12px; }
.revenue-bar-fill { height: 100%; border-radius: 99px; background: var(--accent); transition: width 0.8s ease; }
.revenue-nums {
  display: flex; justify-content: space-between; font-size: 0.82rem; color: var(--ink3);
}
.revenue-nums strong { font-weight: 700; color: var(--ink); }

/* ── Empty State ─────────────────────────────────────────────────────── */
.empty {
  text-align: center; padding: 60px 20px;
  color: var(--ink3); font-size: 0.9rem;
}
.empty .e-icon { font-size: 3rem; margin-bottom: 12px; }
.empty h3 { font-size: 1.1rem; margin-bottom: 6px; color: var(--ink2); }

/* ── Loading ─────────────────────────────────────────────────────────── */
.spinner {
  display: inline-block;
  width: 20px; height: 20px;
  border: 2.5px solid rgba(255,255,255,0.25);
  border-top-color: var(--white);
  border-radius: 50%;
  animation: spin 0.7s linear infinite;
  vertical-align: middle; margin-right: 8px;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* ── Scrollbar ────────────────────────────────────────────────────────── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--bg3); border-radius: 99px; }

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 900px) {
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
  .areas-grid { grid-template-columns: repeat(2, 1fr); }
  .form-grid  { grid-template-columns: 1fr; }
  .revenue-grid { grid-template-columns: 1fr; }
}
@media (max-width: 600px) {
  :root { --nav-h: 56px; }
  .nav { padding: 0 16px; }
  .container { padding: 24px 16px; }
  h1 { font-size: 1.8rem; }
  .hero { padding: 36px 16px 32px; }
  .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
  .areas-grid { grid-template-columns: 1fr; }
  .nav-tabs .nav-tab span.label { display: none; }
}
</style>
</head>
<body>

<!-- ── Navigation ──────────────────────────────────────────────────── -->
<nav class="nav">
  <a class="nav-logo" href="#" onclick="showPage('dashboard')">
    <div class="nav-logo-dot">P</div>
    ParkSmart
  </a>
  <div class="nav-tabs">
    <button class="nav-tab active" onclick="showPage('dashboard')" id="tab-dashboard">
      <span class="label">Dashboard</span>
    </button>
    <button class="nav-tab" onclick="showPage('entry')" id="tab-entry">
      <span class="label">Entry / Exit</span>
    </button>
    <button class="nav-tab" onclick="showPage('slots')" id="tab-slots">
      <span class="label">Slot Map</span>
    </button>
    <button class="nav-tab" onclick="showPage('history')" id="tab-history">
      <span class="label">History</span>
    </button>
    <button class="nav-tab" onclick="showPage('reports')" id="tab-reports">
      <span class="label">Reports</span>
    </button>
  </div>
</nav>

<main class="main">

<!-- ═══════════════════════ DASHBOARD ═══════════════════════════════ -->
<div class="page active" id="page-dashboard">
  <div class="hero">
    <div class="hero-inner">
      <div class="hero-label">🏙 Chandigarh Smart Parking</div>
      <h1>Park <span>Smarter,</span><br>Move Faster.</h1>
      <p class="hero-sub">Real-time slot monitoring across 6 locations in the city</p>
      <div class="stats-grid" id="stats-grid">
        <div class="stat-card">
          <div class="stat-icon orange">🅿</div>
          <div class="stat-value" id="stat-total">—</div>
          <div class="stat-label">Total Slots</div>
          <div class="stat-sub">Across all areas</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">✓</div>
          <div class="stat-value" id="stat-free">—</div>
          <div class="stat-label">Available</div>
          <div class="stat-sub" id="stat-pct">—</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red">🚗</div>
          <div class="stat-value" id="stat-occupied">—</div>
          <div class="stat-label">Occupied</div>
          <div class="stat-sub" id="stat-active">— active sessions</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon blue">₹</div>
          <div class="stat-value" id="stat-revenue">—</div>
          <div class="stat-label">Today's Revenue</div>
          <div class="stat-sub">All areas combined</div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- Parking Areas -->
    <div class="section-header">
      <h2>Parking Locations</h2>
      <span class="section-tag" id="areas-tag">Loading...</span>
    </div>
    <div class="areas-grid" id="areas-grid">
      <div class="area-card"><div class="empty"><div class="spinner" style="border-top-color:var(--ink);border-color:var(--bg3)"></div></div></div>
    </div>

    <!-- Currently Parked -->
    <div style="margin-top: 48px">
      <div class="section-header">
        <h2>Currently Parked</h2>
        <span class="section-tag" id="active-tag">Live</span>
      </div>
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Vehicle</th>
              <th>Area</th>
              <th>Slot</th>
              <th>Entry Time</th>
              <th>Duration</th>
              <th>Est. Charge</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="active-tbody">
            <tr><td colspan="7" class="empty">Loading...</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════ ENTRY / EXIT ════════════════════════════ -->
<div class="page" id="page-entry">
  <div class="container">
    <div class="page-title">
      <h2>Vehicle Entry & Exit</h2>
      <p>Record new vehicle entries or process exits and generate bills</p>
    </div>
    <div class="form-grid">

      <!-- Entry Form -->
      <div class="form-card">
        <h3><div class="icon">🚗</div> Record Entry</h3>
        <div class="form-group">
          <label>Vehicle Number</label>
          <input type="text" id="entry-vehicle" placeholder="e.g. CH01AB1234" maxlength="15" oninput="this.value=this.value.toUpperCase()">
          <p class="input-hint">Enter the full vehicle registration number</p>
        </div>
        <div class="form-group">
          <label>Parking Area</label>
          <select id="entry-area" onchange="loadSlotsForArea(this.value)">
            <option value="">Select area...</option>
          </select>
        </div>
        <div class="form-group" id="slot-select-group" style="display:none">
          <label>Select Available Slot</label>
          <div class="slot-legend">
            <span><div class="dot-green"></div> Available</span>
            <span><div class="dot-red"></div> Occupied</span>
            <span><div class="dot-orange"></div> Selected</span>
          </div>
          <div class="slot-grid" id="entry-slot-grid"></div>
          <input type="hidden" id="entry-slot-id">
        </div>
        <div class="form-group">
          <label>Staff / User ID</label>
          <select id="entry-user">
            <option value="2">staff_elante</option>
            <option value="3">staff_isbt</option>
            <option value="1">admin_chd</option>
          </select>
        </div>
        <button class="btn-primary green" onclick="recordEntry()">
          ✓ &nbsp; Record Entry
        </button>
      </div>

      <!-- Exit Form -->
      <div>
        <div class="form-card" style="margin-bottom: 20px">
          <h3><div class="icon">🚪</div> Process Exit</h3>
          <div class="form-group">
            <label>Search Vehicle to Exit</label>
            <input type="text" id="exit-search" placeholder="Type vehicle number..." oninput="filterActiveForExit(this.value)" style="text-transform:uppercase">
          </div>
          <div id="exit-vehicle-list" style="margin-top: 8px; max-height: 280px; overflow-y: auto;"></div>
        </div>

        <!-- Quick info card -->
        <div class="form-card">
          <h3><div class="icon">ℹ</div> Rate Reference</h3>
          <div id="rate-reference">Loading rates...</div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ═══════════════════════ SLOT MAP ════════════════════════════════ -->
<div class="page" id="page-slots">
  <div class="container">
    <div class="page-title">
      <h2>Live Slot Map</h2>
      <p>Visual overview of all parking slots across every area</p>
    </div>
    <div id="slot-map-container"></div>
  </div>
</div>

<!-- ═══════════════════════ HISTORY ════════════════════════════════ -->
<div class="page" id="page-history">
  <div class="container">
    <div class="page-title">
      <h2>Parking History</h2>
      <p>Complete log of all completed parking sessions</p>
    </div>
    <div class="history-filter">
      <button class="filter-btn active" onclick="filterHistory('all', this)">All Time</button>
      <button class="filter-btn" onclick="filterHistory('today', this)">Today</button>
      <button class="filter-btn" onclick="filterHistory('week', this)">This Week</button>
    </div>
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Vehicle</th>
            <th>Area</th>
            <th>Entry</th>
            <th>Exit</th>
            <th>Duration</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody id="history-tbody">
          <tr><td colspan="7" class="empty">Loading history...</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ═══════════════════════ REPORTS ════════════════════════════════ -->
<div class="page" id="page-reports">
  <div class="container">
    <div class="page-title">
      <h2>Revenue Reports</h2>
      <p>Area-wise revenue analysis and performance metrics</p>
    </div>
    <div class="revenue-grid" id="revenue-grid">
      <div class="empty"><span class="spinner" style="border-top-color:var(--ink);border-color:var(--bg3)"></span></div>
    </div>

    <div class="section-header" style="margin-top: 16px">
      <h2>Detailed Breakdown</h2>
    </div>
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>Area</th>
            <th>Total Sessions</th>
            <th>Total Revenue</th>
            <th>Avg. Charge</th>
            <th>Avg. Duration</th>
            <th>Revenue Bar</th>
          </tr>
        </thead>
        <tbody id="report-tbody">
          <tr><td colspan="6" class="empty">Loading...</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</main>

<!-- ── Bill Modal ──────────────────────────────────────────────────── -->
<div class="modal-overlay" id="bill-modal">
  <div class="modal">
    <div class="modal-head">
      <h3>🧾 Parking Bill</h3>
      <p>Payment summary for this session</p>
    </div>
    <div class="modal-body" id="bill-body"></div>
    <div class="modal-actions">
      <button class="btn-close" onclick="closeBillModal()">Close</button>
      <button class="btn-primary" onclick="closeBillModal()" style="flex:1;padding:12px;font-size:.88rem">
        ✓ &nbsp; Done
      </button>
    </div>
  </div>
</div>

<!-- ── Toast Container ─────────────────────────────────────────────── -->
<div class="toast-wrap" id="toast-wrap"></div>

<script>
// ── State ────────────────────────────────────────────────────────────
let allHistory    = [];
let allActive     = [];
let selectedSlot  = null;
let maxRevenue    = 0;

// ── Page Navigation ──────────────────────────────────────────────────
function showPage(name) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('page-' + name).classList.add('active');
  document.getElementById('tab-' + name).classList.add('active');
  if (name === 'dashboard') { loadStats(); loadAreas(); loadActive(); }
  if (name === 'entry')     { loadAreasDropdown(); loadActiveForExit(); loadRates(); }
  if (name === 'slots')     { loadSlotMap(); }
  if (name === 'history')   { loadHistory(); }
  if (name === 'reports')   { loadRevenue(); }
}

// ── API Helper ───────────────────────────────────────────────────────
async function api(params) {
  try {
    const qs  = new URLSearchParams(params).toString();
    const res = await fetch('api.php?' + qs);
    return await res.json();
  } catch(e) { return { success: false, message: 'Network error' }; }
}

async function postApi(action, body) {
  try {
    const fd = new FormData();
    fd.append('action', action);
    Object.entries(body).forEach(([k,v]) => fd.append(k, v));
    const res = await fetch('api.php?action=' + action, { method:'POST', body: fd });
    return await res.json();
  } catch(e) { return { success: false, message: 'Network error' }; }
}

// ── Toast ─────────────────────────────────────────────────────────────
function toast(msg, type = 'info') {
  const el = document.createElement('div');
  el.className = 'toast ' + type;
  const icons = { success:'✓', error:'✕', info:'ℹ' };
  el.innerHTML = `<span>${icons[type]||'•'}</span> ${msg}`;
  document.getElementById('toast-wrap').appendChild(el);
  setTimeout(() => el.remove(), 3500);
}

// ── Dashboard ─────────────────────────────────────────────────────────
async function loadStats() {
  const d = await api({ action: 'stats' });
  if (!d.success) return;
  document.getElementById('stat-total').textContent    = d.total;
  document.getElementById('stat-free').textContent     = d.free;
  document.getElementById('stat-occupied').textContent = d.occupied;
  document.getElementById('stat-revenue').textContent  = '₹' + Number(d.revenue).toFixed(0);
  document.getElementById('stat-pct').textContent      = Math.round(d.free / d.total * 100) + '% free';
  document.getElementById('stat-active').textContent   = d.active + ' active sessions';
}

async function loadAreas() {
  const d = await api({ action: 'areas' });
  if (!d.success) return;
  const grid = document.getElementById('areas-grid');
  const tag  = document.getElementById('areas-tag');
  tag.textContent = d.areas.length + ' locations';
  const icons = ['🏢','🛍','🚌','🏥','🏪','🌳'];
  grid.innerHTML = d.areas.map((a, i) => {
    const pct  = a.total_slots > 0 ? (a.total_slots - a.free_slots) / a.total_slots * 100 : 0;
    const freePct = 100 - pct;
    const cls  = freePct > 50 ? 'good' : freePct > 20 ? 'medium' : 'full';
    const txt  = freePct > 50 ? 'Available' : freePct > 20 ? 'Filling Up' : 'Almost Full';
    const meterCls = freePct > 50 ? '' : freePct > 20 ? 'medium' : 'full';
    return `<div class="area-card" onclick="showPage('entry')">
      <div class="area-card-top">
        <div class="area-icon">${icons[i] || '🅿'}</div>
        <span class="area-badge ${cls}">${txt}</span>
      </div>
      <div class="area-name">${a.area_name}</div>
      <div class="area-loc">📍 ${a.location}</div>
      <div class="area-meter">
        <div class="area-meter-fill ${meterCls}" style="width:${pct}%"></div>
      </div>
      <div class="area-stats">
        <span><strong>${a.free_slots}</strong> free</span>
        <span><strong>${a.total_slots - a.free_slots}</strong> occupied</span>
        <span><strong>${a.total_slots}</strong> total</span>
      </div>
      <div class="area-rate">
        <span>Rate per hour</span>
        <span class="area-rate-val">₹${a.rate_per_hour}</span>
      </div>
    </div>`;
  }).join('');
}

async function loadActive() {
  const d = await api({ action: 'active' });
  if (!d.success) return;
  allActive = d.vehicles;
  const tbody = document.getElementById('active-tbody');
  const tag   = document.getElementById('active-tag');
  tag.textContent = d.vehicles.length + ' live';
  if (!d.vehicles.length) {
    tbody.innerHTML = '<tr><td colspan="7"><div class="empty"><div class="e-icon">🅿</div><h3>No vehicles currently parked</h3><p>Record an entry to see it here</p></div></td></tr>';
    return;
  }
  tbody.innerHTML = d.vehicles.map(v => {
    const hrs  = v.duration_mins / 60;
    const est  = (Math.ceil(Math.max(1, hrs)) * v.rate_per_hour).toFixed(0);
    const h    = Math.floor(v.duration_mins / 60);
    const m    = v.duration_mins % 60;
    const dur  = h > 0 ? `${h}h ${m}m` : `${m}m`;
    const time = new Date(v.entry_time).toLocaleTimeString('en-IN', {hour:'2-digit', minute:'2-digit'});
    return `<tr>
      <td><span class="vehicle-plate">${v.vehicle_number}</span></td>
      <td>${v.area_name}</td>
      <td><strong>S-${v.slot_id}</strong></td>
      <td>${time}</td>
      <td><span class="duration-pill">⏱ ${dur}</span></td>
      <td>≈ ₹${est}</td>
      <td><button class="btn-exit" onclick="confirmExit(${v.entry_id}, '${v.vehicle_number}', ${est})">Exit →</button></td>
    </tr>`;
  }).join('');
}

// ── Entry Page ────────────────────────────────────────────────────────
async function loadAreasDropdown() {
  const d = await api({ action: 'areas' });
  if (!d.success) return;
  const sel = document.getElementById('entry-area');
  sel.innerHTML = '<option value="">Select parking area...</option>' +
    d.areas.map(a => `<option value="${a.area_id}">${a.area_name} (${a.free_slots} free)</option>`).join('');
}

async function loadSlotsForArea(areaId) {
  const group = document.getElementById('slot-select-group');
  if (!areaId) { group.style.display = 'none'; return; }
  const d = await api({ action: 'slots', area_id: areaId });
  if (!d.success) return;
  group.style.display = 'block';
  selectedSlot = null;
  document.getElementById('entry-slot-id').value = '';
  document.getElementById('entry-slot-grid').innerHTML = d.slots.map(s =>
    `<div class="slot-item ${s.slot_status}" id="slot-${s.slot_id}"
      onclick="${s.slot_status === 'available' ? `selectSlot(${s.slot_id}, this)` : ''}"
      title="Slot ${s.slot_id} – ${s.slot_status}">
      ${s.slot_id}
    </div>`
  ).join('');
}

function selectSlot(id, el) {
  document.querySelectorAll('.slot-item.selected').forEach(x => {
    x.classList.remove('selected'); x.classList.add('available');
  });
  el.classList.remove('available'); el.classList.add('selected');
  selectedSlot = id;
  document.getElementById('entry-slot-id').value = id;
}

async function recordEntry() {
  const vehicle = document.getElementById('entry-vehicle').value.trim();
  const slotId  = document.getElementById('entry-slot-id').value;
  const userId  = document.getElementById('entry-user').value;
  if (!vehicle) { toast('Please enter a vehicle number', 'error'); return; }
  if (!slotId)  { toast('Please select a slot', 'error'); return; }
  const d = await postApi('entry', { vehicle_number: vehicle, slot_id: slotId, user_id: userId });
  if (d.success) {
    toast(`Entry recorded for ${vehicle}`, 'success');
    document.getElementById('entry-vehicle').value = '';
    document.getElementById('entry-area').value = '';
    document.getElementById('slot-select-group').style.display = 'none';
    selectedSlot = null;
    loadActiveForExit();
  } else {
    toast(d.message, 'error');
  }
}

async function loadActiveForExit() {
  const d = await api({ action: 'active' });
  if (!d.success) return;
  allActive = d.vehicles;
  renderExitList(d.vehicles);
}

function filterActiveForExit(q) {
  const filtered = q ? allActive.filter(v => v.vehicle_number.includes(q.toUpperCase())) : allActive;
  renderExitList(filtered);
}

function renderExitList(vehicles) {
  const el = document.getElementById('exit-vehicle-list');
  if (!vehicles.length) {
    el.innerHTML = '<p style="color:var(--ink3);font-size:.82rem;padding:8px 0">No vehicles match</p>';
    return;
  }
  el.innerHTML = vehicles.map(v => {
    const h   = Math.floor(v.duration_mins / 60);
    const m   = v.duration_mins % 60;
    const dur = h > 0 ? `${h}h ${m}m` : `${m}m`;
    const est = (Math.ceil(Math.max(1, v.duration_mins/60)) * v.rate_per_hour).toFixed(0);
    return `<div style="display:flex;align-items:center;justify-content:space-between;padding:10px 12px;border-radius:10px;background:var(--bg);margin-bottom:8px;">
      <div>
        <span class="vehicle-plate" style="font-size:.78rem">${v.vehicle_number}</span>
        <span style="font-size:.78rem;color:var(--ink3);margin-left:8px">${v.area_name} · ${dur}</span>
      </div>
      <button class="btn-exit" onclick="confirmExit(${v.entry_id},'${v.vehicle_number}',${est})">Exit · ₹${est}</button>
    </div>`;
  }).join('');
}

async function loadRates() {
  const d = await api({ action: 'areas' });
  if (!d.success) return;
  document.getElementById('rate-reference').innerHTML =
    d.areas.map(a => `<div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid var(--bg2);font-size:.82rem">
      <span style="color:var(--ink2)">${a.area_name}</span>
      <strong>₹${a.rate_per_hour}/hr</strong>
    </div>`).join('');
}

async function confirmExit(entryId, vehicle, est) {
  if (!confirm(`Process exit for ${vehicle}?\nEstimated charge: ₹${est}`)) return;
  const d = await postApi('exit', { entry_id: entryId });
  if (d.success) {
    showBillModal(vehicle, d);
    loadActive();
    loadStats();
    loadActiveForExit();
  } else {
    toast(d.message, 'error');
  }
}

function showBillModal(vehicle, d) {
  const mins = d.duration;
  const h    = Math.floor(mins / 60);
  const m    = mins % 60;
  const dur  = h > 0 ? `${h} hr ${m} min` : `${m} min`;
  document.getElementById('bill-body').innerHTML = `
    <div class="bill-row"><span class="k">Vehicle</span><span class="v vehicle-plate">${vehicle}</span></div>
    <div class="bill-row"><span class="k">Duration</span><span class="v">${dur}</span></div>
    <div class="bill-row"><span class="k">Billed Hours</span><span class="v">${d.hours} hr(s)</span></div>
    <div class="bill-total">
      <div>
        <div class="bill-total-label">Total Amount Due</div>
      </div>
      <div class="bill-total-amount">₹${Number(d.amount).toFixed(2)}</div>
    </div>`;
  document.getElementById('bill-modal').classList.add('open');
  toast(`Exit processed · ₹${Number(d.amount).toFixed(2)} collected`, 'success');
}

function closeBillModal() {
  document.getElementById('bill-modal').classList.remove('open');
}

// ── Slot Map ──────────────────────────────────────────────────────────
async function loadSlotMap() {
  const d = await api({ action: 'areas' });
  if (!d.success) return;
  const container = document.getElementById('slot-map-container');
  container.innerHTML = '';
  for (const area of d.areas) {
    const s = await api({ action: 'slots', area_id: area.area_id });
    if (!s.success) continue;
    const div = document.createElement('div');
    div.style.cssText = 'background:var(--white);border-radius:var(--radius-lg);padding:24px;border:1px solid var(--bg3);margin-bottom:18px;box-shadow:var(--shadow)';
    div.innerHTML = `<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
      <div>
        <div style="font-family:var(--font-head);font-size:1rem;font-weight:700">${area.area_name}</div>
        <div style="font-size:.8rem;color:var(--ink3)">${area.location}</div>
      </div>
      <div style="text-align:right">
        <div style="font-size:.82rem;color:var(--green);font-weight:600">${area.free_slots} free</div>
        <div style="font-size:.78rem;color:var(--ink3)">${area.total_slots} total</div>
      </div>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(56px,1fr));gap:10px">
      ${s.slots.map(slot => `
        <div style="aspect-ratio:1;border-radius:10px;display:flex;align-items:center;justify-content:center;
          font-size:.8rem;font-weight:700;font-family:var(--font-head);
          background:${slot.slot_status==='available'?'var(--green-bg)':'var(--red-bg)'};
          color:${slot.slot_status==='available'?'var(--green)':'var(--red)'};
          border:2px solid ${slot.slot_status==='available'?'rgba(26,122,74,0.2)':'rgba(204,34,0,0.15)'};"
          title="Slot ${slot.slot_id} – ${slot.slot_status}">
          ${slot.slot_id}
        </div>`).join('')}
    </div>`;
    container.appendChild(div);
  }
}

// ── History ───────────────────────────────────────────────────────────
async function loadHistory() {
  const d = await api({ action: 'history' });
  if (!d.success) return;
  allHistory = d.history;
  renderHistory(allHistory);
}

function filterHistory(filter, btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const now   = new Date();
  const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
  const week  = new Date(today); week.setDate(week.getDate() - 7);
  let rows = allHistory;
  if (filter === 'today') rows = allHistory.filter(h => new Date(h.exit_time) >= today);
  if (filter === 'week')  rows = allHistory.filter(h => new Date(h.exit_time) >= week);
  renderHistory(rows);
}

function renderHistory(rows) {
  const tbody = document.getElementById('history-tbody');
  if (!rows.length) {
    tbody.innerHTML = '<tr><td colspan="7"><div class="empty"><div class="e-icon">📋</div><h3>No records found</h3></div></td></tr>';
    return;
  }
  tbody.innerHTML = rows.map((h, i) => {
    const d   = Math.round(h.duration_mins);
    const dur = d >= 60 ? `${Math.floor(d/60)}h ${d%60}m` : `${d}m`;
    const ent = new Date(h.entry_time).toLocaleString('en-IN',{dateStyle:'short',timeStyle:'short'});
    const ext = new Date(h.exit_time).toLocaleString('en-IN',{dateStyle:'short',timeStyle:'short'});
    return `<tr>
      <td style="color:var(--ink3)">#${h.history_id}</td>
      <td><span class="vehicle-plate">${h.vehicle_number}</span></td>
      <td>${h.area_name}</td>
      <td style="font-size:.82rem">${ent}</td>
      <td style="font-size:.82rem">${ext}</td>
      <td><span class="duration-pill">⏱ ${dur}</span></td>
      <td style="font-weight:700;color:var(--accent)">₹${Number(h.amount_paid).toFixed(2)}</td>
    </tr>`;
  }).join('');
}

// ── Reports ───────────────────────────────────────────────────────────
async function loadRevenue() {
  const d = await api({ action: 'revenue' });
  if (!d.success) return;
  const rows = d.revenue;
  if (!rows.length) {
    document.getElementById('revenue-grid').innerHTML = '<div class="empty"><div class="e-icon">📊</div><h3>No revenue data yet</h3></div>';
    document.getElementById('report-tbody').innerHTML = '<tr><td colspan="6"><div class="empty">No data</div></td></tr>';
    return;
  }
  maxRevenue = Math.max(...rows.map(r => Number(r.total_revenue) || 0));
  const colors = ['#e8440a','#1a7a4a','#1a4f8a','#c47a00','#7a1a8a','#1a5a7a'];
  document.getElementById('revenue-grid').innerHTML = rows.map((r, i) => {
    const pct = maxRevenue > 0 ? (Number(r.total_revenue) / maxRevenue * 100).toFixed(1) : 0;
    return `<div class="revenue-card">
      <div class="revenue-card-name">${r.area_name}</div>
      <div class="revenue-bar-wrap">
        <div class="revenue-bar-fill" style="width:${pct}%;background:${colors[i%colors.length]}"></div>
      </div>
      <div class="revenue-nums">
        <span>${r.total_sessions} sessions</span>
        <strong>₹${Number(r.total_revenue).toFixed(2)}</strong>
      </div>
    </div>`;
  }).join('');

  document.getElementById('report-tbody').innerHTML = rows.map((r, i) => {
    const dur = Math.round(r.avg_duration_mins || 0);
    const durFmt = dur >= 60 ? `${Math.floor(dur/60)}h ${dur%60}m` : `${dur}m`;
    const pct = maxRevenue > 0 ? (Number(r.total_revenue) / maxRevenue * 100).toFixed(1) : 0;
    return `<tr>
      <td><strong>${r.area_name}</strong></td>
      <td>${r.total_sessions}</td>
      <td style="font-weight:700;color:var(--accent)">₹${Number(r.total_revenue).toFixed(2)}</td>
      <td>₹${Number(r.avg_charge).toFixed(2)}</td>
      <td><span class="duration-pill">⏱ ${durFmt}</span></td>
      <td style="min-width:120px">
        <div style="height:6px;background:var(--bg2);border-radius:99px;overflow:hidden">
          <div style="height:100%;width:${pct}%;background:${colors[i%colors.length]};border-radius:99px"></div>
        </div>
      </td>
    </tr>`;
  }).join('');
}

// ── Auto-refresh ──────────────────────────────────────────────────────
setInterval(() => {
  if (document.getElementById('page-dashboard').classList.contains('active')) {
    loadStats(); loadActive();
  }
}, 30000);

// ── Init ──────────────────────────────────────────────────────────────
showPage('dashboard');
</script>
</body>
</html>
