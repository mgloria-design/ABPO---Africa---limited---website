<?php
require_once __DIR__ . '/Db.php';
$conn = getDBConnection();

/* ---------------------------------------------------------------
   1. Get and validate the requested service slug
--------------------------------------------------------------- */
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$slug = preg_replace('/[^a-z0-9\-]/', '', strtolower($slug));

if ($slug === '') {
    header('Location: index.php');
    exit;
}

/* ---------------------------------------------------------------
   2. Fetch the service
--------------------------------------------------------------- */
$stmt = $conn->prepare('SELECT * FROM services WHERE slug = ? LIMIT 1');
$stmt->bind_param('s', $slug);
$stmt->execute();
$service = $stmt->get_result()->fetch_assoc();
$stmt->close();
$notFound = !$service;

/* ---------------------------------------------------------------
   3. Fetch features, benefits, and other services (only if found)
--------------------------------------------------------------- */
$features = $benefits = $otherServices = [];

if (!$notFound) {
    $pointsStmt = $conn->prepare(
        'SELECT type, point_title, point_text FROM service_points
         WHERE service_id = ? ORDER BY type, sort_order ASC'
    );
    $pointsStmt->bind_param('i', $service['id']);
    $pointsStmt->execute();
    $points = $pointsStmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $pointsStmt->close();

    $features = array_values(array_filter($points, fn($p) => $p['type'] === 'feature'));
    $benefits = array_values(array_filter($points, fn($p) => $p['type'] === 'benefit'));

    $otherStmt = $conn->prepare(
        'SELECT slug, title, tagline FROM services WHERE id != ? ORDER BY sort_order ASC'
    );
    $otherStmt->bind_param('i', $service['id']);
    $otherStmt->execute();
    $otherServices = $otherStmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $otherStmt->close();
}

if ($notFound) {
    http_response_code(404);
}

