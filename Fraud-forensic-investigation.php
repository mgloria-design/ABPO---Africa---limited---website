<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fraud & Forensic Investigation | ABPO Africa Limited</title>

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
.service-hero{
    padding:160px 5% 100px;
    background: radial-gradient(circle, rgba(218,248,246,0.35), transparent 70%);
    position: relative;
    overflow: hidden;
}
.service-hero::before{
    content:"";
    position:absolute;
    inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.05) 1px, transparent 1px);

    background-size:32px 32px;
    pointer-events:none;
}

.service-hero::after { content:""; position:absolute; inset:0; background:radial-gradient(circle at 80% 20%,rgba(245,197,24,0.08) 0%,transparent 45%),radial-gradient(circle at 10% 80%,rgba(0,131,143,0.15) 0%,transparent 50%); pointer-events:none; }
.hero-inner { position:relative; z-index:1; max-width:800px; }
.hero-eyebrow { display:inline-block; background:rgba(245,197,24,0.15); color:var(--gold); border:1px solid rgba(245,197,24,0.3); font-size:0.78rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:24px; }
.service-hero h1 { font-size:var(--fs-title);  color: var(--navy); font-weight:800; letter-spacing:-0.02em; margin-bottom:22px; animation:slideUp 0.7s cubic-bezier(0.16,1,0.3,1) both; }
.service-hero p { font-size:var(--fs-body); color: var(--text); max-width:700px; line-height:1.8; animation:slideUp 0.9s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badges { display:flex; flex-wrap:wrap; gap:12px; margin-top:36px; animation:slideUp 1.1s cubic-bezier(0.16,1,0.3,1) both; }
.hero-badge{
    background: var(--white);
    color: var(--navy);
    border:1px solid var(--border);
    box-shadow: var(--shadow-sm);
}

.hero-badge svg{
    color: var(--teal);
}
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

/* APPROACH */
.approach-grid { display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; }
.approach-text h2 { font-size:var(--fs-title); color:var(--navy); font-weight:800; margin-bottom:14px; }
.approach-text h2::after { content:""; display:block; width:52px; height:3px; background:var(--gold); margin:14px 0 0; border-radius:2px; }
.approach-text > p { font-size:var(--fs-body); color:var(--text-mid); margin:24px 0 32px; line-height:1.8; }
.approach-points { display:flex; flex-direction:column; gap:22px; }
.approach-point { display:flex; gap:16px; align-items:flex-start; }
.ap-icon { width:44px; height:44px; border-radius:var(--radius-sm); background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px; }
.approach-point h4 { font-size:clamp(0.95rem,1.8vw,1.05rem); color:var(--navy); font-weight:700; margin-bottom:5px; }
.approach-point p { font-size:var(--fs-body); color:var(--text-light); line-height:1.65; margin:0; }
.commitment-panel { background:linear-gradient(140deg, var(--navy) 0%, var(--teal) 100%); border-radius:var(--radius-lg); padding:44px 38px; position:relative; overflow:hidden; }
.commitment-panel::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 90% 10%,rgba(245,197,24,0.1) 0%,transparent 50%); pointer-events:none; }
.commitment-panel h3 { color:#ffffff; font-size:clamp(1.2rem,2.5vw,1.5rem); font-weight:800; margin-bottom:20px; position:relative; z-index:1; }
.commitment-panel h3 span { color:var(--gold); }
.commitment-panel p { color:rgba(255,255,255,0.8); font-size:var(--fs-body); line-height:1.8; margin-bottom:28px; position:relative; z-index:1; }
.commitment-list { list-style:none; padding:0; display:flex; flex-direction:column; gap:14px; position:relative; z-index:1; }
.commitment-list li { display:flex; align-items:flex-start; gap:12px; font-size:var(--fs-body); color:rgba(255,255,255,0.88); line-height:1.6; }
.commitment-list li svg { color:var(--gold); flex-shrink:0; margin-top:3px; }

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

/* INDUSTRIES */
.industries-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
.industry-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-md); padding:28px 24px; display:flex; gap:18px; align-items:flex-start; transition:var(--transition); box-shadow:var(--shadow-sm); }
.industry-card:hover { transform:translateY(-3px); box-shadow:var(--shadow-md); border-color:rgba(0,131,143,0.25); }
.industry-icon { width:46px; height:46px; border-radius:var(--radius-sm); background:var(--teal-light); color:var(--teal); display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px; }
.industry-card h3 { font-size:clamp(0.95rem,1.8vw,1.05rem); color:var(--navy); font-weight:700; margin-bottom:6px; }
.industry-card p { font-size:clamp(0.85rem,1.5vw,0.95rem); color:var(--text-light); line-height:1.6; margin:0; }

