<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Business Process Outsourcing | ABPO Africa Limited</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">

<style>
/* =========================
   TOKENS — shared with IT Risk Advisory page
========================= */
:root{
  --navy: #0b1f4d;
  --navy-2: #122a63;
  --teal: #0f7a78;
  --teal-light: #eaf5f4;
  --gold: #c9a227;
  --gold-light: #e8c766;
  --gold-hover: #b8931e;

  --white: #ffffff;
  --text: #23293a;
  --text-mid: #4b5468;
  --text-light: #6b7385;
  --muted: #6b7385;
  --card: #ffffff;
  --border: #e3e8ee;
  --bg-soft: #f6f8fb;
  --glow: rgba(15,122,120,0.15);

  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 16px;
  --shadow-sm: 0 2px 8px rgba(11,31,77,0.06);
  --shadow-md: 0 10px 30px rgba(11,31,77,0.10);
  --shadow-lg: 0 18px 45px rgba(11,31,77,0.14);
  --transition: 0.3s cubic-bezier(0.16,1,0.3,1);

  --fs-title: clamp(1.9rem, 3.6vw, 2.7rem);
  --fs-body: 1rem;

  --font: "Open Sans", system-ui, sans-serif;
  --font-display: "Fraunces", Georgia, serif;
  --font-body: "Open Sans", system-ui, sans-serif;
}

*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  font-family: var(--font-body);
  font-size:16px;
  background: var(--white);
  color: var(--text);
  overflow-x:hidden;
  -webkit-font-smoothing:antialiased;
}

h1, h2, h3, h4, h5, h6, .section-title { font-family: var(--font-display); }
a{ color:inherit; }
.wrap{ max-width:1160px; margin:0 auto; }
::selection{ background: var(--gold-light); color: var(--navy); }
:focus-visible{ outline: 2px solid var(--teal); outline-offset: 3px; border-radius: 4px; }

@media (prefers-reduced-motion: reduce){
  *{ animation-duration: 0.01ms !important; animation-iteration-count: 1 !important; transition-duration: 0.01ms !important; scroll-behavior:auto !important; }
}

.service-card, .learn-more-btn { position: relative; z-index: 10; }
.service-card::after{ pointer-events: none !important; }
.learn-more-btn{ position: relative !important; z-index: 9999 !important; display: inline-block !important; }

/* =========================
   NAVBAR
========================= */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 9999;
  height: 90px;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(8px);
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center;
  transition: all 0.3s ease;
}

