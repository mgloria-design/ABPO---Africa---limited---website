<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IT Risk Advisory & Analytics | ABPO Africa Limited</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">

<style>
/* =========================
   TOKENS
========================= */
:root{
  /* palette — same family as before, refined for contrast/consistency */
  --navy: #0b1f4d;
  --navy-2: #122a63;
  --teal: #0f7a78;
  --teal-light: #eaf5f4;
  --gold: #c9a227;
  --gold-light: #e8c766;

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
  --radius-lg: 16px;
  --shadow-sm: 0 2px 8px rgba(11,31,77,0.06);
  --shadow-md: 0 10px 30px rgba(11,31,77,0.10);
  --shadow-lg: 0 18px 45px rgba(11,31,77,0.14);
  --transition: 0.3s cubic-bezier(0.16,1,0.3,1);

  --fs-title: clamp(1.9rem, 3.6vw, 2.7rem);
  --fs-body: 1rem;

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

:focus-visible{
  outline: 2px solid var(--teal);
  outline-offset: 3px;
  border-radius: 4px;
}

@media (prefers-reduced-motion: reduce){
  *{ animation-duration: 0.01ms !important; animation-iteration-count: 1 !important; transition-duration: 0.01ms !important; scroll-behavior:auto !important; }
}

/* =========================
   NAVBAR
========================= */
nav {
  position: fixed;
  top: 0; left: 0; right: 0;
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
  height: 76px;
  box-shadow: var(--shadow-sm);
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

.nav-logo { display: flex; align-items: center; }

.nav-logo img {
  height: 56px;
  width: auto;
  display: block;
  object-fit: contain;
  transition: all 0.3s ease;
}

nav.scrolled .nav-logo img { height: 46px; }

.nav-links { display: flex; align-items: center; gap: 6px; }

.nav-links a,
.dropdown .dropbtn {
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--navy);
  text-decoration: none;
  padding: 10px 14px;
  border-radius: 8px;
  transition: all 0.25s ease;
  letter-spacing: 0.01em;
}

.nav-links a:hover,
.dropdown .dropbtn:hover {
  color: var(--teal);
  background: var(--teal-light);
}

.nav-cta {
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  color: var(--navy) !important;
  padding: 11px 24px !important;
  border-radius: 8px;
  font-weight: 700 !important;
  text-decoration: none;
  margin-left: 8px;
  transition: all 0.25s ease;
  box-shadow: 0 6px 16px rgba(201,162,39,0.30);
  letter-spacing: 0.01em;
}

.nav-cta:hover { transform: translateY(-2px); box-shadow: 0 10px 22px rgba(201,162,39,0.40); }

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
.dropdown { position: relative; display: inline-block; }

.dropdown-content {
  display: none;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  background: #fff;
  min-width: 320px;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: var(--shadow-lg);
  margin-top: 12px;
  z-index: 99999;
  flex-direction: column;
}

.dropdown-content::before{
  content:"";
  position:absolute;
  top:-6px; left:50%;
  transform:translateX(-50%) rotate(45deg);
  width:12px; height:12px;
  background:#fff;
  border-left:1px solid var(--border);
  border-top:1px solid var(--border);
}

.dropdown-content a {
  display: block;
  padding: 14px 20px;
  border-bottom: 1px solid #f1f5f9;
  font-weight: 600;
  font-size: 0.92rem;
  color: var(--text);
  text-decoration: none;
  border-radius: 0;
  position: relative;
  z-index: 1;
  background: #fff;
}
.dropdown-content a:last-child { border-bottom: none; }
.dropdown-content a:hover { background: var(--teal-light); color: var(--teal); padding-left: 24px; }

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

.hero-grid{
  display:grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 48px;
  align-items: center;
  max-width: 1160px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.hero-chip{
  display:inline-flex;align-items:center;gap:10px;
  background: rgba(255,255,255,0.06);
  border:1px solid rgba(255,255,255,0.18);
  color: var(--gold-light);
  font-size:.78rem;font-family: var(--font-body);font-weight:700;
  padding:8px 18px;border-radius:99px;margin-bottom:26px;
  letter-spacing:.12em; text-transform:uppercase;
}
.hero-chip::before{
  content:"";
  width:7px;height:7px;border-radius:50%;
  background: var(--gold);
  box-shadow: 0 0 0 4px rgba(201,162,39,0.25);
}

.service-hero h1 {
  font-size: clamp(2.3rem, 4.6vw, 3.4rem);
  color: var(--white);
  font-weight: 600;
  letter-spacing: -0.01em;
  line-height: 1.1;
  margin-bottom: 16px;
}

.service-hero h2 {
  font-family: var(--font-body);
  font-size: clamp(1.05rem, 2vw, 1.3rem);
  color: var(--gold-light);
  font-weight: 700;
  margin-bottom: 20px;
}

.service-hero p {
  font-size: 1.06rem;
  color: rgba(255,255,255,0.78);
  max-width: 560px;
  line-height: 1.8;
}

.hero-actions{ display:flex; gap:14px; margin-top:34px; flex-wrap:wrap; }

.btn-primary{
  display:inline-flex; align-items:center; gap:8px;
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  color: var(--navy);
  font-weight:700;
  padding: 14px 26px;
  border-radius: 8px;
  text-decoration:none;
  box-shadow: 0 10px 24px rgba(201,162,39,0.30);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.btn-primary:hover{ transform: translateY(-2px); box-shadow: 0 14px 30px rgba(201,162,39,0.4); }

.btn-ghost{
  display:inline-flex; align-items:center; gap:8px;
  background: transparent;
  color: var(--white);
  font-weight:700;
  padding: 14px 24px;
  border-radius: 8px;
  border: 1px solid rgba(255,255,255,0.3);
  text-decoration:none;
  transition: all 0.25s ease;
}
.btn-ghost:hover{ background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.5); }

/* Signature hero diagram: risk radar around 4 pillars */
.hero-visual{
  position:relative;
  z-index:1;
  display:flex;
  align-items:center;
  justify-content:center;
}
.risk-radar{ width:100%; max-width:400px; height:auto; }
.radar-ring{ fill:none; stroke: rgba(255,255,255,0.14); stroke-dasharray: 3 6; }
.radar-ring.solid{ stroke: rgba(255,255,255,0.22); stroke-dasharray: none; }
.radar-spoke{ stroke: rgba(255,255,255,0.14); stroke-width:1; }
.radar-node-bg{ fill: var(--navy-2); stroke: var(--gold); stroke-width: 1.6; }
.radar-core{ fill: var(--gold); }
.radar-core-ring{ fill:none; stroke: rgba(201,162,39,0.4); stroke-width:1.4; }
.radar-label{ font-family: var(--font-body); font-size: 11.5px; font-weight:700; fill: rgba(255,255,255,0.85); letter-spacing:.03em; }
.radar-sub{ font-family: var(--font-body); font-size: 9.5px; fill: rgba(255,255,255,0.5); }

/* =========================
   SECTION BASE
========================= */
.section { padding: 88px 5%; }
.section-alt { background: var(--bg-soft); }

.section-header { text-align: center; margin-bottom: 56px; max-width: 640px; margin-left:auto; margin-right:auto; }

.section-eyebrow{
  display:inline-block;
  font-family: var(--font-body);
  font-size:.75rem;
  font-weight:800;
  letter-spacing:.14em;
  text-transform:uppercase;
  color: var(--teal);
  margin-bottom: 12px;
}

.section-header h2 {
  font-size: var(--fs-title);
  color: var(--navy);
  font-weight: 600;
  margin-bottom: 14px;
  letter-spacing: -0.01em;
}

.section-header p {
  font-family: var(--font-body);
  font-size: 1.02rem;
  color: var(--text-light);
  line-height: 1.7;
}

/* =========================
   ICONS
========================= */
.card-icon{
  width: 48px; height: 48px;
  border-radius: 12px;
  display:flex; align-items:center; justify-content:center;
  background: var(--teal-light);
  color: var(--teal);
  margin-bottom: 18px;
  flex-shrink:0;
}
.card-icon svg{ width:24px; height:24px; }

/* =========================
   WHAT WE OFFER GRID
========================= */
.points-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 26px; }

.point-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 32px 30px;
  position: relative;
  overflow: hidden;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
}

