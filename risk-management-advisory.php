<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Risk Management & Advisory | ABPO Africa Limited</title>

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
.service-hero::before { content:""; position:absolute; inset:0; background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px); background-size:48px 48px; pointer-events:none; }
.service-hero::after { content:""; position:absolute; inset:0; background:radial-gradient(circle at 78% 25%,rgba(0,131,143,0.22) 0%,transparent 55%),radial-gradient(circle at 12% 85%,rgba(245,197,24,0.07) 0%,transparent 45%); pointer-events:none; }
.hero-inner { position:relative; z-index:1; max-width:800px; }
.hero-eyebrow { display:inline-block; background:rgba(245,197,24,0.15); color:var(--gold); border:1px solid rgba(245,197,24,0.3); font-size:0.78rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:24px; }
.service-hero h1 { font-size:var(--fs-title);  color: var(--navy); font-weight:800; letter-spacing:-0.02em; margin-bottom:22px; animation:slideUp 0.7s cubic-bezier(0.16,1,0.3,1) both; }
.service-hero p { font-size:var(--fs-body); color: var(--text); max-width:700px; line-height:1.8; animation:slideUp 0.9s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badges { display:flex; flex-wrap:wrap; gap:12px; margin-top:36px; animation:slideUp 1.1s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badge { display:flex; align-items:center; gap:8px; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.9); font-size:0.85rem; font-weight:600; padding:8px 16px; border-radius:100px; }
.hero-badge svg { color:var(--gold); flex-shrink:0; }
@keyframes slideUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

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

/* RISK FRAMEWORK — circular wheel layout */
.framework-grid { display:grid; grid-template-columns:repeat(5,1fr); gap:20px; }
.framework-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg); padding:30px 22px; text-align:center; transition:var(--transition); box-shadow:var(--shadow-sm); position:relative; }
.framework-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-md); border-color:rgba(0,131,143,0.25); }
.framework-num { width:40px; height:40px; border-radius:50%; background:var(--navy); color:#fff; font-size:0.95rem; font-weight:800; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; transition:var(--transition); }
.framework-card:hover .framework-num { background:var(--teal); }
.framework-card h3 { font-size:clamp(0.92rem,1.7vw,1.02rem); color:var(--navy); font-weight:700; margin-bottom:10px; }
.framework-card p { font-size:clamp(0.82rem,1.4vw,0.92rem); color:var(--text-light); line-height:1.6; margin:0; }

/* RISK CATEGORIES — 2-col text + visual */
.categories-grid { display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; }
.categories-text h2 { font-size:var(--fs-title); color:var(--navy); font-weight:800; margin-bottom:14px; }
.categories-text h2::after { content:""; display:block; width:52px; height:3px; background:var(--gold); margin:14px 0 0; border-radius:2px; }
.categories-text > p { font-size:var(--fs-body); color:var(--text-mid); margin:24px 0 32px; line-height:1.8; }
.category-points { display:flex; flex-direction:column; gap:22px; }
.category-point { display:flex; gap:16px; align-items:flex-start; }
.cp-icon { width:44px; height:44px; border-radius:var(--radius-sm); background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px; }
.category-point h4 { font-size:clamp(0.95rem,1.8vw,1.05rem); color:var(--navy); font-weight:700; margin-bottom:5px; }
.category-point p { font-size:var(--fs-body); color:var(--text-light); line-height:1.65; margin:0; }

.risk-matrix-panel { background:linear-gradient(140deg, var(--navy) 0%, var(--teal) 100%); border-radius:var(--radius-lg); padding:44px 38px; position:relative; overflow:hidden; }
.risk-matrix-panel::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 90% 10%,rgba(245,197,24,0.1) 0%,transparent 50%); pointer-events:none; }
.risk-matrix-panel h3 { color:#ffffff; font-size:clamp(1.2rem,2.5vw,1.5rem); font-weight:800; margin-bottom:20px; position:relative; z-index:1; }
.risk-matrix-panel h3 span { color:var(--gold); }
.risk-matrix-panel p { color:rgba(255,255,255,0.8); font-size:var(--fs-body); line-height:1.8; margin-bottom:28px; position:relative; z-index:1; }
.matrix-tags { display:flex; flex-wrap:wrap; gap:10px; position:relative; z-index:1; }
.matrix-tag { background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.18); color:rgba(255,255,255,0.92); font-size:0.85rem; font-weight:600; padding:9px 16px; border-radius:100px; }

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
.process-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:0; position:relative; }
.process-grid::before { content:""; position:absolute; top:36px; left:calc(12.5% + 28px); right:calc(12.5% + 28px); height:2px; background:var(--border); z-index:0; }
.process-step { text-align:center; padding:0 16px; position:relative; z-index:1; }
.step-num { width:52px; height:52px; border-radius:50%; background:var(--navy); color:#fff; font-size:0.95rem; font-weight:800; display:flex; align-items:center; justify-content:center; margin:0 auto 18px; border:3px solid var(--white); box-shadow:0 0 0 2px var(--border); transition:var(--transition); }
.process-step:hover .step-num { background:var(--teal); box-shadow:0 0 0 2px var(--teal); }
.process-step h3 { font-size:clamp(0.88rem,1.6vw,0.98rem); color:var(--navy); margin-bottom:8px; font-weight:700; }
.process-step p { font-size:clamp(0.82rem,1.4vw,0.9rem); color:var(--text-light); line-height:1.55; }

/* INDUSTRIES */
.industries-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
.industry-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-md); padding:28px 22px; text-align:center; transition:var(--transition); box-shadow:var(--shadow-sm); }
.industry-card:hover { transform:translateY(-3px); box-shadow:var(--shadow-md); border-color:rgba(0,131,143,0.25); }
.industry-icon { width:52px; height:52px; border-radius:50%; background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; }
.industry-card h3 { font-size:clamp(0.9rem,1.8vw,1rem); color:var(--navy); font-weight:700; margin-bottom:8px; }
.industry-card p { font-size:clamp(0.85rem,1.5vw,0.95rem); color:var(--text-light); line-height:1.55; margin:0; }