nav.scrolled { height: 76px; box-shadow: var(--shadow-sm); background: #ffffff; }

.nav-container {
  display: flex; align-items: center; justify-content: space-between;
  width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 5%;
}

.nav-logo { display: flex; align-items: center; }
.nav-logo img { height: 56px; width: auto; display: block; object-fit: contain; transition: all 0.3s ease; }
nav.scrolled .nav-logo img { height: 46px; }

.nav-links { display: flex; align-items: center; gap: 6px; }

.nav-links a, .dropdown .dropbtn {
  font-size: 0.95rem; font-weight: 600; color: var(--navy);
  text-decoration: none; padding: 10px 14px; border-radius: 8px;
  transition: all 0.25s ease; letter-spacing: 0.01em;
}

.nav-links a:hover, .dropdown .dropbtn:hover { color: var(--teal); background: var(--teal-light); }
.nav-links a.active-page { color: var(--teal); background: var(--teal-light); }

.nav-cta {
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  color: var(--navy) !important;
  padding: 11px 24px !important;
  border-radius: 8px; font-weight: 700 !important; text-decoration: none;
  margin-left: 8px; transition: all 0.25s ease;
  box-shadow: 0 6px 16px rgba(201,162,39,0.30); letter-spacing: 0.01em;
}
.nav-cta:hover { transform: translateY(-2px); box-shadow: 0 10px 22px rgba(201,162,39,0.40); }

.nav-toggle { display: none; background: none; border: none; cursor: pointer; color: var(--navy); padding: 8px; }

/* =========================
   DROPDOWN
========================= */
.dropdown { position: relative; display: inline-block; }

.dropdown-content {
  display: none; position: absolute; top: 100%; left: 50%;
  transform: translateX(-50%); background: #fff; min-width: 320px;
  border-radius: 12px; overflow: hidden; border: 1px solid var(--border);
  box-shadow: var(--shadow-lg); margin-top: 12px; z-index: 99999; flex-direction: column;
}
.dropdown-content::before{
  content:""; position:absolute; top:-6px; left:50%;
  transform:translateX(-50%) rotate(45deg); width:12px; height:12px;
  background:#fff; border-left:1px solid var(--border); border-top:1px solid var(--border);
}
.dropdown-content a {
  display: block; padding: 14px 20px; border-bottom: 1px solid #f1f5f9;
  font-weight: 600; font-size: 0.92rem; color: var(--text);
  text-decoration: none; border-radius: 0; position: relative; z-index: 1; background: #fff;
}
.dropdown-content a:last-child { border-bottom: none; }
.dropdown-content a:hover { background: var(--teal-light); color: var(--teal); padding-left: 24px; }
.dropdown-content a.active-page { color: var(--teal); background: var(--teal-light); font-weight: 700; }
.dropdown:hover .dropdown-content { display: flex; }

/* =========================
   HERO
========================= */
.service-hero {
  padding: 168px 5% 96px;
  position: relative;
  overflow: hidden;
  background: var(--navy);
  background: radial-gradient(1100px 600px at 78% -10%, #12306e 0%, var(--navy) 55%, var(--navy) 100%);
}

.service-hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px);
  background-size: 48px 48px;
  -webkit-mask-image: radial-gradient(700px 500px at 78% 15%, #000 0%, transparent 70%);
          mask-image: radial-gradient(700px 500px at 78% 15%, #000 0%, transparent 70%);
  pointer-events: none;
}

.hero-inner { position: relative; z-index: 1; max-width: 760px; }

.hero-chip{
  display:inline-flex;align-items:center;gap:10px;
  background: rgba(255,255,255,0.06);
  border:1px solid rgba(255,255,255,0.18);
  color: var(--gold-light);
  font-size:.78rem;font-weight:700;
  padding:8px 18px;border-radius:99px;margin-bottom:26px;
  letter-spacing:.12em; text-transform:uppercase;
}
.hero-chip::before{
  content:""; width:7px;height:7px;border-radius:50%; background: var(--gold);
  box-shadow: 0 0 0 4px rgba(201,162,39,0.25);
}

.service-hero h1 {
  font-size: clamp(2.2rem, 4.4vw, 3.2rem);
  color: var(--white); font-weight: 600; letter-spacing: -0.01em;
  line-height: 1.12; margin-bottom: 16px;
}

.service-hero h2 {
  font-family: var(--font-body);
  font-size: clamp(1.05rem, 2vw, 1.3rem);
  color: var(--gold-light); font-weight: 700; margin-bottom: 20px;
}

.service-hero p {
  font-size: 1.05rem; color: rgba(255,255,255,0.78);
  max-width: 620px; line-height: 1.8;
}

.hero-badges { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 34px; }

.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.16);
  color: rgba(255,255,255,0.92);
  font-size: 0.85rem; font-weight: 600;
  padding: 9px 16px; border-radius: 100px;
}
.hero-badge svg { color: var(--gold-light); flex-shrink: 0; }

/* =========================
   SECTION BASE
========================= */
.section { padding: 88px 5%; }
.section-alt { background: var(--bg-soft); }

.section-header { text-align: center; margin-bottom: 56px; max-width: 640px; margin-left:auto; margin-right:auto; }

.section-eyebrow{
  display:inline-block; font-size:.75rem; font-weight:800; letter-spacing:.14em;
  text-transform:uppercase; color: var(--teal); margin-bottom: 12px;
}

.section-header h2 {
  font-size: var(--fs-title); color: var(--navy); font-weight: 600;
  margin-bottom: 14px; letter-spacing: -0.01em;
}

.section-header p { font-size: 1.02rem; color: var(--text-light); line-height: 1.7; }

/* =========================
   ICONS
========================= */
.card-icon{
  width: 50px; height: 50px; border-radius: var(--radius-sm);
  display:flex; align-items:center; justify-content:center;
  background: var(--teal-light); color: var(--teal);
  margin-bottom: 20px; flex-shrink:0;
}
.card-icon svg{ width:24px; height:24px; }