.point-card::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 4px; height: 0;
  background: linear-gradient(180deg, var(--teal), var(--navy));
  transition: height 0.35s ease;
}

.point-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); border-color: rgba(15,122,120,0.28); }
.point-card:hover::before { height: 100%; }

.point-card h3 {
  font-family: var(--font-body);
  font-size: 1.14rem;
  color: var(--navy);
  margin-bottom: 16px;
  font-weight: 700;
}

.point-card ul { list-style: none; display: flex; flex-direction: column; gap: 11px; }

.point-card li {
  font-size: 0.96rem;
  color: var(--text-mid);
  padding-left: 26px;
  position: relative;
  line-height: 1.6;
}

.point-card li::before {
  content: "";
  position: absolute;
  left: 0; top: 6px;
  width: 8px; height: 8px;
  border-radius: 50%;
  background: var(--gold);
}

/* =========================
   APPROACH — connected sequence (genuine order)
========================= */
.approach-track{ position:relative; display:grid; grid-template-columns: repeat(4,1fr); gap: 26px; }
.approach-track::before{
  content:"";
  position:absolute;
  top: 26px; left: 8%; right: 8%;
  height: 2px;
  background: repeating-linear-gradient(90deg, var(--border) 0 8px, transparent 8px 14px);
  z-index:0;
}

