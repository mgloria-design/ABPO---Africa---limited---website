<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Analytics & Business Insights | ABPO Africa Limited</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<style>
body {
    font-family: "Open Sans", sans-serif;
    font-size: 16px;
}
.learn-more-btn{
    position: relative !important;
    z-index: 9999 !important;
    display: inline-block !important;
}

.service-card::after{
    pointer-events: none !important;
}

:root{
  --navy: navy;
  --deep: navy;
  --blue: teal;
  --lblue: teal;
  --cyan: teal;
  --white: #ffffff;
  --text: #333333;
  --muted: #555555;
  --card: #ffffff;
  --border: #dddddd;
  --glow: rgba(0, 128, 128, 0.15);
  
h1, h2, h3, h4, h5, h6, .section-title { font-family: 'open sans', sans-serif; }
*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{font-family:"open sans",system-ui,sans-serif;background:var(--white);color:var(--text);overflow-x:hidden;}



  .service-card, .learn-more-btn {
  position: relative;
  z-index: 10;
}

/* =========================
   NAVBAR
========================= */
nav {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9999;
  height: 90px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(8px);
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  transition: all 0.3s ease;
}

nav.scrolled {
  height: 80px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  background: #ffffff;
}

.nav-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 5%;
}

.nav-logo {
  display: flex;
  align-items: center;
}

.nav-logo img {
  height: 60px;
  width: auto;
  display: block;
  object-fit: contain;
  transition: all 0.3s ease;
}

nav.scrolled .nav-logo img {
  height: 50px;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 20px;
}

.nav-links a,
.dropdown .dropbtn {
  font-size: 1rem;
  font-weight: 600;
  color: #1f2937;
  text-decoration: none;
  padding: 10px 14px;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.nav-links a:hover,
.dropdown .dropbtn:hover {
  color: var(--blue);
  background: rgba(0, 128, 128, 0.05);
}

.nav-cta {
  background: gold !important;
  color: navy !important;
  padding: 10px 22px !important;
  border-radius: 8px;
  font-weight: 700 !important;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(255, 215, 0, 0.2);
}

.nav-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(255, 215, 0, 0.4);
}

.nav-toggle {
  display: none;
  background: none;
  border: none;
  cursor: pointer;
  color: var(--navy);
  padding: 8px;
}

/* =========================
   DROPDOWN
========================= */
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none !important;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background: #fff;
  min-width: 320px;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  margin-top: 10px;
  z-index: 99999;
  flex-direction: column;
  animation: dropdownFade 0.2s ease-out;
}
.dropdown-content a {
  display: block;
  padding: 14px 20px;
  border-bottom: 1px solid #f1f5f9;
  font-weight: 500;
  font-size: 0.95rem;
  color: var(--text);
  text-decoration: none;
  border-radius: 0;
}
.dropdown-content a:last-child {
  border-bottom: none;
}
.dropdown-content a:hover {
  background: #f4f7fa;
  color: var(--blue);
  padding-left: 24px;
}

.dropdown:hover .dropdown-content {
  display: flex !important;
}