/* =========================
   SERVICES GRID (3 cols)
========================= */
.services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px; }

.service-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 34px 30px;
  position: relative;
  overflow: hidden;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}

.service-card::before {
  content: "";
  position: absolute; top: 0; left: 0; width: 4px; height: 0;
  background: linear-gradient(180deg, var(--teal), var(--navy));
  transition: height 0.35s ease;
}

.service-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); border-color: rgba(15,122,120,0.28); }
.service-card:hover::before { height: 100%; }

.service-card h3 { font-family: var(--font-body); font-size: 1.1rem; color: var(--navy); margin-bottom: 12px; font-weight: 700; }
.service-card p { font-size: 0.95rem; color: var(--text-mid); line-height: 1.65; margin-bottom: 18px; }

.service-card ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
.service-card li { font-size: 0.92rem; color: var(--text-mid); padding-left: 24px; position: relative; line-height: 1.6; }
.service-card li::before {
  content: ""; position: absolute; left: 0; top: 6px;
  width: 8px; height: 8px; border-radius: 50%; background: var(--gold);
}

/* =========================
   INDUSTRIES WE SERVE
========================= */
.industries-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }

.industry-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-md);
  padding: 28px 22px;
  text-align: center;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}

.industry-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: rgba(15,122,120,0.25); }

.industry-icon {
  width: 50px; height: 50px; border-radius: 50%;
  background: var(--teal-light); color: var(--teal);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 16px;
}
.industry-icon svg{ width:22px; height:22px; }

.industry-card h3 { font-family: var(--font-body); font-size: 0.98rem; color: var(--navy); font-weight: 700; margin-bottom: 8px; }
.industry-card p { font-size: 0.88rem; color: var(--text-light); line-height: 1.55; }

/* =========================
   WHY CHOOSE US — 2-col layout
========================= */
.why-grid { display: grid; grid-template-columns: 1.05fr 0.95fr; gap: 60px; align-items: start; }

.why-text h2 { font-size: var(--fs-title); color: var(--navy); font-weight: 600; margin-bottom: 6px; }

.section-eyebrow + .why-text h2{ margin-top: 0; }

.why-text > p { font-size: 1rem; color: var(--text-mid); margin: 18px 0 32px; line-height: 1.8; }

.why-points { display: flex; flex-direction: column; gap: 22px; }
.why-point { display: flex; gap: 16px; align-items: flex-start; }

.why-point-icon {
  width: 42px; height: 42px; border-radius: var(--radius-sm);
  background: var(--teal-light); color: var(--teal);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; margin-top: 2px;
}
.why-point-icon svg{ width:20px; height:20px; }

.why-point-text h4 { font-family: var(--font-body); font-size: 1.02rem; color: var(--navy); font-weight: 700; margin-bottom: 5px; }
.why-point-text p { font-size: 0.94rem; color: var(--text-light); line-height: 1.65; }

/* Stats panel */
.why-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }

.why-stat {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 30px 22px;
  text-align: center;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
  position: relative;
  overflow: hidden;
}
.why-stat::after {
  content: ""; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--teal), var(--gold));
  transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;
}
.why-stat:hover::after { transform: scaleX(1); }
.why-stat:hover { box-shadow: var(--shadow-md); border-color: rgba(15,122,120,0.25); transform: translateY(-3px); }

.stat-value { font-family: var(--font-display); font-size: clamp(1.8rem, 3vw, 2.3rem); font-weight: 700; color: var(--teal); line-height: 1; margin-bottom: 8px; }
.why-stat h4 { font-family: var(--font-body); font-size: 0.9rem; color: var(--navy); font-weight: 700; margin-bottom: 6px; }
.why-stat p { font-size: 0.82rem; color: var(--text-light); line-height: 1.5; }