.approach-step{ position:relative; z-index:1; }

.approach-num{
  width:52px; height:52px;
  border-radius:50%;
  background: var(--navy);
  color: var(--gold-light);
  font-family: var(--font-display);
  font-weight:700;
  font-size:1.15rem;
  display:flex; align-items:center; justify-content:center;
  margin-bottom:20px;
  border: 3px solid var(--white);
  box-shadow: var(--shadow-sm);
}

.approach-step h3{
  font-family: var(--font-body);
  font-size:1.05rem;
  color: var(--navy);
  font-weight:700;
  margin-bottom:10px;
}
.approach-step p{ font-size:0.94rem; color: var(--text-light); line-height:1.65; }

/* =========================
   BENEFITS GRID
========================= */
.benefits-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 22px; }

.benefit-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 30px 26px;
  transition: var(--transition);
  box-shadow: var(--shadow-sm);
  position: relative;
  overflow: hidden;
}

.benefit-card::after {
  content: "";
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--teal), var(--gold));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease;
}

.benefit-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: rgba(15,122,120,0.25); }
.benefit-card:hover::after { transform: scaleX(1); }

.benefit-card h3 {
  font-family: var(--font-body);
  font-size: 1.03rem;
  color: var(--navy);
  margin-bottom: 10px;
  font-weight: 700;
}

.benefit-card p { font-size: 0.93rem; color: var(--text-light); line-height: 1.65; }

/* Track record — stat style variant */
.stat-card .card-icon{ background: rgba(201,162,39,0.12); color: var(--gold); }

/* =========================
   CTA SECTION
========================= */
.cta-section {
  background: linear-gradient(135deg, var(--navy) 0%, var(--navy-2) 45%, var(--teal) 130%);
  padding: 88px 5%;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 82% 30%, rgba(201,162,39,0.16) 0%, transparent 55%);
  pointer-events: none;
}

.cta-inner { position: relative; z-index: 1; max-width: 640px; margin: 0 auto; }

