<?php
/**
 * blog.php — Insights / Blog listing page for ABPO Africa Limited
 * Pulls published posts dynamically from MySQL via db.php
 */
require_once 'db.php';

/* ---------- Filters & pagination ---------- */
$categorySlug = isset($_GET['category']) ? trim($_GET['category']) : '';
$search       = isset($_GET['q']) ? trim($_GET['q']) : '';
$page         = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$perPage      = 6;
$offset       = ($page - 1) * $perPage;

/* ---------- Categories for filter bar ---------- */
$categories = $pdo->query("SELECT id, name, slug FROM blog_categories ORDER BY name ASC")->fetchAll();

/* ---------- Build WHERE clause ---------- */
$where  = ["p.status = 'published'"];
$params = [];

if ($categorySlug !== '') {
    $where[] = "c.slug = :catSlug";
    $params[':catSlug'] = $categorySlug;
}
if ($search !== '') {
    $where[] = "(p.title LIKE :search OR p.excerpt LIKE :search)";
    $params[':search'] = '%' . $search . '%';
}
$whereSql = implode(' AND ', $where);

/* ---------- Total count for pagination ---------- */
$countSql = "SELECT COUNT(*) FROM blog_posts p
             LEFT JOIN blog_categories c ON p.category_id = c.id
             WHERE $whereSql";
$countStmt = $pdo->prepare($countSql);
$countStmt->execute($params);
$totalPosts = (int) $countStmt->fetchColumn();
$totalPages = max(1, ceil($totalPosts / $perPage));

