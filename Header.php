<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>ABPO Africa Limited</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav id="navbar">
  <div class="nav-logo">
    <img src="logo.png" alt="ABPO AFRICA LOGO" class="nav-logo-img">
  </div>

  <div class="nav-links" id="navLinks">

    <!-- Homepage links -->
    <a href="index.php#home">Home</a>
    <a href="index.php#about">About Us</a>

    <!-- Services dropdown -->
    <div class="dropdown">
      <a href="index.php#services" class="dropbtn">Services</a>

      <div class="dropdown-content">
        <a href="it-risk-advisory.php">IT Risk Advisory & Analytics</a>
        <a href="service.php?slug=business-process-outsourcing">Business Process Outsourcing</a>
        <a href="service.php?slug=fraud-forensic-investigation">Fraud & Forensic Investigation</a>
        <a href="service.php?slug=risk-management-advisory">Risk Management & Advisory</a>
        <a href="service.php?slug=data-analytics-business-insights">Data Analytics & Business Insights</a>
      </div>
    </div>

    <a href="index.php#why-us">Why Us</a>
    <a href="blog.php">Blog</a>
    <a href="careers.php">Careers</a>
    <a href="index.php#contact">Contact</a>

    <a href="index.php#contact" class="nav-cta">Get a Quote</a>

  </div>

  <button class="nav-toggle" id="navToggle" aria-label="Menu">
    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
  </button>
</nav>