$pageTitle = $notFound ? 'Service Not Found' : $service['title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?> | ABPO Africa Limited</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
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
    --gold: gold;
    --gold-dark: #b8860b;
    --radius: 6px;
    --shadow: 0 8px 24px rgba(0,0,0,0.08);
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  html{scroll-behavior:smooth;}
  body{font-family:"Open Sans",system-ui,sans-serif;background:var(--white);color:var(--text);overflow-x:hidden;padding-top:100px;line-height:1.6;}
  h1,h2,h3,h4,h5,h6,.section-title{font-family:'open sans',sans-serif;color:var(--navy);line-height:1.15;}
  p { margin:0 0 1em; color:var(--muted); }
  a { color:inherit; text-decoration:none; }
  .wrap { max-width:1140px; margin:0 auto; padding:0 24px; }
  :focus-visible { outline:2px solid var(--cyan); outline-offset:3px; }

  .btn { display:inline-flex; align-items:center; gap:8px; padding:12px 24px; border-radius:var(--radius); font-weight:600; font-size:.95rem; border:1px solid transparent; }
  .btn-primary { background:var(--gold); color:var(--navy); }
  .btn-primary:hover { background:var(--gold-dark); color:#fff; }

  /* ---- NAV (matches index.php) ---- */
  nav{position:fixed;top:0;left:0;right:0;z-index:9999;height:100px;padding:0 5%;display:grid !important;grid-template-columns:1fr auto 1fr;align-items:center;background:#fff;border-bottom:1px solid var(--border);transition:all .3s ease;}
  nav.scrolled{box-shadow:0 4px 20px rgba(0,0,0,0.08);}
  .nav-container{display:flex;align-items:center;justify-content:center;gap:40px;}
  .nav-logo{display:flex;align-items:center;flex:1;}
  .nav-logo img{height:70px;width:auto;object-fit:contain;}
  .nav-links{display:flex;align-items:center;justify-content:center;flex:1;gap:26px;}
  .nav-links a, .dropdown .dropbtn{font-size:1rem;font-weight:600;color:#1f2937;text-decoration:none;padding:10px 16px;}
  .nav-links a:hover, .dropdown .dropbtn:hover{color:var(--cyan);}
  .nav-cta{flex:1;display:flex;justify-content:flex-end;margin-left:auto;background:var(--gold) !important;color:var(--navy) !important;padding:9px 20px !important;border-radius:8px;font-weight:600 !important;text-decoration:none;}
  .dropdown{position:relative;display:inline-block;}
  .dropdown-content{display:none;position:absolute;top:100%;left:0;background:#fff;min-width:260px;border:1px solid var(--border);border-radius:8px;box-shadow:0 10px 25px rgba(0,0,0,0.15);z-index:99999;flex-direction:column;}
  .dropdown-content a{display:block;padding:10px 16px;text-decoration:none;white-space:nowrap;color:var(--text);}
  .dropdown-content a:hover{background:#f4f7fa;color:var(--cyan);}
  .dropdown:hover .dropdown-content{display:block;}

  .breadcrumb { display:flex; gap:8px; font-size:.85rem; color:var(--muted); padding:18px 24px; }
  .breadcrumb .current { color:var(--text); font-weight:600; }

  .service-hero { background:linear-gradient(135deg,var(--navy),#1e293b); color:#fff; padding:56px 0 64px; position:relative; }
  .service-hero::after { content:""; position:absolute; left:0; right:0; bottom:0; height:4px; background:linear-gradient(90deg,var(--gold),var(--cyan)); }
  .service-hero h1 { color:#fff; font-size:clamp(2rem,4vw,2.75rem); }
  .service-tagline { color:rgba(255,255,255,.8); font-size:1.1rem; margin:0; max-width:680px; }

  .service-overview { padding:48px 0 8px; }
  .service-overview p { max-width:760px; font-size:1.05rem; color:var(--text); border-left:3px solid var(--gold); padding-left:20px; }

  .section-label { display:flex; align-items:center; gap:14px; margin-bottom:28px; }
  .section-label .rule { width:36px; height:2px; background:var(--gold); display:inline-block; }
  .section-label h2 { margin:0; font-size:1.5rem; }

  .service-points { padding:48px 0; }
  .points-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:20px; }
  .point-card { background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:24px; box-shadow:var(--shadow); }
  .point-card h3 { font-size:1.05rem; margin-bottom:8px; }
  .point-card p { margin:0; font-size:.95rem; }

  .service-points--alt { background:#f4f7fa; }
  .benefit-list { list-style:none; margin:0; padding:0; max-width:820px; }
  .benefit-list li { display:flex; gap:16px; padding:18px 0; border-bottom:1px solid var(--border); }
  .benefit-list li:last-child { border-bottom:none; }
  .benefit-check { flex:none; width:28px; height:28px; display:grid; place-items:center; background:var(--glow); color:var(--cyan); border-radius:50%; font-weight:700; }
  .benefit-list h3 { font-size:1rem; margin-bottom:4px; }
  .benefit-list p { margin:0; font-size:.92rem; }

  .service-cta { background:var(--navy); color:#fff; padding:48px 0; margin-top:16px; }
  .service-cta-inner { display:flex; align-items:center; justify-content:space-between; gap:24px; flex-wrap:wrap; }
  .service-cta h2 { color:#fff; font-size:1.4rem; margin-bottom:6px; }
  .service-cta p { color:rgba(255,255,255,.75); margin:0; }

  .related-services { padding:56px 0 72px; }
  .related-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:16px; }
  .related-card { display:block; background:var(--card); border:1px solid var(--border); border-radius:var(--radius); padding:18px 20px; }
  .related-card:hover { border-color:var(--cyan); }
  .related-title { display:block; font-weight:600; color:var(--navy); margin-bottom:4px; }
  .related-tagline { display:block; font-size:.85rem; color:var(--muted); }

  .not-found { padding:96px 24px; text-align:center; }

  .site-footer { background:var(--deep); color:rgba(255,255,255,.8); margin-top:0; }
  .footer-inner { padding:32px 0; display:flex; justify-content:space-between; flex-wrap:wrap; gap:16px; font-size:.85rem; }
  .footer-inner a:hover { color:var(--gold); }

  @media (max-width:860px){ .points-grid,.related-grid{grid-template-columns:1fr;} .service-cta-inner{flex-direction:column;align-items:flex-start;} }
  @media (max-width:560px){ .nav-links{display:none;} }
</style>

</head>
<body>

<!-- NAV -->
<nav id="navbar">
  <div class="nav-container">
    <div class="nav-logo">
      <img src="Abpo logo,1.png" alt="ABPO AFRICA LOGO">
    </div>
    <div class="nav-links">
      <a href="index.php#home">Home</a>
      <a href="index.php#about">About Us</a>
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
    </div>
    <a href="index.php#contact" class="nav-cta">Get a Quote</a>
  </div>
</nav>
<script>
  window.addEventListener('scroll', function () {
    document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
  });
</script>

<?php if ($notFound): ?>

  <main class="wrap not-found">
    <h1>Service not found</h1>
    <p>The service you are looking for may have been moved or no longer exists.</p>
    <a class="btn btn-primary" href="index.php#services">Back to all services</a>
  </main>


<?php else: ?>



  <section class="service-hero">
    <div class="wrap">
      <h1><?= htmlspecialchars($service['title']) ?></h1>
      <p class="service-tagline"><?= htmlspecialchars($service['tagline']) ?></p>
    </div>
  </section>

  <section class="service-overview">
    <div class="wrap">
      <p><?= nl2br(htmlspecialchars($service['overview'])) ?></p>
    </div>
  </section>

  <?php if (!empty($features)): ?>
  <section class="service-points">
    <div class="wrap">
      <div class="section-label"><span class="rule"></span><h2>What's Contains</h2></div>
      <div class="points-grid">
        <?php foreach ($features as $f): ?>
        <div class="point-card">
          <h3><?= htmlspecialchars($f['point_title']) ?></h3>
          <?php if (!empty($f['point_text'])): ?><p><?= htmlspecialchars($f['point_text']) ?></p><?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

 <section class="service-points service-points--alt">
    <div class="wrap">
        <div class="section-label">
            <span class="rule"></span>
            <h2>Why It Matters</h2>
        </div>

        <ul class="benefit-list">
            <li>
                <span class="benefit-check">&#10003;</span>
                <div>
                    <h3>Enhanced Risk Management</h3>
                    <p>Identify, assess, and mitigate risks before they impact your operations.</p>
                </div>
            </li>

            <li>
                <span class="benefit-check">&#10003;</span>
                <div>
                    <h3>Improved Compliance</h3>
                    <p>Ensure adherence to regulatory requirements and industry standards.</p>
                </div>
            </li>

            <li>
                <span class="benefit-check">&#10003;</span>
                <div>
                    <h3>Operational Efficiency</h3>
                    <p>Streamline processes and improve productivity across the organization.</p>
                </div>
            </li>

            <li>
                <span class="benefit-check">&#10003;</span>
                <div>
                    <h3>Data Security</h3>
                    <p>Protect sensitive business information from cyber threats and unauthorized access.</p>
                </div>
            </li>
        </ul>
    </div>
</section>
  <section class="service-cta">
    <div class="wrap service-cta-inner">
      <div>
        <h2>Ready to talk about <?= htmlspecialchars($service['title']) ?>?</h2>
        <p>Tell us about your organisation and we'll recommend a way forward.</p>
      </div>
      <a class="btn btn-primary" href="index.php#contact">Talk to an Advisor</a>
    </div>
  </section>

  <?php if (!empty($otherServices)): ?>
  <section class="related-services">
    <div class="wrap">
      <div class="section-label"><span class="rule"></span><h2>Explore Other Services</h2></div>
      <div class="related-grid">
        <?php foreach ($otherServices as $o): ?>
        <a class="related-card" href="service.php?slug=<?= urlencode($o['slug']) ?>">
          <span class="related-title"><?= htmlspecialchars($o['title']) ?></span>
          <span class="related-tagline"><?= htmlspecialchars($o['tagline']) ?></span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endif; ?>


<footer class="site-footer">
  <div class="wrap footer-inner">
    <span>&copy; <?= date('Y') ?> ABPO Africa Limited. All rights reserved.</span>
    <a href="mailto:info@abpoafrica.com">info@abpoafrica.com</a>
  </div>
</footer>

</body>
</html>