/* HERO */
.hero-orb{
  position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none;
}
.orb1{width:600px;height:600px;background:radial-gradient(circle,rgba(136, 204, 243, 0.35),transparent 70%);top:-100px;left:-100px;}
.orb2{width:500px;height:500px;background:radial-gradient(circle,rgba(0,212,255,0.2),transparent 70%);bottom:-100px;right:-100px;}
.hero-content{position:relative;z-index:1;max-width:900px;}
.hero-chip{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(9, 26, 182, 0.08);border:1px solid rgba(113, 175, 233, 0.25);
  color:var(--cyan);font-size:.75rem;font-family:"open sans",sans-serif;
  padding:6px 16px;border-radius:99px;margin-bottom:28px;letter-spacing:.05em;
}
.service-hero {
  padding: 140px 5% 80px;
  background:radial-gradient(circle,rgba(218, 248, 246, 0.35),transparent 70%);
  position: relative;
  overflow: hidden;
}
.service-hero::before { content:""; position:absolute; inset:0; background-image:linear-gradient(rgba(0,131,143,0.06) 1px,transparent 1px),linear-gradient(90deg,rgba(0,131,143,0.06) 1px,transparent 1px); background-size:36px 36px; pointer-events:none; }
.service-hero::after { content:""; position:absolute; inset:0; background:radial-gradient(circle at 75% 20%,rgba(0,131,143,0.25) 0%,transparent 55%),radial-gradient(circle at 15% 85%,rgba(245,197,24,0.08) 0%,transparent 45%); pointer-events:none; }
.hero-inner { position:relative; z-index:1; max-width:800px; }
.hero-eyebrow { display:inline-block; background:rgba(245,197,24,0.15); color:var(--gold); border:1px solid rgba(245,197,24,0.3); font-size:0.78rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:24px; }
service-hero h1 { font-size:var(--fs-title);  color: var(--navy); font-weight:800; letter-spacing:-0.02em; margin-bottom:22px; animation:slideUp 0.7s cubic-bezier(0.16,1,0.3,1) both; }
.service-hero p { font-size:var(--fs-body); color: var(--text); max-width:700px; line-height:1.8; animation:slideUp 0.9s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badges { display:flex; flex-wrap:wrap; gap:12px; margin-top:36px; animation:slideUp 1.1s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badge { display:flex; align-items:center; gap:8px; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.9); font-size:0.85rem; font-weight:600; padding:8px 16px; border-radius:100px; }
.hero-badge svg { color:var(--gold); flex-shrink:0; }
@keyframes slideUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

/* Mini hero stat strip */
.hero-stats { display:flex; flex-wrap:wrap; gap:36px; margin-top:48px; position:relative; z-index:1; animation:slideUp 1.3s cubic-bezier(0.16,1,0.3,1) both; }
.hero-stat-item { display:flex; flex-direction:column; gap:4px; }
.hero-stat-value { font-size:clamp(1.6rem,3vw,2.1rem); font-weight:800; color:var(--gold); line-height:1; }
.hero-stat-label { font-size:0.82rem; color:rgba(255,255,255,0.65); font-weight:600; letter-spacing:0.03em; }

/* SECTIONS */
.section { padding:90px 5%; }
.section-alt { background:var(--bg-soft); }
.section-header { text-align:center; margin-bottom:56px; }
.section-header h2 { font-size:var(--fs-title); color:var(--navy); font-weight:800; margin-bottom:14px; }
.section-header h2::after { content:""; display:block; width:52px; height:3px; background:var(--gold); margin:14px auto 0; border-radius:2px; }
.section-header p { font-size:var(--fs-body); color:var(--text-light); max-width:600px; margin:0 auto; }

/* SERVICE CARDS */
.points-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:28px; }
.point-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg); padding:36px; position:relative; overflow:hidden; transition:var(--transition); box-shadow:var(--shadow-sm); }
.point-card::before { content:""; position:absolute; top:0; left:0; width:4px; height:0; background:var(--teal); transition:height 0.35s ease; }
.point-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); border-color:rgba(0,131,143,0.3); }
.point-card:hover::before { height:100%; }
.card-icon { width:52px; height:52px; border-radius:var(--radius-sm); background:var(--teal-light); display:flex; align-items:center; justify-content:center; margin-bottom:22px; color:var(--teal); }
.point-card h3 { font-size:clamp(1rem,2vw,1.15rem); color:var(--navy); margin-bottom:14px; font-weight:700; }
.point-card p { font-size:var(--fs-body); color:var(--text-mid); margin-bottom:18px; line-height:1.7; }
.point-card ul { list-style:none; padding:0; display:flex; flex-direction:column; gap:9px; }
.point-card li { font-size:var(--fs-body); color:var(--text-mid); padding-left:26px; position:relative; line-height:1.6; }
.point-card li::before { content:"✓"; position:absolute; left:0; top:0; color:var(--teal); font-weight:800; }