/* =========================
   OUR PROCESS — genuine sequence
========================= */
.process-grid { position:relative; display: grid; grid-template-columns: repeat(4, 1fr); gap: 26px; }
.process-grid::before{
  content:""; position:absolute; top: 26px; left: 8%; right: 8%; height: 2px;
  background: repeating-linear-gradient(90deg, var(--border) 0 8px, transparent 8px 14px);
  z-index:0;
}
.process-step{ position:relative; z-index:1; }
.process-num{
  width:52px; height:52px; border-radius:50%;
  background: var(--navy); color: var(--gold-light);
  font-family: var(--font-display); font-weight:700; font-size:1.15rem;
  display:flex; align-items:center; justify-content:center;
  margin-bottom:20px; border: 3px solid var(--white); box-shadow: var(--shadow-sm);
}
.process-step h3{ font-family: var(--font-body); font-size:1.02rem; color: var(--navy); font-weight:700; margin-bottom:10px; }
.process-step p{ font-size:0.92rem; color: var(--text-light); line-height:1.65; }

/* =========================
   CTA SECTION
========================= */
.cta-section {
  background: linear-gradient(135deg, var(--navy) 0%, var(--navy-2) 45%, var(--teal) 130%);
  padding: 90px 5%;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.cta-section::before {
  content: ""; position: absolute; inset: 0;
  background: radial-gradient(circle at 82% 30%, rgba(201,162,39,0.16) 0%, transparent 55%);
  pointer-events: none;
}
.cta-inner { position: relative; z-index: 1; max-width: 640px; margin: 0 auto; }
.cta-section h2 { font-size: var(--fs-title); color: var(--white); font-weight: 600; margin-bottom: 16px; }
.cta-section p { font-size: 1.04rem; color: rgba(255,255,255,0.8); line-height: 1.8; margin: 0 auto 32px; }

.btn-primary {
  display: inline-block;
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  color: var(--navy);
  font-weight: 700;
  padding: 15px 34px;
  border-radius: var(--radius-sm);
  text-decoration: none;
  transition: var(--transition);
  box-shadow: 0 10px 24px rgba(201,162,39,0.30);
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 14px 30px rgba(201,162,39,0.4); }

.btn-outline {
  display: inline-block;
  background: transparent;
  color: #ffffff;
  font-weight: 700;
  padding: 14px 32px;
  border-radius: var(--radius-sm);
  border: 2px solid rgba(255,255,255,0.4);
  text-decoration: none;
  transition: var(--transition);
  margin-left: 16px;
}
.btn-outline:hover { border-color: #ffffff; background: rgba(255,255,255,0.08); }

/* =========================
   FOOTER
========================= */
footer { background: var(--white); border-top: 2px solid var(--teal); padding: 32px 5%; }
.footer-inner { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; max-width:1160px; margin:0 auto; }
.footer-inner p { font-size: 0.9rem; color: var(--text-light); }
.footer-links { display: flex; gap: 24px; }
.footer-links a { font-size: 0.9rem; color: var(--text-light); text-decoration:none; transition: color 0.2s; }
.footer-links a:hover { color: var(--navy); }

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 1100px) {
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 992px) {
  .nav-toggle { display: block; }

  .nav-links {
    position: fixed; top: 88px; left: 0; right: 0;
    background: #ffffff; border-bottom: 1px solid var(--border);
    flex-direction: column; padding: 24px; gap: 4px;
    box-shadow: var(--shadow-lg); display: none;
    max-height: calc(100vh - 88px); overflow-y: auto;
  }

  .nav-links.active { display: flex; }
  .nav-cta { display: none; }

  .dropdown-content {
    position: static; transform: none; box-shadow: none; border: none;
    min-width: 100%; margin-top: 4px; background: var(--bg-soft);
    border-radius: var(--radius-sm); display: none;
  }
  .dropdown-content::before{ display:none; }
  .dropdown.active .dropdown-content { display: flex; }
  .dropdown .dropbtn { display: flex; justify-content: space-between; align-items: center; width: 100%; }
  .dropdown .dropbtn::after { content: "▾"; font-size: 0.8rem; margin-left: 8px; transition: transform 0.25s ease; }
  .dropdown.active .dropbtn::after { transform: rotate(180deg); }

  .industries-grid { grid-template-columns: repeat(2, 1fr); }
  .why-grid { grid-template-columns: 1fr; gap: 40px; }
  .process-grid { grid-template-columns: repeat(2,1fr); row-gap:36px; }
  .process-grid::before { display: none; }
}

@media (max-width: 640px) {
  .section, .cta-section { padding: 60px 5%; }
  .service-hero { padding: 130px 5% 64px; }
  .services-grid { grid-template-columns: 1fr; }
  .industries-grid { grid-template-columns: 1fr; }
  .why-stats { grid-template-columns: 1fr; }
  .process-grid { grid-template-columns: 1fr; }
  .hero-badges { gap: 8px; }
  .btn-outline { margin-left: 0; margin-top: 12px; display: block; }
  .footer-inner { flex-direction: column; text-align: center; }
}
</style>
</head>
<body>

<!-- ========================= NAVBAR ========================= -->
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
          <a href="business-process-outsourcing.php" class="active-page">Business Process Outsourcing</a>
          <a href="Fraud-Forensic-Investigation.php">Fraud &amp; Forensic Investigation</a>
          <a href="Risk-Management-Advisory.php">Risk Management &amp; Advisory</a>
          <a href="Data-Analytics-Business-Insights.php">Data Analytics &amp; Business Insights</a>
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


<!-- ========================= HERO ========================= -->
<section class="service-hero">
  <div class="hero-inner">
    
    <h1>Scale smarter. Focus on what matters most.</h1>
    <h2>End-to-end BPO built for African business realities.</h2>
    <p>ABPO Africa Limited delivers end-to-end business process outsourcing solutions that reduce operational costs, improve service quality, and free your teams to drive core business growth across Africa and beyond.</p>

    
  </div>
</section>


<!-- ========================= WHAT WE OFFER ========================= -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Service Lines</span>
      <h2>What We Offer</h2>
      <p>Six specialised BPO service lines designed to handle your back-office and front-office operations with precision, reliability, and accountability.</p>
    </div>

    <div class="services-grid">

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="18" height="13" rx="2"/><path d="M3 10h18M8 15h4"/></svg>
        </div>
        <h3>Finance &amp; Accounting</h3>
        <p>Accurate, timely financial management so your numbers are always audit-ready.</p>
        <ul>
          <li>Accounts payable &amp; receivable management</li>
          <li>Payroll processing and reconciliation</li>
          <li>Financial reporting and bookkeeping</li>
          <li>Tax preparation support</li>
          <li>Budget tracking and variance analysis</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.5 2.7-6 6-6s6 2.5 6 6"/><circle cx="17.5" cy="9" r="2.4"/><path d="M15.5 14c2.6.3 4.5 2.3 4.5 5"/></svg>
        </div>
        <h3>HR &amp; Payroll Administration</h3>
        <p>End-to-end human resource management from onboarding through compliance.</p>
        <ul>
          <li>Employee onboarding and offboarding</li>
          <li>Payroll administration and tax filings</li>
          <li>Leave and benefits management</li>
          <li>HR policy compliance and documentation</li>
          <li>Staff performance tracking support</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v10H8l-4 4V5z"/><path d="M8 9h8M8 12h5"/></svg>
        </div>
        <h3>Customer Support Services</h3>
        <p>Professional multi-channel support that keeps your customers satisfied and loyal.</p>
        <ul>
          <li>Inbound call centre operations</li>
          <li>Email and live chat support</li>
          <li>Complaint resolution management</li>
          <li>Customer satisfaction monitoring</li>
          <li>CRM data entry and maintenance</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5.5" rx="8" ry="3"/><path d="M4 5.5v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6"/><path d="M4 11.5v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6"/></svg>
        </div>
        <h3>Data Management &amp; Entry</h3>
        <p>Structured, accurate data handling that feeds reliable decisions across your organisation.</p>
        <ul>
          <li>High-volume data entry and digitisation</li>
          <li>Data cleansing and validation</li>
          <li>Document management and indexing</li>
          <li>Database maintenance and updates</li>
          <li>Data migration support</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7l2-3h14l2 3M3 7v11a1 1 0 001 1h16a1 1 0 001-1V7M3 7h18"/><path d="M9 11a3 3 0 006 0"/></svg>
        </div>
        <h3>Procurement &amp; Supply Chain Support</h3>
        <p>Streamline sourcing, vendor management, and logistics coordination efficiently.</p>
        <ul>
          <li>Purchase order processing</li>
          <li>Vendor on-boarding and management</li>
          <li>Contract review and administration</li>
          <li>Invoice matching and payment tracking</li>
          <li>Supply chain reporting and analytics</li>
        </ul>
      </div>

      <div class="service-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="3" width="12" height="18" rx="1.5"/><path d="M9 3V2h6v1M9 9l2 2 4-4"/><path d="M9 15h6"/></svg>
        </div>
        <h3>Compliance &amp; Regulatory Reporting</h3>
        <p>Stay ahead of regulatory requirements with managed compliance and reporting workflows.</p>
        <ul>
          <li>Statutory and regulatory filing support</li>
          <li>Audit preparation and documentation</li>
          <li>Internal controls monitoring</li>
          <li>Risk and compliance dashboards</li>
          <li>Policy adherence tracking</li>
        </ul>
      </div>

    </div>
  </div>
</section>


<!-- ========================= INDUSTRIES ========================= -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Sectors</span>
      <h2>Industries We Serve</h2>
      <p>Our BPO teams are experienced across key sectors driving Africa's economic growth.</p>
    </div>

    <div class="industries-grid">

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M4 21V10l8-6 8 6v11M9 21v-6h6v6"/></svg>
        </div>
        <h3>Banking &amp; Finance</h3>
        <p>Transaction processing, compliance, and customer operations for financial institutions.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-4.5-9.5-9C.9 8.4 2.6 5 6 5c2 0 3.3 1 4 2.3.7-1.3 2-2.3 4-2.3 3.4 0 5.1 3.4 3.5 7-2.5 4.5-9.5 9-9.5 9z"/></svg>
        </div>
        <h3>Healthcare</h3>
        <p>Patient data management, billing support, and regulatory compliance workflows.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h7l-1 8 11-14h-7l1-6z"/></svg>
        </div>
        <h3>Energy &amp; Utilities</h3>
        <p>Back-office operations, billing, and supply chain coordination for energy providers.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8h12l1 12H5L6 8zM9 8V6a3 3 0 016 0v2"/></svg>
        </div>
        <h3>Retail &amp; E-commerce</h3>
        <p>Order management, inventory support, and customer service for retail operations.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22V11l8-6 8 6v11M9 22v-6h6v6M4 22h16"/><path d="M9 11h.01M12 11h.01M15 11h.01"/></svg>
        </div>
        <h3>Government &amp; Public Sector</h3>
        <p>Citizen services administration, records management, and audit support.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13a7 7 0 0114 0M8.5 16.5a3.5 3.5 0 017 0"/><circle cx="12" cy="20" r="1.2"/></svg>
        </div>
        <h3>Telecoms &amp; Technology</h3>
        <p>Subscriber management, tech support, and billing process outsourcing.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
        </div>
        <h3>Education</h3>
        <p>Student administration, fee processing, and reporting for educational institutions.</p>
      </div>

      <div class="industry-card">
        <div class="industry-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
        </div>
        <h3>Insurance</h3>
        <p>Policy administration, claims processing, and compliance documentation support.</p>
      </div>

    </div>
  </div>
</section>


<!-- ========================= WHY CHOOSE US ========================= -->
<section class="section">
  <div class="wrap">
    <div class="why-grid">

      <!-- Left: Points -->
      <div class="why-text">
        <span class="section-eyebrow">Our Difference</span>
        <h2>Why Choose ABPO Africa for BPO?</h2>
        <p>We are not just a service provider — we are an extension of your team, committed to delivering measurable results with African market expertise and global standards.</p>

        <div class="why-points">

          <div class="why-point">
            <div class="why-point-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a13 13 0 010 18M12 3a13 13 0 000 18"/></svg>
            </div>
            <div class="why-point-text">
              <h4>Africa-Focused Expertise</h4>
              <p>Deep knowledge of local regulatory environments, business cultures, and market dynamics across East and West Africa.</p>
            </div>
          </div>

          <div class="why-point">
            <div class="why-point-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
            </div>
            <div class="why-point-text">
              <h4>Quality Assurance Built In</h4>
              <p>Dedicated QA teams and SLA-driven performance frameworks ensure consistent, high-quality output across every engagement.</p>
            </div>
          </div>

          <div class="why-point">
            <div class="why-point-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3H3v5M16 3h5v5M8 21H3v-5M16 21h5v-5"/></svg>
            </div>
            <div class="why-point-text">
              <h4>Scalable on Demand</h4>
              <p>Flex your BPO capacity up or down as business needs change — without the overhead of permanent headcount.</p>
            </div>
          </div>

          <div class="why-point">
            <div class="why-point-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="10" rx="1.5"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
            </div>
            <div class="why-point-text">
              <h4>Data Security &amp; Confidentiality</h4>
              <p>Robust data governance, NDAs, and security controls protect your sensitive business information at every step.</p>
            </div>
          </div>

        </div>
      </div>

      <!-- Right: Stats panel -->
      <div class="why-stats">
        <div class="why-stat">
          
          <h4>Average Cost Reduction</h4>
          <p>Typical operating cost savings reported by outsourcing clients.</p>
        </div>
        <div class="why-stat">
          
          <h4>SLA Compliance</h4>
          <p>Consistent delivery against agreed service-level targets.</p>
        </div>
        <div class="why-stat">
          
          <h4>Operational Coverage</h4>
          <p>Round-the-clock support across time zones and shifts.</p>
        </div>
        <div class="why-stat">
          
          <h4>Industries Served</h4>
          <p>Sector-specific process expertise across the region.</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ========================= OUR PROCESS ========================= -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Engagement Model</span>
      <h2>How We Onboard You</h2>
      <p>A structured transition designed to minimise disruption and get your outsourced functions running smoothly.</p>
    </div>

    <div class="process-grid">
      <div class="process-step">
        <div class="process-num">01</div>
        <h3>Assess</h3>
        <p>We map your current processes, volumes, and pain points to design the right scope and staffing model.</p>
      </div>
      <div class="process-step">
        <div class="process-num">02</div>
        <h3>Transition</h3>
        <p>A phased knowledge transfer and parallel-run period ensures continuity with zero disruption to operations.</p>
      </div>
      <div class="process-step">
        <div class="process-num">03</div>
        <h3>Operate</h3>
        <p>Dedicated teams run your processes against agreed SLAs, with transparent reporting throughout.</p>
      </div>
      <div class="process-step">
        <div class="process-num">04</div>
        <h3>Optimise</h3>
        <p>Ongoing performance reviews identify efficiency gains and scale capacity as your business grows.</p>
      </div>
    </div>
  </div>
</section>


<!-- ========================= CTA ========================= -->
<section class="cta-section">
  <div class="cta-inner">
    <h2>Ready to outsource smarter?</h2>
    <p>Let ABPO Africa Limited take over your non-core business processes so your team can focus on growth, innovation, and what they do best.</p>
    <a href="index.php#contact" class="btn-primary">Get a Free Consultation</a>
    <a href="index.php#services" class="btn-outline">Explore All Services</a>
  </div>
</section>


<!-- ========================= FOOTER ========================= -->
<footer>
  <div class="footer-inner">
    <p>&copy; 2025 ABPO Africa Limited. All rights reserved.</p>
    <div class="footer-links">
      <a href="mailto:info@abpoafrica.com">info@abpoafrica.com</a>
    </div>
  </div>
</footer>


<script>
  const navbar = document.getElementById("navbar");
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("scrolled", window.scrollY > 40);
  });

  const navToggle = document.getElementById("navToggle");
  const navLinks  = document.getElementById("navLinks");

  navToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
  });

  const servicesDropdown = document.getElementById("servicesDropdown");
  const dropbtn = servicesDropdown.querySelector(".dropbtn");

  dropbtn.addEventListener("click", (e) => {
    if (window.innerWidth <= 992) {
      e.preventDefault();
      servicesDropdown.classList.toggle("active");
    }
  });

  navLinks.querySelectorAll("a:not(.dropbtn)").forEach(link => {
    link.addEventListener("click", () => {
      navLinks.classList.remove("active");
    });
  });
</script>

</body>
</html>