/* ---------- Featured post (only on default, unfiltered, page 1) ---------- */
$featuredPost = null;
if ($categorySlug === '' && $search === '' && $page === 1) {
    $featStmt = $pdo->query("SELECT p.*, c.name AS category_name, c.slug AS category_slug,
                                     a.name AS author_name, a.avatar AS author_avatar
                              FROM blog_posts p
                              LEFT JOIN blog_categories c ON p.category_id = c.id
                              LEFT JOIN blog_authors a ON p.author_id = a.id
                              WHERE p.status = 'published' AND p.is_featured = 1
                              ORDER BY p.published_at DESC
                              LIMIT 1");
    $featuredPost = $featStmt->fetch();
}

/* ---------- Main posts query ---------- */
$sql = "SELECT p.*, c.name AS category_name, c.slug AS category_slug,
               a.name AS author_name, a.avatar AS author_avatar
        FROM blog_posts p
        LEFT JOIN blog_categories c ON p.category_id = c.id
        LEFT JOIN blog_authors a ON p.author_id = a.id
        WHERE $whereSql";

// Exclude the featured post from the grid on the default view to avoid duplication
if ($featuredPost) {
    $sql .= " AND p.id != :featId";
}

$sql .= " ORDER BY p.published_at DESC LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
foreach ($params as $key => $val) {
    $stmt->bindValue($key, $val);
}
if ($featuredPost) {
    $stmt->bindValue(':featId', $featuredPost['id'], PDO::PARAM_INT);
}
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll();

/* ---------- Helpers ---------- */
function timeAgo($datetime) {
    $diff = time() - strtotime($datetime);
    if ($diff < 60) return 'Just now';
    $units = [
        31536000 => 'year', 2592000 => 'month', 604800 => 'week',
        86400 => 'day', 3600 => 'hour', 60 => 'minute'
    ];
    foreach ($units as $secs => $label) {
        $val = floor($diff / $secs);
        if ($val >= 1) return $val . ' ' . $label . ($val > 1 ? 's' : '') . ' ago';
    }
    return 'Just now';
}

function initials($name) {
    $parts = explode(' ', trim($name));
    $initials = '';
    foreach (array_slice($parts, 0, 2) as $p) {
        $initials .= strtoupper(substr($p, 0, 1));
    }
    return $initials ?: 'AB';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog & Insights | ABPO Africa Limited</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
html { scroll-behavior: smooth; }

:root {
  --navy:       navy;
  --teal:       teal;
  --teal-light: rgba(0, 128, 128, 0.08);
  --gold:       gold;
  --gold-hover: #b8860b;
  --white:      #ffffff;
  --bg-soft:    #f7f9fb;
  --border:     #e4e8ed;
  --text-dark:  #2d2d2d;
  --text-mid:   #4a4a4a;
  --text-light: #6b7280;
  --font:       'Open Sans', sans-serif;
  --fs-title:   clamp(2rem, 4vw, 3rem);
  --fs-body:    clamp(1rem, 2vw, 1.2rem);
  --radius-sm:  8px;
  --radius-md:  14px;
  --radius-lg:  20px;
  --shadow-sm:  0 1px 4px rgba(0,0,0,0.06);
  --shadow-md:  0 4px 16px rgba(0,0,0,0.08);
  --shadow-lg:  0 12px 32px rgba(0,0,0,0.10);
  --transition: all 0.28s cubic-bezier(0.4,0,0.2,1);
}

body { font-family:var(--font); font-size:var(--fs-body); color:var(--text-dark); background:var(--white); line-height:1.75; -webkit-font-smoothing:antialiased; }
h1,h2,h3,h4 { font-family:var(--font); color:var(--navy); line-height:1.2; font-weight:700; }
p { color:var(--text-mid); }
a { text-decoration:none; }
.wrap { max-width:1180px; margin:0 auto; padding:0 5%; }

/* NAVBAR */
nav { position:fixed; top:0; left:0; right:0; z-index:9999; height:88px; background:#ffffff; border-bottom:1px solid var(--border); box-shadow:0 2px 10px rgba(0,0,0,0.06); display:flex; align-items:center; transition:height 0.3s ease; }
nav.scrolled { height:72px; }
.nav-container { display:flex; align-items:center; justify-content:space-between; width:100%; max-width:1180px; margin:0 auto; padding:0 5%; }
.nav-logo img { height:54px; width:auto; object-fit:contain; display:block; transition:height 0.3s ease; }
nav.scrolled .nav-logo img { height:44px; }
.nav-links { display:flex; align-items:center; gap:4px; }
.nav-links a, .dropdown .dropbtn { font-family:var(--font); font-size:0.9rem; font-weight:600; color:var(--text-dark); padding:8px 14px; border-radius:var(--radius-sm); transition:var(--transition); border:none; background:none; cursor:pointer; }
.nav-links a:hover, .dropdown .dropbtn:hover { color:var(--teal); background:var(--teal-light); }
.nav-links a.active-page { color:var(--teal); background:var(--teal-light); }
.nav-cta { background:var(--gold) !important; color:var(--navy) !important; padding:9px 22px !important; border-radius:var(--radius-sm); font-weight:700 !important; font-size:0.9rem !important; transition:var(--transition); white-space:nowrap; }
.nav-cta:hover { background:var(--gold-hover) !important; transform:translateY(-1px); box-shadow:0 4px 14px rgba(245,197,24,0.35); }
.nav-toggle { display:none; background:none; border:none; cursor:pointer; color:var(--navy); padding:6px; }

/* DROPDOWN */
.dropdown { position:relative; display:inline-block; }
.dropdown-content { display:none !important; position:absolute; top:calc(100% + 8px); left:50%; transform:translateX(-50%); background:#fff; min-width:310px; border-radius:var(--radius-md); border:1px solid var(--border); box-shadow:var(--shadow-lg); z-index:99999; flex-direction:column; overflow:hidden; animation:dropFade 0.2s ease; }
@keyframes dropFade { from{opacity:0;transform:translateX(-50%) translateY(6px)} to{opacity:1;transform:translateX(-50%) translateY(0)} }
.dropdown-content a { display:block; padding:13px 20px; font-size:0.92rem; font-weight:500; color:var(--text-dark); border-bottom:1px solid #f1f5f9; transition:var(--transition); }
.dropdown-content a:last-child { border-bottom:none; }
.dropdown-content a:hover { background:var(--bg-soft); color:var(--teal); padding-left:26px; }
.dropdown:hover .dropdown-content { display:flex !important; }

/* HERO */
.page-hero { padding:160px 5% 90px; background:linear-gradient(140deg, var(--navy) 0%, #004080 50%, var(--teal) 100%); position:relative; overflow:hidden; }
.page-hero::before { content:""; position:absolute; inset:0; background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px); background-size:48px 48px; pointer-events:none; }
.page-hero::after { content:""; position:absolute; inset:0; background:radial-gradient(circle at 78% 25%,rgba(0,131,143,0.22) 0%,transparent 55%),radial-gradient(circle at 12% 85%,rgba(245,197,24,0.07) 0%,transparent 45%); pointer-events:none; }
.hero-inner { position:relative; z-index:1; max-width:760px; }
.hero-eyebrow { display:inline-block; background:rgba(245,197,24,0.15); color:var(--gold); border:1px solid rgba(245,197,24,0.3); font-size:0.78rem; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:24px; }
.page-hero h1 { font-size:var(--fs-title); color:#ffffff; font-weight:800; letter-spacing:-0.02em; margin-bottom:18px; }
.page-hero p { font-size:var(--fs-body); color:rgba(255,255,255,0.82); max-width:640px; line-height:1.8; }

/* SEARCH BAR */
.search-bar { margin-top:32px; max-width:480px; position:relative; }
.search-bar input {
  width:100%; padding:14px 50px 14px 20px; border-radius:100px; border:none;
  font-family:var(--font); font-size:0.95rem; color:var(--text-dark);
  background:#ffffff; box-shadow:var(--shadow-md);
}
.search-bar input:focus { outline:2px solid var(--gold); }
.search-bar button {
  position:absolute; right:6px; top:50%; transform:translateY(-50%);
  width:38px; height:38px; border-radius:50%; border:none;
  background:var(--gold); color:var(--navy); cursor:pointer;
  display:flex; align-items:center; justify-content:center;
  transition:var(--transition);
}
.search-bar button:hover { background:var(--gold-hover); }

/* CATEGORY FILTER BAR */
.filter-bar {
  background:var(--white); border-bottom:1px solid var(--border);
  padding:24px 5%; position:sticky; top:88px; z-index:500;
}
.filter-row { display:flex; flex-wrap:wrap; gap:10px; align-items:center; }
.filter-pill {
  font-family:var(--font); font-size:0.86rem; font-weight:600;
  color:var(--text-mid); background:var(--bg-soft); border:1px solid var(--border);
  padding:9px 18px; border-radius:100px; transition:var(--transition); white-space:nowrap;
}
.filter-pill:hover { border-color:var(--teal); color:var(--teal); }
.filter-pill.active { background:var(--navy); color:#ffffff; border-color:var(--navy); }

/* SECTION BASE */
.section { padding:70px 5%; }
.section-alt { background:var(--bg-soft); }

/* FEATURED POST */
.featured-post {
  display:grid; grid-template-columns:1.1fr 1fr; gap:0;
  background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg);
  overflow:hidden; box-shadow:var(--shadow-md); margin-bottom:60px;
}
.featured-visual {
  background:linear-gradient(140deg,var(--navy) 0%,var(--teal) 100%);
  display:flex; align-items:center; justify-content:center; min-height:280px; position:relative; overflow:hidden;
}
.featured-visual::before { content:""; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,0.08) 1.5px,transparent 1.5px); background-size:24px 24px; }
.featured-visual svg { position:relative; z-index:1; color:rgba(255,255,255,0.85); }
.featured-content { padding:44px 44px 40px; display:flex; flex-direction:column; justify-content:center; }
.featured-tag { display:inline-flex; align-items:center; gap:6px; background:var(--teal-light); color:var(--teal); font-size:0.78rem; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; padding:6px 14px; border-radius:100px; margin-bottom:18px; width:fit-content; }
.featured-content h2 { font-size:clamp(1.4rem,3vw,2rem); color:var(--navy); font-weight:800; margin-bottom:16px; line-height:1.3; }
.featured-content h2 a { color:inherit; }
.featured-content h2 a:hover { color:var(--teal); }
.featured-content p { font-size:var(--fs-body); color:var(--text-light); margin-bottom:24px; line-height:1.7; }
.post-meta { display:flex; align-items:center; gap:14px; }
.author-avatar { width:38px; height:38px; border-radius:50%; background:var(--navy); color:#fff; font-size:0.78rem; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.meta-text { display:flex; flex-direction:column; gap:2px; }
.meta-author { font-size:0.85rem; font-weight:700; color:var(--navy); }
.meta-sub { font-size:0.78rem; color:var(--text-light); }

/* BLOG GRID */
.blog-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:30px; }
.blog-card {
  background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg);
  overflow:hidden; transition:var(--transition); box-shadow:var(--shadow-sm); display:flex; flex-direction:column;
}
.blog-card:hover { transform:translateY(-5px); box-shadow:var(--shadow-lg); border-color:rgba(0,131,143,0.25); }
.card-visual {
  height:160px; background:linear-gradient(135deg,var(--navy) 0%,var(--teal) 100%);
  display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden;
}
.card-visual::before { content:""; position:absolute; inset:0; background-image:radial-gradient(rgba(255,255,255,0.08) 1.5px,transparent 1.5px); background-size:20px 20px; }
.card-visual svg { position:relative; z-index:1; color:rgba(255,255,255,0.8); }
.card-body { padding:26px 26px 28px; display:flex; flex-direction:column; flex:1; }
.card-tag { display:inline-block; font-size:0.74rem; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; color:var(--teal); margin-bottom:12px; }
.card-body h3 { font-size:clamp(1rem,2vw,1.15rem); color:var(--navy); font-weight:700; line-height:1.4; margin-bottom:12px; }
.card-body h3 a { color:inherit; }
.card-body h3 a:hover { color:var(--teal); }
.card-body > p { font-size:0.92rem; color:var(--text-light); line-height:1.65; margin-bottom:20px; flex:1; }
.card-footer { display:flex; align-items:center; justify-content:space-between; padding-top:16px; border-top:1px solid var(--border); }
.card-footer .post-meta { gap:10px; }
.card-footer .author-avatar { width:30px; height:30px; font-size:0.68rem; }
.card-footer .meta-author { font-size:0.78rem; }
.card-footer .meta-sub { font-size:0.72rem; }
.read-time { font-size:0.76rem; color:var(--text-light); font-weight:600; display:flex; align-items:center; gap:4px; }

/* EMPTY STATE */
.empty-state { text-align:center; padding:60px 20px; }
.empty-state svg { color:var(--border); margin-bottom:20px; }
.empty-state h3 { color:var(--navy); margin-bottom:10px; font-size:clamp(1.1rem,2vw,1.3rem); }
.empty-state p { color:var(--text-light); max-width:420px; margin:0 auto; }

/* PAGINATION */
.pagination { display:flex; justify-content:center; align-items:center; gap:8px; margin-top:56px; flex-wrap:wrap; }
.page-link {
  min-width:42px; height:42px; padding:0 14px; border-radius:var(--radius-sm);
  display:flex; align-items:center; justify-content:center;
  font-size:0.9rem; font-weight:700; color:var(--text-mid);
  background:var(--white); border:1px solid var(--border); transition:var(--transition);
}
.page-link:hover { border-color:var(--teal); color:var(--teal); }
.page-link.active { background:var(--navy); color:#fff; border-color:var(--navy); }
.page-link.disabled { opacity:0.4; pointer-events:none; }

/* NEWSLETTER CTA */
.newsletter-section { background:linear-gradient(140deg, var(--navy) 0%, var(--teal) 100%); padding:70px 5%; text-align:center; position:relative; overflow:hidden; }
.newsletter-section::before { content:""; position:absolute; inset:0; background:radial-gradient(circle at 80% 50%,rgba(0,131,143,0.15) 0%,transparent 60%); pointer-events:none; }
.newsletter-inner { position:relative; z-index:1; max-width:560px; margin:0 auto; }
.newsletter-section h2 { font-size:clamp(1.6rem,3.5vw,2.2rem); color:#ffffff; font-weight:800; margin-bottom:14px; }
.newsletter-section p { font-size:var(--fs-body); color:rgba(255,255,255,0.8); margin-bottom:30px; }
.newsletter-form { display:flex; gap:10px; flex-wrap:wrap; justify-content:center; }
.newsletter-form input {
  flex:1; min-width:240px; padding:14px 20px; border-radius:var(--radius-sm); border:none;
  font-family:var(--font); font-size:0.95rem;
}
.newsletter-form button {
  background:var(--gold); color:var(--navy); font-family:var(--font); font-weight:700;
  font-size:0.95rem; padding:14px 28px; border:none; border-radius:var(--radius-sm);
  cursor:pointer; transition:var(--transition);
}
.newsletter-form button:hover { background:var(--gold-hover); }

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
  .featured-post { grid-template-columns:1fr; }
  .featured-visual { min-height:200px; }
  .blog-grid { grid-template-columns:repeat(2,1fr); }
  .filter-bar { top:80px; }
}
@media (max-width:640px) {
  .section { padding:56px 5%; }
  .page-hero { padding:140px 5% 70px; }
  .blog-grid { grid-template-columns:1fr; }
  .featured-content { padding:30px 24px; }
  .footer-inner { flex-direction:column; text-align:center; }
  .newsletter-form { flex-direction:column; }
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
          <a href="data-analytics-business-insights.php">Data Analytics &amp; Business Insights</a>
        </div>
      </div>
      <a href="index.php#why-us">Why Us</a>
      <a href="blog.php" class="active-page">Blog</a>
      <a href="careers.php">Careers</a>
      <a href="index.php#contact">Contact</a>
      <a href="Testimonies.php">Testimonies</a>
        <!-- Mobile Quote Link -->
      <a href="#contact" class="mobile-cta" style="display: none;">Get a Quote</a>
    </div>

    <a href="#contact" class="nav-cta">Get a Quote</a>

    <!-- Hamburger toggle button -->
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
      <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
     
  </div>
</nav>

<!-- HERO -->
<section class="page-hero">
  <div class="wrap">
    <div class="hero-inner">
      <span class="hero-eyebrow">Blog &amp; Insights</span>
      <h1>Ideas, Insight &amp; Expertise from ABPO Africa</h1>
      <p>Practical perspectives on IT risk, fraud prevention, business process outsourcing, risk management, and data analytics — written by the advisors working with organizations across Africa every day.</p>

      <form class="search-bar" method="GET" action="blog.php">
        <input type="text" name="q" placeholder="Search articles..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" aria-label="Search">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- CATEGORY FILTER -->
<div class="filter-bar">
  <div class="wrap filter-row">
    <a href="blog.php" class="filter-pill <?php echo $categorySlug === '' ? 'active' : ''; ?>">All Posts</a>
    <?php foreach ($categories as $cat): ?>
      <a href="blog.php?category=<?php echo urlencode($cat['slug']); ?>"
         class="filter-pill <?php echo $categorySlug === $cat['slug'] ? 'active' : ''; ?>">
        <?php echo htmlspecialchars($cat['name']); ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<!-- FEATURED POST -->
<?php if ($featuredPost): ?>
<section class="section" style="padding-bottom:0;">
  <div class="wrap">
    <article class="featured-post">
      <div class="featured-visual">
        <svg width="72" height="72" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
        </svg>
      </div>
      <div class="featured-content">
        <span class="featured-tag">
          <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          Featured
        </span>
        <h2><a href="blog-post.php?slug=<?php echo urlencode($featuredPost['slug']); ?>"><?php echo htmlspecialchars($featuredPost['title']); ?></a></h2>
        <p><?php echo htmlspecialchars($featuredPost['excerpt']); ?></p>
        <div class="post-meta">
          <div class="author-avatar"><?php echo initials($featuredPost['author_name'] ?? 'ABPO'); ?></div>
          <div class="meta-text">
            <span class="meta-author"><?php echo htmlspecialchars($featuredPost['author_name'] ?? 'ABPO Team'); ?></span>
            <span class="meta-sub"><?php echo timeAgo($featuredPost['published_at']); ?> · <?php echo (int) $featuredPost['read_time']; ?> min read</span>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
<?php endif; ?>

<!-- BLOG GRID -->
<section class="section">
  <div class="wrap">

    <?php if (count($posts) === 0): ?>

      <div class="empty-state">
        <svg width="56" height="56" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <h3>No articles found</h3>
        <p>Try a different search term or browse all categories to see our latest insights.</p>
      </div>

    <?php else: ?>

      <div class="blog-grid">
        <?php foreach ($posts as $post): ?>
          <article class="blog-card">
            <div class="card-visual">
              <svg width="44" height="44" fill="none" stroke="currentColor" stroke-width="1.3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
              </svg>
            </div>
            <div class="card-body">
              <span class="card-tag"><?php echo htmlspecialchars($post['category_name'] ?? 'Insights'); ?></span>
              <h3><a href="blog-post.php?slug=<?php echo urlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
              <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
              <div class="card-footer">
                <div class="post-meta">
                  <div class="author-avatar"><?php echo initials($post['author_name'] ?? 'ABPO'); ?></div>
                  <div class="meta-text">
                    <span class="meta-author"><?php echo htmlspecialchars($post['author_name'] ?? 'ABPO Team'); ?></span>
                    <span class="meta-sub"><?php echo timeAgo($post['published_at']); ?></span>
                  </div>
                </div>
                <span class="read-time">
                  <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                  <?php echo (int) $post['read_time']; ?> min
                </span>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <?php if ($totalPages > 1): ?>
        <div class="pagination">
          <?php
            $qs = $_GET;

            $qs['page'] = max(1, $page - 1);
            $prevUrl = 'blog.php?' . http_build_query($qs);

            $qs['page'] = min($totalPages, $page + 1);
            $nextUrl = 'blog.php?' . http_build_query($qs);
          ?>
          <a href="<?php echo htmlspecialchars($prevUrl); ?>" class="page-link <?php echo $page <= 1 ? 'disabled' : ''; ?>">&larr;</a>

          <?php for ($i = 1; $i <= $totalPages; $i++):
            $qs['page'] = $i;
            $pageUrl = 'blog.php?' . http_build_query($qs);
          ?>
            <a href="<?php echo htmlspecialchars($pageUrl); ?>" class="page-link <?php echo $i === $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
          <?php endfor; ?>

          <a href="<?php echo htmlspecialchars($nextUrl); ?>" class="page-link <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">&rarr;</a>
        </div>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter-section">
  <div class="newsletter-inner">
    <h2>Stay Ahead of the Risk Curve</h2>
    <p>Get our latest insights on IT risk, fraud prevention, and business advisory delivered straight to your inbox.</p>
    <form class="newsletter-form" method="POST" action="newsletter-subscribe.php">
      <input type="email" name="email" placeholder="Your email address" required>
      <button type="submit">Subscribe</button>
    </form>
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