/* DASHBOARD MOCK PANEL */
.dashboard-grid { display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; }
.dashboard-text h2 { font-size:var(--fs-title); color:var(--navy); font-weight:800; margin-bottom:14px; }
.dashboard-text h2::after { content:""; display:block; width:52px; height:3px; background:var(--gold); margin:14px 0 0; border-radius:2px; }
.dashboard-text > p { font-size:var(--fs-body); color:var(--text-mid); margin:24px 0 32px; line-height:1.8; }
.dashboard-points { display:flex; flex-direction:column; gap:22px; }
.dashboard-point { display:flex; gap:16px; align-items:flex-start; }
.dp-icon { width:44px; height:44px; border-radius:var(--radius-sm); background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px; }
.dashboard-point h4 { font-size:clamp(0.95rem,1.8vw,1.05rem); color:var(--navy); font-weight:700; margin-bottom:5px; }
.dashboard-point p { font-size:var(--fs-body); color:var(--text-light); line-height:1.65; margin:0; }

/* Visual mock dashboard card */
.mock-dashboard { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg); box-shadow:var(--shadow-lg); overflow:hidden; }
.mock-header { background:var(--navy); padding:18px 24px; display:flex; align-items:center; justify-content:space-between; }
.mock-header-title { color:#ffffff; font-size:0.95rem; font-weight:700; }
.mock-dots { display:flex; gap:6px; }
.mock-dot { width:9px; height:9px; border-radius:50%; background:rgba(255,255,255,0.3); }
.mock-body { padding:28px 24px; }
.mock-kpis { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:24px; }
.mock-kpi { background:var(--bg-soft); border-radius:var(--radius-sm); padding:16px 14px; text-align:center; }
.mock-kpi-val { font-size:1.3rem; font-weight:800; color:var(--teal); }
.mock-kpi-lab { font-size:0.72rem; color:var(--text-light); font-weight:600; margin-top:4px; }
.mock-chart { display:flex; align-items:flex-end; gap:8px; height:90px; padding:0 4px; }
.mock-bar { flex:1; background:linear-gradient(180deg,var(--teal) 0%,rgba(0,131,143,0.4) 100%); border-radius:4px 4px 0 0; }

/* STATS */
.stats-section { background:var(--white); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:72px 5%; }
.stats-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:0; }
.stat-box { padding:32px 24px; text-align:center; border-right:1px solid var(--border); transition:var(--transition); }
.stat-box:last-child { border-right:none; }
.stat-box:hover { background:var(--bg-soft); }
.stat-icon { width:48px; height:48px; border-radius:50%; background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; }
.stat-box h3 { font-size:clamp(1rem,2vw,1.05rem); color:var(--navy); font-weight:700; margin-bottom:8px; }
.stat-box p { font-size:var(--fs-body); color:var(--text-light); line-height:1.55; margin:0; }