.cta-section h2 {
  font-size: var(--fs-title);
  color: var(--white);
  font-weight: 600;
  margin-bottom: 16px;
}

.cta-section p {
  font-family: var(--font-body);
  font-size: 1.04rem;
  color: rgba(255,255,255,0.8);
  line-height: 1.8;
  margin-bottom: 32px;
}

/* =========================
   FOOTER
========================= */
footer { background: var(--white); border-top: 2px solid var(--teal); padding: 32px 5%; }

.footer-inner {
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 16px; max-width:1160px; margin:0 auto;
}

.footer-inner p { font-size: 0.9rem; color: var(--text-light); }

.footer-links { display: flex; gap: 24px; }
.footer-links a { font-size: 0.9rem; color: var(--text-light); text-decoration:none; transition: color 0.2s; }
.footer-links a:hover { color: var(--navy); }

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 992px) {
  .nav-toggle { display: block; }

  .nav-links {
    position: fixed;
    top: 88px; left: 0; right: 0;
    background: #ffffff;
    border-bottom: 1px solid var(--border);
    flex-direction: column;
    padding: 24px;
    gap: 4px;
    box-shadow: var(--shadow-lg);
    display: none;
    max-height: calc(100vh - 88px);
    overflow-y: auto;
  }

  .nav-links.active { display: flex; }
  .nav-cta { display: none; }

  .dropdown-content {
    position: static;
    transform: none;
    box-shadow: none;
    border: none;
    min-width: 100%;
    margin-top: 4px;
    background: var(--bg-soft);
    border-radius: var(--radius-sm);
    display: none;
  }
  .dropdown-content::before{ display:none; }

  .dropdown.active .dropdown-content { display: flex; }

  .dropdown .dropbtn { display: flex; justify-content: space-between; align-items: center; width: 100%; }
  .dropdown .dropbtn::after { content: "▾"; font-size: 0.8rem; margin-left: 8px; transition: transform 0.25s ease; }
  .dropdown.active .dropbtn::after { transform: rotate(180deg); }

  .hero-grid{ grid-template-columns: 1fr; }
  .hero-visual{ order:-1; max-width:280px; margin:0 auto 12px; }
  .service-hero p{ max-width:100%; }

  .points-grid { grid-template-columns: 1fr; }
  .benefits-grid { grid-template-columns: repeat(2, 1fr); }
  .approach-track{ grid-template-columns: repeat(2,1fr); row-gap:36px; }
  .approach-track::before{ display:none; }
}