/* CTA */
.cta-section { background:linear-gradient(140deg, var(--navy) 0%, var(--teal) 100%); padding:90px 5%; text-align:center; position:relative; overflow:hidden; }
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
@media (max-width:1100px) {
  .framework-grid { grid-template-columns:repeat(3,1fr); }
  .industries-grid { grid-template-columns:repeat(2,1fr); }
}
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
  .categories-grid { grid-template-columns:1fr; gap:40px; }
  .stats-grid { grid-template-columns:repeat(2,1fr); }
  .stat-box:nth-child(2) { border-right:none; }
  .stat-box { border-bottom:1px solid var(--border); }
  .stat-box:last-child { border-bottom:none; }
  .process-grid { grid-template-columns:repeat(2,1fr); gap:32px; }
  .process-grid::before { display:none; }
}
@media (max-width:640px) {
  .section,.process-section,.cta-section { padding:64px 5%; }
  .stats-section { padding:56px 5%; }
  .service-hero { padding:140px 5% 80px; }
  .framework-grid { grid-template-columns:repeat(2,1fr); }
  .industries-grid { grid-template-columns:1fr; }
  .stats-grid { grid-template-columns:1fr; }
  .stat-box { border-right:none; }
  .process-grid { grid-template-columns:1fr; }
  .btn-outline { margin-left:0; margin-top:12px; display:block; }
  .footer-inner { flex-direction:column; text-align:center; }
  .risk-matrix-panel { padding:30px 24px; }
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
          <a href="risk-management-advisory.php" class="active-page">Risk Management &amp; Advisory</a>
          <a href="data-analytics-business-insights.php">Data Analytics &amp; Business Insights</a>
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
      
      <h1>Navigate Uncertainty with Confidence</h1>
      <p>ABPO Africa Limited helps organizations build resilient, enterprise-wide risk management frameworks that anticipate threats, support sound decision-making, and turn risk into a strategic advantage.</p>
      <div class="hero-badges">
        
      </div>
    </div>
  </div>
</section>

<!-- WHAT WE OFFER -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <h2>What We Offer</h2>
      <p>End-to-end risk advisory services that help leadership teams identify exposure, strengthen governance, and build organizational resilience.</p>
    </div>
    <div class="points-grid">

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <h3>Enterprise Risk Management (ERM)</h3>
        <p>Holistic frameworks that embed risk awareness into strategy, operations, and culture.</p>
        <ul>
          <li>ERM framework design and implementation</li>
          <li>Risk appetite and tolerance setting</li>
          <li>Risk identification and classification</li>
          <li>Board and committee risk reporting</li>
          <li>Risk culture and awareness programs</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3>Governance, Risk &amp; Compliance (GRC)</h3>
        <p>Integrated governance structures that align risk management with regulatory obligations.</p>
        <ul>
          <li>Corporate governance framework reviews</li>
          <li>Policy and procedure development</li>
          <li>Regulatory compliance mapping</li>
          <li>Internal controls design and testing</li>
          <li>GRC technology advisory</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Business Continuity &amp; Resilience</h3>
        <p>Plans and capabilities that keep your organization operating through disruption.</p>
        <ul>
          <li>Business continuity plan development</li>
          <li>Business impact analysis</li>
          <li>Disaster recovery planning</li>
          <li>Crisis management frameworks</li>
          <li>Continuity testing and simulations</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
        </div>
        <h3>Financial &amp; Strategic Risk Advisory</h3>
        <p>Insight into the risks that threaten financial performance and long-term strategy.</p>
        <ul>
          <li>Market and credit risk assessments</li>
          <li>Liquidity and treasury risk reviews</li>
          <li>Strategic risk scenario planning</li>
          <li>Mergers &amp; acquisitions risk due diligence</li>
          <li>Capital and investment risk advisory</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <h3>Operational Risk Management</h3>
        <p>Strengthen day-to-day processes against the risks most likely to disrupt operations.</p>
        <ul>
          <li>Process risk mapping and assessment</li>
          <li>Third-party and vendor risk management</li>
          <li>Health, safety &amp; environmental risk reviews</li>
          <li>Key risk indicator (KRI) development</li>
          <li>Incident and loss event management</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <h3>Risk Training &amp; Capacity Building</h3>
        <p>Equip your people with the knowledge and tools to manage risk proactively.</p>
        <ul>
          <li>Board and executive risk workshops</li>
          <li>Risk management certification support</li>
          <li>Department-level risk training</li>
          <li>Risk champion network development</li>
          <li>Customized training material design</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- RISK FRAMEWORK -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <h2>Our Risk Management Framework</h2>
      <p>A globally recognized five-pillar methodology adapted for the African business environment.</p>
    </div>
    <div class="framework-grid">

      <div class="framework-card">
        <div class="framework-num">1</div>
        <h3>Identify</h3>
        <p>Systematic discovery of risks across strategic, operational, financial, and compliance domains.</p>
      </div>

      <div class="framework-card">
        <div class="framework-num">2</div>
        <h3>Assess</h3>
        <p>Evaluate likelihood and impact to prioritize the risks that matter most.</p>
      </div>

      <div class="framework-card">
        <div class="framework-num">3</div>
        <h3>Mitigate</h3>
        <p>Design and implement controls that reduce risk to within acceptable tolerance.</p>
      </div>

      <div class="framework-card">
        <div class="framework-num">4</div>
        <h3>Monitor</h3>
        <p>Continuous tracking of key risk indicators and control effectiveness over time.</p>
      </div>

      <div class="framework-card">
        <div class="framework-num">5</div>
        <h3>Report</h3>
        <p>Clear, actionable reporting that keeps boards and leadership informed and accountable.</p>
      </div>

    </div>
  </div>
</section>

<!-- RISK CATEGORIES -->
<section class="section">
  <div class="wrap">
    <div class="categories-grid">

      <div class="categories-text">
        <h2>A Holistic View of Risk</h2>
        <p>Risk doesn't live in a single department — it spans strategy, finance, operations, and reputation. Our advisory approach connects the dots across your organization to build one coherent risk picture.</p>

        <div class="category-points">

          <div class="category-point">
            <div class="cp-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
              <h4>Strategic Risk</h4>
              <p>Risks to your business model, competitive position, and long-term growth objectives.</p>
            </div>
          </div>

          <div class="category-point">
            <div class="cp-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <div>
              <h4>Financial Risk</h4>
              <p>Exposure to market volatility, credit risk, liquidity constraints, and capital adequacy.</p>
            </div>
          </div>

          <div class="category-point">
            <div class="cp-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
              <h4>Operational Risk</h4>
              <p>Disruptions from people, processes, systems, or external events affecting day-to-day delivery.</p>
            </div>
          </div>

          <div class="category-point">
            <div class="cp-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div>
              <h4>Compliance &amp; Reputational Risk</h4>
              <p>Regulatory breaches, governance failures, and events that damage stakeholder trust.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="risk-matrix-panel">
        <h3>Built for the <span>African Context</span></h3>
        <p>We tailor every risk framework to local regulatory environments, market conditions, and the operational realities of doing business across Africa — not a generic template adapted after the fact.</p>
        <div class="matrix-tags">
          <span class="matrix-tag">Regulatory Alignment</span>
          <span class="matrix-tag">Local Market Insight</span>
          <span class="matrix-tag">Board-Level Reporting</span>
          <span class="matrix-tag">Cross-Border Expertise</span>
          <span class="matrix-tag">ISO 31000 Aligned</span>
          <span class="matrix-tag">COSO Framework</span>
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
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3>Frameworks Implemented</h3>
        <p>Enterprise risk frameworks designed and deployed across diverse industries.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <h3>Boards Advised</h3>
        <p>Senior leadership teams supported with risk governance and oversight guidance.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Continuity Plans Built</h3>
        <p>Business continuity and crisis management plans tested and operationalized.</p>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3>Years of Advisory Experience</h3>
        <p>A trusted risk advisory partner with deep cross-sector expertise across Africa.</p>
      </div>

    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="process-section section-alt">
  <div class="wrap">
    <div class="section-header">
      <h2>How We Engage</h2>
      <p>A structured four-phase advisory engagement that moves from diagnosis to embedded, sustainable risk practice.</p>
    </div>
    <div class="process-grid">
      <div class="process-step">
        <div class="step-num">1</div>
        <h3>Diagnose</h3>
        <p>Assess current risk maturity, governance structures, and existing gaps against best practice.</p>
      </div>
      <div class="process-step">
        <div class="step-num">2</div>
        <h3>Design</h3>
        <p>Build a tailored risk framework, policies, and reporting structures aligned to your strategy.</p>
      </div>
      <div class="process-step">
        <div class="step-num">3</div>
        <h3>Implement</h3>
        <p>Roll out tools, training, and processes with hands-on support for embedding change.</p>
      </div>
      <div class="process-step">
        <div class="step-num">4</div>
        <h3>Sustain</h3>
        <p>Ongoing advisory and periodic reviews keep the framework current and effective.</p>
      </div>
    </div>
  </div>
</section>

<!-- INDUSTRIES -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <h2>Industries We Serve</h2>
      <p>Risk advisory expertise tailored to the unique pressures facing these key sectors.</p>
    </div>
    <div class="industries-grid">

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </div>
        <h3>Banking &amp; Finance</h3>
        <p>Credit, market, and operational risk frameworks for financial institutions.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Energy &amp; Utilities</h3>
        <p>Resilience planning and strategic risk management for energy providers.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3>Government &amp; Public Sector</h3>
        <p>Governance and public risk frameworks for government institutions.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </div>
        <h3>Healthcare</h3>
        <p>Patient safety, regulatory, and operational risk advisory for healthcare providers.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
        </div>
        <h3>Insurance</h3>
        <p>Underwriting, claims, and solvency risk management frameworks.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        </div>
        <h3>Retail &amp; Manufacturing</h3>
        <p>Supply chain, inventory, and operational risk management for production businesses.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
        </div>
        <h3>Telecoms &amp; Technology</h3>
        <p>Technology, cyber, and strategic risk advisory for telecom operators.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <h3>Corporate Enterprises</h3>
        <p>Enterprise-wide risk programs for diversified corporate groups.</p>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="wrap">
    <div class="cta-inner">
      <h2>Ready to build a stronger risk function?</h2>
      <p>Partner with ABPO Africa Limited to design and embed a risk management framework that protects your organization and supports confident decision-making.</p>
      <a href="index.php#contact" class="btn-primary">Schedule a Risk Review</a>
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