/* PROCESS */
.process-section { padding:90px 5%; }
.process-grid { display:grid; grid-template-columns:repeat(5,1fr); gap:0; position:relative; }
.process-grid::before { content:""; position:absolute; top:36px; left:calc(10% + 26px); right:calc(10% + 26px); height:2px; background:var(--border); z-index:0; }
.process-step { text-align:center; padding:0 10px; position:relative; z-index:1; }
.step-num { width:52px; height:52px; border-radius:50%; background:var(--navy); color:#fff; font-size:0.95rem; font-weight:800; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; border:3px solid var(--white); box-shadow:0 0 0 2px var(--border); transition:var(--transition); }
.process-step:hover .step-num { background:var(--teal); box-shadow:0 0 0 2px var(--teal); }
.process-step h3 { font-size:clamp(0.85rem,1.5vw,0.95rem); color:var(--navy); margin-bottom:7px; font-weight:700; }
.process-step p { font-size:clamp(0.8rem,1.4vw,0.88rem); color:var(--text-light); line-height:1.55; }

/* TOOLS / TECH STRIP */
.tools-strip { background:var(--bg-soft); padding:60px 5%; text-align:center; }
.tools-strip h3 { font-size:clamp(0.95rem,1.8vw,1.1rem); color:var(--navy); font-weight:700; margin-bottom:30px; }
.tools-row { display:flex; flex-wrap:wrap; justify-content:center; gap:14px; }
.tool-pill { background:var(--white); border:1px solid var(--border); color:var(--text-mid); font-size:0.88rem; font-weight:600; padding:10px 20px; border-radius:100px; transition:var(--transition); }
.tool-pill:hover { border-color:var(--teal); color:var(--teal); box-shadow:var(--shadow-sm); }

/* INDUSTRIES */
.industries-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
.industry-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-md); padding:28px 22px; text-align:center; transition:var(--transition); box-shadow:var(--shadow-sm); }
.industry-card:hover { transform:translateY(-3px); box-shadow:var(--shadow-md); border-color:rgba(0,131,143,0.25); }
.industry-icon { width:52px; height:52px; border-radius:50%; background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; }
.industry-card h3 { font-size:clamp(0.9rem,1.8vw,1rem); color:var(--navy); font-weight:700; margin-bottom:8px; }
.industry-card p { font-size:clamp(0.85rem,1.5vw,0.95rem); color:var(--text-light); line-height:1.55; margin:0; }