@media (max-width: 640px) {
  .section { padding: 60px 5%; }
  .service-hero { padding: 130px 5% 64px; }
  .cta-section { padding: 60px 5%; }
  .benefits-grid { grid-template-columns: 1fr; }
  .approach-track{ grid-template-columns: 1fr; }
  .footer-inner { flex-direction: column; text-align: center; }
  .point-card, .benefit-card { padding: 26px 22px; }
  .hero-actions{ flex-direction:column; }
  .hero-actions a{ justify-content:center; }
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
          <a href="it-risk-advisory.php">IT Risk Advisory & Analytics</a>
          <a href="Business-process-outsourcing.php">Business Process Outsourcing</a>
          <a href="Fraud-forensic-investigation.php">Fraud & Forensic Investigation</a>
          <a href="risk-management-advisory.php">Risk Management & Advisory</a>
          <a href="Data-analytics-business-insights.php">Data Analytics & Business Insights</a>
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
  <div class="hero-grid">
    <div class="hero-inner">
      
      <h1>Manage IT risk with clarity, not guesswork.</h1>
      <h2>Protect, comply, and grow with confidence.</h2>
      <p>We help organizations identify, assess, and manage technology risks while leveraging data-driven insights to strengthen decision-making, regulatory compliance, and long-term operational resilience.</p>
      <div class="hero-actions">
        <a href="index.php#contact" class="btn-primary">Get a Risk Assessment</a>
        <a href="#offer" class="btn-ghost">Explore Our Services</a>
      </div>
    </div>

    <div class="hero-visual" aria-hidden="true">
      <svg class="risk-radar" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
        <circle class="radar-ring" cx="200" cy="200" r="170"/>
        <circle class="radar-ring" cx="200" cy="200" r="128"/>
        <circle class="radar-ring solid" cx="200" cy="200" r="86"/>
        <line class="radar-spoke" x1="200" y1="30" x2="200" y2="370"/>
        <line class="radar-spoke" x1="30" y1="200" x2="370" y2="200"/>

        <circle class="radar-core-ring" cx="200" cy="200" r="34"/>
        <circle class="radar-core" cx="200" cy="200" r="7"/>

        <!-- Cyber -->
        <circle class="radar-node-bg" cx="200" cy="46" r="30"/>
        <text class="radar-label" x="200" y="42" text-anchor="middle">Cyber</text>
        <text class="radar-sub" x="200" y="55" text-anchor="middle">security</text>

        <!-- Compliance -->
        <circle class="radar-node-bg" cx="354" cy="200" r="30"/>
        <text class="radar-label" x="354" y="196" text-anchor="middle">Compli-</text>
        <text class="radar-sub" x="354" y="209" text-anchor="middle">ance</text>

        <!-- Data -->
        <circle class="radar-node-bg" cx="200" cy="354" r="30"/>
        <text class="radar-label" x="200" y="350" text-anchor="middle">Data</text>
        <text class="radar-sub" x="200" y="363" text-anchor="middle">analytics</text>

        <!-- Governance -->
        <circle class="radar-node-bg" cx="46" cy="200" r="30"/>
        <text class="radar-label" x="46" y="196" text-anchor="middle">Govern-</text>
        <text class="radar-sub" x="46" y="209" text-anchor="middle">ance</text>
      </svg>
    </div>
  </div>
</section>


<!-- ========================= WHAT WE OFFER ========================= -->
<section class="section" id="offer">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Capabilities</span>
      <h2>What We Offer</h2>
      <p>Four integrated service areas designed to give your organization complete visibility and control over its IT risk landscape.</p>
    </div>

    <div class="points-grid">

      <div class="point-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>IT Risk Assessment</h3>
        <ul>
          <li>Identification of technology risks</li>
          <li>Risk impact analysis</li>
          <li>Risk mitigation strategies</li>
          <li>Risk reporting</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="10" rx="1.5"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
        </div>
        <h3>Cybersecurity Advisory</h3>
        <ul>
          <li>Cybersecurity risk assessments</li>
          <li>Security control reviews</li>
          <li>Vulnerability assessments</li>
          <li>Cybersecurity policy reviews</li>
          <li>Compliance and regulatory reviews</li>
          <li>Incident response preparedness</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="3" width="12" height="18" rx="1.5"/><path d="M9 3V2h6v1M9 9l2 2 4-4"/><path d="M9 15h6"/></svg>
        </div>
        <h3>Compliance Audit</h3>
        <ul>
          <li>IT compliance audits</li>
          <li>Regulatory and standards compliance reviews</li>
          <li>Control effectiveness testing</li>
          <li>Governance and risk framework assessments</li>
          <li>Compliance gap identification</li>
          <li>Remediation and improvement recommendations</li>
        </ul>
      </div>

      <div class="point-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V10M12 20V4M20 20v-7"/></svg>
        </div>
        <h3>Data Analytics</h3>
        <ul>
          <li>Risk analytics and monitoring</li>
          <li>Fraud detection and anomaly analysis</li>
          <li>Data quality assessments</li>
          <li>Key risk indicator (KRI) reporting</li>
          <li>Interactive dashboards and visualizations</li>
          <li>Management reporting and insights</li>
        </ul>
      </div>

    </div>
  </div>
</section>


<!-- ========================= OUR APPROACH ========================= -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Engagement Model</span>
      <h2>Our Approach</h2>
      <p>A structured four-stage engagement that moves from discovery to sustained governance.</p>
    </div>

    <div class="approach-track">
      <div class="approach-step">
        
        <h3>Discover</h3>
        <p>Understand your environment, systems, and current risk posture through structured interviews and documentation review.</p>
      </div>
      <div class="approach-step">
        
        <h3>Assess</h3>
        <p>Perform in-depth risk and compliance assessments against applicable frameworks and regulatory requirements.</p>
      </div>
      <div class="approach-step">
        
        <h3>Report</h3>
        <p>Deliver clear, actionable findings with prioritized remediation roadmaps tailored for your leadership team.</p>
      </div>
      <div class="approach-step">
        
        <h3>Monitor</h3>
        <p>Establish ongoing KRI dashboards and periodic reviews to sustain risk awareness and compliance alignment.</p>
      </div>
    </div>
  </div>
</section>


<!-- ========================= WHY IT MATTERS ========================= -->
<section class="section">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Impact</span>
      <h2>Why It Matters</h2>
      <p>The right IT risk program does more than prevent loss — it creates a platform for confident growth.</p>
    </div>

    <div class="benefits-grid">
      <div class="benefit-card">
        
        <h3>Enhanced Risk Management</h3>
        <p>Identify and mitigate risks before they affect operations, reducing costly disruptions and downtime.</p>
      </div>
      <div class="benefit-card">
        
        <h3>Improved Compliance</h3>
        <p>Meet regulatory and industry requirements confidently with frameworks mapped to local and international standards.</p>
      </div>
      <div class="benefit-card">
       
        <h3>Operational Efficiency</h3>
        <p>Streamline processes and remove redundancies uncovered during assessments, lifting overall productivity.</p>
      </div>
      <div class="benefit-card">
       
        <h3>Data Security</h3>
        <p>Protect critical business information from cyber threats with layered controls and continuous monitoring.</p>
      </div>
    </div>
  </div>
</section>


<!-- ========================= CREDENTIALS ========================= -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <span class="section-eyebrow">Track Record</span>
      <h2>Trusted Across the Region</h2>
      <p>Trusted by organizations across East and West Africa to deliver measurable risk outcomes.</p>
    </div>

    <div class="benefits-grid">
      <div class="benefit-card stat-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h7l-1 8 11-14h-7l1-6z"/></svg>
        </div>
        <h3>Threat Mitigation</h3>
        <p>Proactive risk assessment preventing critical IT disruptions before they escalate.</p>
      </div>
      <div class="benefit-card stat-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4M20 12a8 8 0 11-4.9-7.4"/></svg>
        </div>
        <h3>Compliance Alignment</h3>
        <p>Frameworks fully mapped to international and local regulations across multiple industries.</p>
      </div>
      <div class="benefit-card stat-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
        </div>
        <h3>Risk Assessments</h3>
        <p>Thorough audits executed across multiple industry verticals with measurable outcomes.</p>
      </div>
      <div class="benefit-card stat-card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.6 5.9L21 9l-4.6 4.3L17.6 20 12 16.8 6.4 20l1.2-6.7L3 9l6.4-1.1z"/></svg>
        </div>
        <h3>Years of Expertise</h3>
        <p>A trusted IT advisory team with deep sector experience across East and West Africa.</p>
      </div>
    </div>
  </div>
</section>


<!-- ========================= CTA ========================= -->
<section class="cta-section">
  <div class="cta-inner">
    <h2>Ready to strengthen your IT risk framework?</h2>
    <p>Contact ABPO Africa Limited today to discover how our custom analytics and risk models can fortify your organizational resilience.</p>
    <a href="index.php#contact" class="btn-primary">Talk to an Advisor</a>
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

  const navToggle  = document.getElementById("navToggle");
  const navLinks   = document.getElementById("navLinks");

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