/* CTA */
/* =========================
   Call To Action
========================= */

.cta-section{
    background: linear-gradient(140deg, var(--navy) 0%, var(--teal) 100%);
    padding: 90px 5%;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-section::before{
    content: "";
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 20% 60%, rgba(0,131,143,0.18) 0%, transparent 55%),
        radial-gradient(circle at 80% 20%, rgba(255,215,0,0.08) 0%, transparent 35%);
    pointer-events: none;
}

.cta-inner{
    position: relative;
    z-index: 1;
}

.cta-section h2{
    font-size: var(--fs-title);
    color: var(--white);
    font-weight: 800;
    margin-bottom: 18px;
    line-height: 1.2;
}

.cta-section p{
    font-size: var(--fs-body);
    color: rgba(255,255,255,0.88);
    max-width: 650px;
    margin: 0 auto 36px;
    line-height: 1.8;
}

/* Primary Button */

.btn-primary{
    display: inline-block;
    background: var(--gold);
    color: var(--navy);
    font-family: var(--font);
    font-size: var(--fs-body);
    font-weight: 700;
    padding: 15px 38px;
    border-radius: var(--radius-sm);
    text-decoration: none;
    transition: var(--transition);
    box-shadow: 0 6px 20px rgba(255,215,0,.25);
}

.btn-primary:hover{
    background: var(--gold-hover);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(255,215,0,.35);
}

/* Secondary Button */

.btn-outline{
    display: inline-block;
    background: transparent;
    color: var(--white);
    font-family: var(--font);
    font-size: var(--fs-body);
    font-weight: 700;
    padding: 14px 36px;
    border: 2px solid rgba(255,255,255,.45);
    border-radius: var(--radius-sm);
    text-decoration: none;
    transition: var(--transition);
    margin-left: 16px;
}