/* CTA */
.cta-section { background:linear-gradient(140deg,#001220 0%, var(--navy) 60%, #004d40 100%); padding:90px 5%; text-align:center; position:relative; overflow:hidden; }
.cta-section::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 80% 50%,rgba(0,131,143,0.15) 0%,transparent 60%); pointer-events:none; }
.cta-inner { position:relative; z-index:1; }
.cta-section h2 { font-size:var(--fs-title); color:#ffffff; font-weight:800; margin-bottom:18px; }
.cta-section p { font-size:var(--fs-body); color:rgba(255,255,255,0.8); max-width:580px; margin:0 auto 36px; line-height:1.8; }
.btn-primary { display:inline-block; background:var(--gold); color:var(--navy); font-family:var(--font); font-size:var(--fs-body); font-weight:700; padding:15px 38px; border-radius:var(--radius-sm); transition:var(--transition); box-shadow:0 4px 18px rgba(245,197,24,0.28); }
.btn-primary:hover { background:var(--gold-hover); transform:translateY(-2px); box-shadow:0 8px 24px rgba(245,197,24,0.4); }
.btn-outline { display:inline-block; background:transparent; color:#ffffff; font-family:var(--font); font-size:var(--fs-body); font-weight:700; padding:14px 36px; border-radius:var(--radius-sm); border:2px solid rgba(255,255,255,0.4); transition:var(--transition); margin-left:16px; }
.btn-outline:hover { border-color:#ffffff; background:rgba(255,255,255,0.08); }

/* FOOTER */
footer { background:var(--white); border-top:2px solid var(--teal); padding:36px 5%; }
.footer-inner { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px; }
.footer-inner p { font-size:0.9rem; color:var(--text-light); margin:0; }
.footer-links { display:flex; gap:24px; }
.footer-links a { font-size:0.9rem; color:var(--text-light); transition:color 0.2s; }
.footer-links a:hover { color:var(--navy); }

/* RESPONSIVE */
@media (max-width:992px) {
  .nav-toggle { display:block; }
  .nav-links { position:fixed; top:88px; left:0; right:0; background:#ffffff; border-bottom:1px solid var(--border); flex-direction:column; padding:24px; gap:8px; box-shadow:var(--shadow-lg); display:none; max-height:calc(100vh - 88px); overflow-y:auto; }
  .nav-links.active { display:flex; }
  .nav-cta { display:none; }
  .mobile-cta { display:none; width:100%; text-align:center; background:var(--gold); color:var(--navy) !important; padding:12px; border-radius:var(--radius-sm); font-weight:700; }
  .mobile-cta.show { display:block; }
  .dropdown-content { position:static; transform:none; box-shadow:none; border:none; min-width:100%; margin-top:4px; background:var(--bg-soft); border-radius:var(--radius-sm); display:none !important; animation:none; }
  .dropdown.active .dropdown-content { display:flex !important; }
  .dropdown .dropbtn { display:flex; justify-content:space-between; align-items:center; width:100%; }
  .dropdown .dropbtn::after { content:"▼"; font-size:0.7rem; margin-left:8px; transition:transform 0.25s ease; }
  .dropdown.active .dropbtn::after { transform:rotate(180deg); }
  .points-grid { grid-template-columns:1fr; }
  .dashboard-grid { grid-template-columns:1fr; gap:40px; }
  .dashboard-grid .mock-dashboard { order:-1; }
  .industries-grid { grid-template-columns:repeat(2,1fr); }
  .stats-grid { grid-template-columns:repeat(2,1fr); }
  .stat-box:nth-child(2) { border-right:none; }
  .stat-box { border-bottom:1px solid var(--border); }
  .stat-box:last-child { border-bottom:none; }
  .process-grid { grid-template-columns:repeat(3,1fr); gap:28px; }
  .process-grid::before { display:none; }
  .hero-stats { gap:24px; }
}
@media (max-width:640px) {
  .section,.process-section,.cta-section { padding:64px 5%; }
  .stats-section { padding:56px 5%; }
  .tools-strip { padding:48px 5%; }
  .service-hero { padding:140px 5% 80px; }
  .industries-grid { grid-template-columns:1fr; }
  .stats-grid { grid-template-columns:1fr; }
  .stat-box { border-right:none; }
  .process-grid { grid-template-columns:repeat(2,1fr); gap:24px; }
  .btn-outline { margin-left:0; margin-top:12px; display:block; }
  .footer-inner { flex-direction:column; text-align:center; }
  .mock-kpis { grid-template-columns:1fr; }
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav id="navbar">
  <div class="nav-container">
    <div class="nav-logo">
      <img src="logo.png" alt="ABPO Africa Limited">
    </div>
    <div class="nav-links" id="navLinks">
      <a href="index.php#home">Home</a>
      <a href="index.php#about">About Us</a>
      <div class="dropdown" id="servicesDropdown">
        <a href="index.php#services" class="dropbtn">Services</a>
        <div class="dropdown-content">
          <a href="it-risk-advisory.php">IT Risk Advisory &amp; Analytics</a>
          <a href="business-process-outsourcing.php">Business Process Outsourcing</a>
          <a href="fraud-forensic-investigation.php">Fraud &amp; Forensic Investigation</a>
          <a href="risk-management-advisory.php">Risk Management &amp; Advisory</a>
          <a href="data-analytics-business-insights.php" class="active-page">Data Analytics &amp; Business Insights</a>
        </div>
      </div>
      <a href="index.php#why-us">Why Us</a>
      <a href="blog.php">Blog</a>
      <a href="careers.php">Careers</a>
      <a href="index.php#contact">Contact</a>
      <a href="Testimonies.php">Testimonies</a>
    </div>
    <a href="index.php#contact" class="nav-cta">Get a Quote</a>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
      <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>
</nav>

<!-- HERO -->
<section class="service-hero">
  <div class="wrap">
    <div class="hero-inner">
      
      <h1>Turn Raw Data Into Decisive Action</h1>
      <p>ABPO Africa Limited transforms scattered, complex data into clear, actionable intelligence — empowering leadership teams to make faster, evidence-based decisions and uncover opportunities hidden in plain sight.</p>
      <div class="hero-badges">
        <span class="hero-badge">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Business Intelligence
        </span>
        <span class="hero-badge">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Predictive Analytics
        </span>
        <span class="hero-badge">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Custom Dashboards
        </span>
        <span class="hero-badge">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Data Governance
        </span>
      </div>

      
      </div>
    </div>
  </div>
</section>

<!-- WHAT WE OFFER -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <h2>What We Offer</h2>
      <p>End-to-end analytics services that take you from raw, fragmented data to clear, decision-ready insight.</p>
    </div>
    <div class="points-grid">

      <div class="point-card">
        <div class="card-icon">
        
        </div>
        <h3>Business Intelligence &amp; Dashboards</h3>
        <p>Interactive dashboards that put real-time performance data at your team's fingertips.</p>
        <ul>
          <li>Custom dashboard design and development</li>
          <li>Real-time KPI and metric tracking</li>
          <li>Self-service reporting tools</li>
          <li>Executive summary dashboards</li>
          <li>Mobile-friendly reporting views</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          
        </div>
        <h3>Predictive &amp; Advanced Analytics</h3>
        <p>Statistical and machine-learning models that anticipate trends before they happen.</p>
        <ul>
          <li>Demand and revenue forecasting</li>
          <li>Customer churn prediction</li>
          <li>Risk and fraud scoring models</li>
          <li>Scenario and what-if analysis</li>
          <li>Machine learning model development</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          
        </div>
        <h3>Data Management &amp; Governance</h3>
        <p>Clean, well-governed data infrastructure that you can trust for every decision.</p>
        <ul>
          <li>Data quality assessment and cleansing</li>
          <li>Master data management</li>
          <li>Data governance framework design</li>
          <li>Data warehouse and pipeline setup</li>
          <li>Data privacy and compliance alignment</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
         
        </div>
        <h3>Market &amp; Customer Analytics</h3>
        <p>Deep understanding of customer behaviour and market dynamics to sharpen strategy.</p>
        <ul>
          <li>Customer segmentation and profiling</li>
          <li>Market trend and competitor analysis</li>
          <li>Customer lifetime value modelling</li>
          <li>Sentiment and feedback analysis</li>
          <li>Pricing and promotion analytics</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          
        </div>
        <h3>Risk &amp; Fraud Analytics</h3>
        <p>Data-driven anomaly detection that flags irregularities before they become losses.</p>
        <ul>
          <li>Anomaly and outlier detection</li>
          <li>Transaction monitoring analytics</li>
          <li>Key risk indicator (KRI) dashboards</li>
          <li>Compliance and audit analytics</li>
          <li>Early warning system development</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          
        </div>
        <h3>Analytics Training &amp; Enablement</h3>
        <p>Build internal data fluency so your teams can sustain insight-driven decision-making.</p>
        <ul>
          <li>Data literacy workshops</li>
          <li>Dashboard tool training (Power BI, Tableau)</li>
          <li>Analytics capability building</li>
          <li>Data-driven culture coaching</li>
          <li>Ongoing analytics support and mentoring</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- DASHBOARD SHOWCASE -->
<section class="section section-alt">
  <div class="wrap">
    <div class="dashboard-grid">

      <div class="dashboard-text">
        <h2>See Your Business Clearly</h2>
        <p>Stop chasing numbers across spreadsheets. We build live, intuitive dashboards that surface the metrics that matter most — so your team spends time acting on insight, not searching for it.</p>

        <div class="dashboard-points">

          <div class="dashboard-point">
            <div class="dp-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div>
              <h4>Real-Time Visibility</h4>
              <p>Live data feeds keep dashboards current, so decisions are based on what's happening now.</p>
            </div>
          </div>

          <div class="dashboard-point">
            <div class="dp-icon">
              
            </div>
            <div>
              <h4>Single Source of Truth</h4>
              <p>One unified view eliminates conflicting reports and builds organization-wide trust in the numbers.</p>
            </div>
          </div>

          <div class="dashboard-point">
            <div class="dp-icon">
               
            </div>
            <div>
              <h4>Built Around Your Users</h4>
              <p>Dashboards tailored to each audience — from frontline teams to the boardroom.</p>
            </div>
          </div>

        </div>
      </div>

     
          </div>
          <div class="mock-chart">
            <div class="mock-bar" style="height:45%"></div>
            <div class="mock-bar" style="height:68%"></div>
            <div class="mock-bar" style="height:52%"></div>
            <div class="mock-bar" style="height:80%"></div>
            <div class="mock-bar" style="height:60%"></div>
            <div class="mock-bar" style="height:95%"></div>
            <div class="mock-bar" style="height:74%"></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats-section">
  <div class="wrap">
    <div class="stats-grid">

      <div class="stat-box">
        <div class="stat-icon">
            
        </div>
        <h3>Dashboards Built</h3>
        <p>Custom analytics dashboards delivered across diverse industries and use cases.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Faster Decisions</h3>
        <p>Average reduction in time-to-insight reported by clients after deployment.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3>Data Accuracy Improved</h3>
        <p>Cleansing and governance projects that materially raise reporting confidence.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
           
        </div>
        <h3>Industries Served</h3>
        <p>Proven analytics expertise spanning finance, government, retail, and more.</p>
      </div>

    </div>
  </div>
</section>




<!-- INDUSTRIES -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <h2>Industries We Serve</h2>
      <p>Analytics solutions tailored to the data challenges unique to each sector we work with.</p>
    </div>
    <div class="industries-grid">

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </div>
        <h3>Banking &amp; Finance</h3>
        <p>Transaction analytics, credit scoring, and financial performance reporting.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3>Healthcare</h3>
        <p>Patient outcome analytics, resource planning, and operational dashboards.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        </div>
        <h3>Retail &amp; E-commerce</h3>
        <p>Customer analytics, inventory forecasting, and sales performance insights.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3>Government &amp; Public Sector</h3>
        <p>Citizen services analytics, budget tracking, and policy impact dashboards.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Energy &amp; Utilities</h3>
        <p>Consumption analytics, asset performance, and operational efficiency dashboards.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
        </div>
        <h3>Telecoms &amp; Technology</h3>
        <p>Subscriber analytics, network performance, and churn prediction models.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
        </div>
        <h3>Insurance</h3>
        <p>Claims analytics, underwriting models, and policyholder behaviour insights.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <h3>Education</h3>
        <p>Student performance analytics, enrollment trends, and institutional reporting.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <h3>Corporate Enterprises</h3>
        <p>Enterprise-wide performance dashboards and cross-functional reporting.</p>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="wrap">
    <div class="cta-inner">
      <h2>Ready to make data your competitive edge?</h2>
      <p>Let ABPO Africa Limited turn your raw data into the clear, actionable insight your leadership team needs to move faster and smarter.</p>
      <a href="index.php#contact" class="btn-primary">Request a Data Consultation</a>
      <a href="index.php#services" class="btn-outline">Explore All Services</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="wrap footer-inner">
    <p>&copy; 2025 ABPO Africa Limited. All rights reserved.</p>
    <div class="footer-links">
      <a href="mailto:info@abpoafrica.com">info@abpoafrica.com</a>
    </div>
  </div>
</footer>

<script>
  const navbar = document.getElementById("navbar");
  window.addEventListener("scroll", () => { navbar.classList.toggle("scrolled", window.scrollY > 40); });

  const navToggle = document.getElementById("navToggle");
  const navLinks  = document.getElementById("navLinks");
  const mobileCta = document.getElementById("mobileCta");

  navToggle.addEventListener("click", () => {
    const open = navLinks.classList.toggle("active");
    mobileCta.classList.toggle("show", open);
  });

  const servicesDropdown = document.getElementById("servicesDropdown");
  const dropbtn = servicesDropdown.querySelector(".dropbtn");

  dropbtn.addEventListener("click", (e) => {
    if (window.innerWidth <= 992) { e.preventDefault(); servicesDropdown.classList.toggle("active"); }
  });

  navLinks.querySelectorAll("a:not(.dropbtn)").forEach(link => {
    link.addEventListener("click", () => {
      navLinks.classList.remove("active");
      mobileCta.classList.remove("show");
    });
  });
</script>

</body>
</html>