.btn-outline:hover{
    background: rgba(255,255,255,.12);
    border-color: var(--white);
    transform: translateY(-3px);
}
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
  .approach-grid { grid-template-columns:1fr; gap:40px; }
  .industries-grid { grid-template-columns:repeat(2,1fr); }
  .stats-grid { grid-template-columns:repeat(2,1fr); }
  .stat-box:nth-child(2) { border-right:none; }
  .stat-box { border-bottom:1px solid var(--border); }
  .stat-box:last-child { border-bottom:none; }
  .process-grid { grid-template-columns:repeat(3,1fr); gap:28px; }
  .process-grid::before { display:none; }
}
@media (max-width:640px) {
  .section,.process-section,.cta-section { padding:64px 5%; }
  .stats-section { padding:56px 5%; }
  .service-hero { padding:140px 5% 80px; }
  .industries-grid { grid-template-columns:1fr; }
  .stats-grid { grid-template-columns:1fr; }
  .stat-box { border-right:none; }
  .process-grid { grid-template-columns:repeat(2,1fr); gap:24px; }
  .btn-outline { margin-left:0; margin-top:12px; display:block; }
  .footer-inner { flex-direction:column; text-align:center; }
  .commitment-panel { padding:30px 24px; }
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
          <a href="fraud-forensic-investigation.php" class="active-page">Fraud &amp; Forensic Investigation</a>
          <a href="risk-management-advisory.php">Risk Management &amp; Advisory</a>
          <a href="data-analytics-business-insights.php">Data Analytics &amp; Business Insights</a>
        </div>
      </div>
      <a href="index.php#why-us">Why Us</a>
      <a href="blog.php">Blog</a>
      <a href="careers.php">Careers</a>
      <a href="index.php#contact">Contact</a>
      <a href="Testimonies.php">Testimonies</a>
     <!-- Mobile Quote Link -->
      <a href="#contact" class="mobile-cta" style="display: none;">Get a Quote</a>
    </div>

    <a href="#contact" class="nav-cta">Get a Quote</a>
  </div>
</nav>

<!-- HERO -->
<section class="service-hero">
  <div class="wrap">
    <div class="hero-inner">
      <h1>Fraud & Forensic Investigation</h1>
      <h2>Uncover the Truth. Protect Your Organisation.</h2>
      <p>ABPO Africa Limited delivers rigorous, independent fraud and forensic investigation services that expose financial misconduct, secure evidence, and provide the actionable intelligence organisations need to respond with confidence.</p>
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
      <p>Comprehensive forensic and investigative services tailored to detect, document, and deter financial crime across all organisational levels.</p>
    </div>
    <div class="points-grid">

      <div class="point-card">
        
        <h3>Fraud Investigation</h3>
        <p>In-depth investigation of suspected fraudulent activities with thorough fact-finding and evidence documentation.</p>
        <ul>
          <li>Financial statement fraud investigations</li>
          <li>Asset misappropriation and embezzlement</li>
          <li>Procurement and tender fraud</li>
          <li>Employee and vendor collusion</li>
          <li>Insurance and claims fraud</li>
          <li>Whistleblower complaint investigations</li>
        </ul>
      </div>

      <div class="point-card">
        
        <h3>Forensic Accounting</h3>
        <p>Detailed financial analysis and reconstruction of transactions to uncover hidden losses and irregularities.</p>
        <ul>
          <li>Financial records reconstruction</li>
          <li>Cash flow and transaction tracing</li>
          <li>Hidden asset identification</li>
          <li>Loss quantification and damages assessment</li>
          <li>Fraud loss recovery analysis</li>
          <li>Expert witness report preparation</li>
        </ul>
      </div>

      <div class="point-card">
        
        <h3>Digital Forensics &amp; E-Discovery</h3>
        <p>Recovery and forensic analysis of electronic evidence from devices, networks, and cloud systems.</p>
        <ul>
          <li>Electronic evidence collection and preservation</li>
          <li>Email and communication analysis</li>
          <li>Data recovery from deleted or corrupted files</li>
          <li>Network intrusion and cybercrime investigation</li>
          <li>Mobile device forensics</li>
          <li>Chain of custody management</li>
        </ul>
      </div>

      <div class="point-card">
       
        <h3>Anti-Corruption &amp; Bribery Investigations</h3>
        <p>Targeted investigations into bribery, kickbacks, and corrupt practices within organisations and supply chains.</p>
        <ul>
          <li>Third-party and vendor due diligence</li>
          <li>Bribery and kickback scheme detection</li>
          <li>Conflict of interest investigations</li>
          <li>Gifts and hospitality policy violations</li>
          <li>Public sector corruption investigations</li>
          <li>Remediation advisory and controls design</li>
        </ul>
      </div>

      <div class="point-card">
       
        <h3>Litigation &amp; Dispute Resolution Support</h3>
        <p>Forensic support for legal proceedings, arbitration, and commercial disputes requiring independent expert analysis.</p>
        <ul>
          <li>Expert witness testimony and reports</li>
          <li>Commercial dispute financial analysis</li>
          <li>Contract breach investigations</li>
          <li>Intellectual property theft investigations</li>
          <li>Shareholder dispute analysis</li>
          <li>Regulatory inquiry support</li>
        </ul>
      </div>

      <div class="point-card">
        
        <h3>Fraud Risk Assessment &amp; Prevention</h3>
        <p>Proactive identification of vulnerabilities before fraud occurs, with tailored controls to close the gaps.</p>
        <ul>
          <li>Enterprise-wide fraud risk assessments</li>
          <li>Internal control gap analysis</li>
          <li>Fraud risk register development</li>
          <li>Anti-fraud policy design and review</li>
          <li>Staff fraud awareness training</li>
          <li>Continuous monitoring framework setup</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- OUR APPROACH -->
<section class="section section-alt">
  <div class="wrap">
    <div class="approach-grid">

      <div class="approach-text">
        <h2>Our Investigative Approach</h2>
        <p>Every engagement is conducted with strict independence, confidentiality, and adherence to internationally recognised forensic investigation standards — ensuring findings stand up to regulatory and judicial scrutiny.</p>
        <div class="approach-points">

          <div class="approach-point">
            
            <div>
              <h4>Strict Confidentiality</h4>
              <p>All investigations are conducted under legally binding NDAs with information shared only on a strict need-to-know basis.</p>
            </div>
          </div>

          <div class="approach-point">
            
            <div>
              <h4>Evidence Integrity</h4>
              <p>We follow forensically sound collection and chain-of-custody procedures to ensure evidence remains admissible in legal proceedings.</p>
            </div>
          </div>

          <div class="approach-point">
            
            <div>
              <h4>Multi-Disciplinary Teams</h4>
              <p>Our teams combine forensic accountants, IT forensic specialists, legal advisors, and sector experts for comprehensive coverage.</p>
            </div>
          </div>

          <div class="approach-point">
           
            <div>
              <h4>Objective &amp; Impartial</h4>
              <p>We operate as a fully independent third party with no conflict of interest, providing unbiased findings based entirely on evidence.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="commitment-panel">
        <h3>Our <span>Commitment</span> to You</h3>
        <p>When fraud or financial misconduct strikes, speed and discretion are critical. We mobilise rapidly, contain the situation, and provide clear direction from day one.</p>
        <ul class="commitment-list">
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Rapid mobilisation within 24–48 hours of engagement</li>
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Regular progress updates to authorised stakeholders</li>
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Clear, jargon-free findings reports for boards and leadership</li>
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Liaison support with regulators, law enforcement, and legal counsel</li>
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Post-investigation remediation and control recommendations</li>
          <li><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Strict preservation of your organisation's reputation throughout</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats-section">
  <div class="wrap">
    <div class="stats-grid">

      <div class="stat-box">
      
        <h3>Investigations Completed</h3>
        <p>Extensive portfolio of successfully concluded fraud and forensic engagements across Africa.</p>
      </div>

      <div class="stat-box">
        
        <h3>Legally Admissible Reports</h3>
        <p>Forensic reports prepared to withstand regulatory and judicial examination in every case.</p>
      </div>

      <div class="stat-box">
        
        <h3>24–48 Hour Mobilisation</h3>
        <p>Rapid response capability to contain incidents and preserve critical evidence immediately.</p>
      </div>

      <div class="stat-box">
        
        <h3>Multi-Sector Experience</h3>
        <p>Proven expertise across finance, government, healthcare, energy, and the private sector.</p>
      </div>

    </div>
  </div>
</section>


<!-- INDUSTRIES -->
<section class="section section-alt">
  <div class="wrap">
    <div class="section-header">
      <h2>Industries We Serve</h2>
      <p>Our forensic specialists bring deep sector knowledge to every investigation across these key industries.</p>
    </div>
    <div class="industries-grid">

      <div class="industry-card">
        
        <div>
          <h3>Banking &amp; Financial Services</h3>
          <p>Loan fraud, insider trading, money laundering, and transaction manipulation investigations.</p>
        </div>
      </div>

      <div class="industry-card">
        
        <div>
          <h3>Government &amp; Public Sector</h3>
          <p>Procurement fraud, misappropriation of public funds, and corruption in government entities.</p>
        </div>
      </div>

      <div class="industry-card">
       
        <div>
          <h3>Energy &amp; Natural Resources</h3>
          <p>Contract fraud, royalty disputes, and supply chain corruption in extractive industries.</p>
        </div>
      </div>

      <div class="industry-card">
        
        <div>
          <h3>Healthcare &amp; Pharmaceuticals</h3>
          <p>Medical billing fraud, drug diversion, and regulatory compliance investigations.</p>
        </div>
      </div>

      <div class="industry-card">
      
        <div>
          <h3>Insurance</h3>
          <p>Claims fraud investigations, agent misconduct, and policy manipulation cases.</p>
        </div>
      </div>

      <div class="industry-card">
        
        <div>
          <h3>Corporate &amp; Private Sector</h3>
          <p>Executive misconduct, financial reporting fraud, and internal theft across private enterprises.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="wrap">
    <div class="cta-inner">
      <h2>Suspect fraud? Act now.</h2>
      <p>Early intervention is critical. Contact ABPO Africa Limited today for a confidential consultation — our forensic team is ready to mobilise quickly and protect what matters most.</p>
      <a href="index.php#contact" class="btn-primary">Request a Confidential Consultation</a>
      <a href="index.php#services" class="btn-outline">View All Services</a>
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