<?php
/**
 * blog-post.php — Single article detail page for ABPO Africa Limited
 * Expects ?slug=your-post-slug
 */
require_once 'db.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if ($slug === '') {
    header('Location: blog.php');
    exit;
}

/* ---------- Fetch the post ---------- */
$stmt = $pdo->prepare("SELECT p.*, c.name AS category_name, c.slug AS category_slug,
                               a.name AS author_name, a.title AS author_title, a.avatar AS author_avatar
                        FROM blog_posts p
                        LEFT JOIN blog_categories c ON p.category_id = c.id
                        LEFT JOIN blog_authors a ON p.author_id = a.id
                        WHERE p.slug = :slug AND p.status = 'published'
                        LIMIT 1");
$stmt->execute([':slug' => $slug]);
$post = $stmt->fetch();

if (!$post) {
    header('HTTP/1.0 404 Not Found');
    $notFound = true;
} else {
    $notFound = false;

    // Increment view count (best-effort, ignore failure)
    try {
        $upd = $pdo->prepare("UPDATE blog_posts SET views = views + 1 WHERE id = :id");
        $upd->execute([':id' => $post['id']]);
    } catch (Exception $e) { /* silent */ }

    /* ---------- Related posts (same category, excluding current) ---------- */
    $relStmt = $pdo->prepare("SELECT p.*, c.name AS category_name
                               FROM blog_posts p
                               LEFT JOIN blog_categories c ON p.category_id = c.id
                               WHERE p.status = 'published' AND p.id != :id
                                 AND (p.category_id = :catId OR :catId IS NULL)
                               ORDER BY p.published_at DESC
                               LIMIT 3");
    $relStmt->execute([':id' => $post['id'], ':catId' => $post['category_id']]);
    $relatedPosts = $relStmt->fetchAll();
}

/* ---------- Helpers ---------- */
function timeAgoDetail($datetime) {
    return date('F j, Y', strtotime($datetime));
}
function initialsDetail($name) {
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
<title><?php echo $notFound ? 'Article Not Found' : htmlspecialchars($post['title']) . ' | ABPO Africa Limited Blog'; ?></title>

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
.wrap-narrow { max-width:760px; margin:0 auto; padding:0 5%; }

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

/* ARTICLE HEADER */
.article-hero { padding:160px 5% 70px; background:linear-gradient(140deg, var(--navy) 0%, #004080 50%, var(--teal) 100%); position:relative; overflow:hidden; }
.article-hero::before { content:""; position:absolute; inset:0; background-image:linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px); background-size:48px 48px; pointer-events:none; }
.article-hero-inner { position:relative; z-index:1; }

.breadcrumb { display:flex; align-items:center; gap:8px; font-size:0.85rem; color:rgba(255,255,255,0.65); margin-bottom:24px; flex-wrap:wrap; }
.breadcrumb a { color:rgba(255,255,255,0.85); font-weight:600; }
.breadcrumb a:hover { color:var(--gold); }

.article-tag { display:inline-block; background:rgba(245,197,24,0.15); color:var(--gold); border:1px solid rgba(245,197,24,0.3); font-size:0.78rem; font-weight:700; letter-spacing:0.06em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:22px; }
.article-hero h1 { font-size:var(--fs-title); color:#ffffff; font-weight:800; letter-spacing:-0.02em; margin-bottom:28px; max-width:880px; }

.article-meta { display:flex; align-items:center; gap:18px; flex-wrap:wrap; }
.author-avatar { width:46px; height:46px; border-radius:50%; background:var(--gold); color:var(--navy); font-size:0.9rem; font-weight:800; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.meta-text { display:flex; flex-direction:column; gap:3px; }
.meta-author { font-size:0.95rem; font-weight:700; color:#ffffff; }
.meta-sub { font-size:0.82rem; color:rgba(255,255,255,0.65); }
.meta-divider { width:1px; height:30px; background:rgba(255,255,255,0.2); }
.meta-stat { display:flex; align-items:center; gap:6px; font-size:0.85rem; color:rgba(255,255,255,0.75); }

/* ARTICLE BODY */
.article-section { padding:70px 5%; }
.article-content { font-size:var(--fs-body); color:var(--text-mid); line-height:1.9; }
.article-content p { margin-bottom:24px; }
.article-content h2 { font-size:clamp(1.3rem,2.5vw,1.7rem); color:var(--navy); margin:40px 0 18px; }
.article-content h3 { font-size:clamp(1.1rem,2vw,1.4rem); color:var(--navy); margin:32px 0 14px; }
.article-content ul, .article-content ol { margin:0 0 24px 24px; color:var(--text-mid); }
.article-content li { margin-bottom:10px; line-height:1.7; }
.article-content blockquote {
  border-left:4px solid var(--teal); background:var(--teal-light); padding:20px 26px;
  border-radius:0 var(--radius-sm) var(--radius-sm) 0; margin:28px 0; font-style:italic; color:var(--navy);
}

/* SHARE BAR */
.share-bar { display:flex; align-items:center; gap:14px; padding:28px 0; margin-top:20px; border-top:1px solid var(--border); border-bottom:1px solid var(--border); }
.share-label { font-size:0.85rem; font-weight:700; color:var(--navy); }
.share-icons { display:flex; gap:10px; }
.share-icon {
  width:38px; height:38px; border-radius:50%; background:var(--bg-soft); border:1px solid var(--border);
  display:flex; align-items:center; justify-content:center; color:var(--text-mid); transition:var(--transition);
}
.share-icon:hover { background:var(--teal); color:#fff; border-color:var(--teal); }

/* AUTHOR CARD */
.author-card {
  display:flex; gap:20px; align-items:flex-start; background:var(--bg-soft);
  border-radius:var(--radius-lg); padding:30px; margin-top:40px;
}
.author-card .author-avatar { width:64px; height:64px; font-size:1.1rem; background:var(--navy); color:#fff; }
.author-card h4 { font-size:clamp(1rem,2vw,1.1rem); color:var(--navy); margin-bottom:4px; }
.author-card .author-role { font-size:0.85rem; color:var(--teal); font-weight:600; margin-bottom:10px; }
.author-card p { font-size:0.92rem; color:var(--text-light); margin:0; line-height:1.65; }

/* RELATED POSTS */
.related-section { background:var(--bg-soft); padding:70px 5%; }
.related-header { text-align:center; margin-bottom:48px; }
.related-header h2 { font-size:clamp(1.6rem,3vw,2.2rem); color:var(--navy); font-weight:800; }
.related-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:28px; }
.related-card { background:var(--white); border:1px solid var(--border); border-radius:var(--radius-lg); overflow:hidden; transition:var(--transition); box-shadow:var(--shadow-sm); }
.related-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); border-color:rgba(0,131,143,0.25); }
.related-visual { height:140px; background:linear-gradient(135deg,var(--navy) 0%,var(--teal) 100%); display:flex; align-items:center; justify-content:center; }
.related-body { padding:24px; }
.related-tag { font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color:var(--teal); margin-bottom:10px; display:block; }
.related-body h3 { font-size:clamp(0.95rem,1.8vw,1.05rem); color:var(--navy); font-weight:700; line-height:1.45; }
.related-body h3 a { color:inherit; }
.related-body h3 a:hover { color:var(--teal); }

/* 404 STATE */
.not-found { padding:160px 5% 100px; text-align:center; }
.not-found svg { color:var(--border); margin-bottom:24px; }
.not-found h1 { font-size:clamp(1.6rem,3.5vw,2.2rem); margin-bottom:14px; }
.not-found p { max-width:420px; margin:0 auto 30px; }
.btn-primary { display:inline-block; background:var(--gold); color:var(--navy); font-family:var(--font); font-size:var(--fs-body); font-weight:700; padding:14px 32px; border-radius:var(--radius-sm); transition:var(--transition); }
.btn-primary:hover { background:var(--gold-hover); transform:translateY(-2px); }

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
  .related-grid { grid-template-columns:1fr; }
}
@media (max-width:640px) {
  .article-hero { padding:140px 5% 50px; }
  .article-section, .related-section { padding:56px 5%; }
  .author-card { flex-direction:column; }
  .footer-inner { flex-direction:column; text-align:center; }
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav id="navbar">
  <div class="nav-container">
    <div class="nav-logo">
      <img src="Abpo logo,1.png" alt="ABPO Africa Limited">
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
      <a href="index.php#contact" class="mobile-cta" id="mobileCta">Get a Quote</a>
    </div>
    <a href="index.php#contact" class="nav-cta">Get a Quote</a>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
      <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>
</nav>

<?php if ($notFound): ?>

  <!-- 404 STATE -->
  <section class="not-found">
    <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
    </svg>
    <h1>Article Not Found</h1>
    <p>The article you're looking for doesn't exist or may have been moved. Browse our latest insights instead.</p>
    <a href="blog.php" class="btn-primary">Back to Blog</a>
  </section>

<?php else: ?>

  <!-- ARTICLE HERO -->
  <section class="article-hero">
    <div class="wrap article-hero-inner">
      <div class="breadcrumb">
        <a href="blog.php">Blog</a>
        <span>/</span>
        <span><?php echo htmlspecialchars($post['category_name'] ?? 'Insights'); ?></span>
      </div>

      <span class="article-tag"><?php echo htmlspecialchars($post['category_name'] ?? 'Insights'); ?></span>
      <h1><?php echo htmlspecialchars($post['title']); ?></h1>

      <div class="article-meta">
        <div class="author-avatar"><?php echo initialsDetail($post['author_name'] ?? 'ABPO'); ?></div>
        <div class="meta-text">
          <span class="meta-author"><?php echo htmlspecialchars($post['author_name'] ?? 'ABPO Team'); ?></span>
          <span class="meta-sub"><?php echo htmlspecialchars($post['author_title'] ?? 'ABPO Africa Limited'); ?></span>
        </div>
        <div class="meta-divider"></div>
        <span class="meta-stat">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          <?php echo timeAgoDetail($post['published_at']); ?>
        </span>
        <span class="meta-stat">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <?php echo (int) $post['read_time']; ?> min read
        </span>
      </div>
    </div>
  </section>

  <!-- ARTICLE BODY -->
  <section class="article-section">
    <div class="wrap-narrow">

      <div class="article-content">
        <?php echo $post['content']; // Trusted CMS content — sanitize/strip_tags() if user-submitted ?>
      </div>

      <!-- SHARE BAR -->
      <div class="share-bar">
        <span class="share-label">Share this article</span>
        <div class="share-icons">
          <a class="share-icon" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('https://abpoafrica.com/blog-post.php?slug=' . $post['slug']); ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-9h3v9zm-1.5-10.28c-.97 0-1.75-.79-1.75-1.75s.78-1.75 1.75-1.75 1.75.79 1.75 1.75-.78 1.75-1.75 1.75zm13.5 10.28h-3v-4.5c0-1.07-.02-2.45-1.5-2.45-1.5 0-1.73 1.17-1.73 2.37v4.58h-3v-9h2.88v1.23h.04c.4-.76 1.38-1.56 2.84-1.56 3.04 0 3.6 2 3.6 4.59v4.74z"/></svg>
          </a>
          <a class="share-icon" href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://abpoafrica.com/blog-post.php?slug=' . $post['slug']); ?>&text=<?php echo urlencode($post['title']); ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M23 4.5c-.85.38-1.76.63-2.72.75 1-.6 1.76-1.55 2.12-2.68-.93.55-1.96.95-3.06 1.17-.88-.94-2.13-1.53-3.51-1.53-2.66 0-4.81 2.16-4.81 4.81 0 .38.04.74.12 1.09-4-.2-7.55-2.12-9.92-5.03-.42.72-.66 1.55-.66 2.44 0 1.67.85 3.14 2.14 4-.79-.02-1.53-.24-2.18-.6v.06c0 2.33 1.66 4.27 3.86 4.71-.4.11-.83.17-1.27.17-.31 0-.61-.03-.9-.08.61 1.91 2.39 3.3 4.49 3.34-1.65 1.29-3.73 2.06-5.99 2.06-.39 0-.77-.02-1.15-.07 2.13 1.37 4.67 2.17 7.4 2.17 8.88 0 13.74-7.36 13.74-13.74 0-.21 0-.42-.01-.62.94-.68 1.76-1.53 2.41-2.5z"/></svg>
          </a>
          <a class="share-icon" href="mailto:?subject=<?php echo urlencode($post['title']); ?>&body=<?php echo urlencode('I thought you might find this interesting: https://abpoafrica.com/blog-post.php?slug=' . $post['slug']); ?>" aria-label="Share via Email">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </a>
        </div>
      </div>

      <!-- AUTHOR CARD -->
      <?php if (!empty($post['author_name'])): ?>
        <div class="author-card">
          <div class="author-avatar"><?php echo initialsDetail($post['author_name']); ?></div>
          <div>
            <h4><?php echo htmlspecialchars($post['author_name']); ?></h4>
            <span class="author-role"><?php echo htmlspecialchars($post['author_title'] ?? 'ABPO Africa Limited'); ?></span>
            <p>Part of the advisory team at ABPO Africa Limited, helping organizations across the continent navigate risk, compliance, and growth with practical, evidence-based guidance.</p>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <!-- RELATED POSTS -->
  <?php if (!empty($relatedPosts)): ?>
  <section class="related-section">
    <div class="wrap">
      <div class="related-header">
        <h2>Related Insights</h2>
      </div>
      <div class="related-grid">
        <?php foreach ($relatedPosts as $rel): ?>
          <article class="related-card">
            <div class="related-visual">
              <svg width="36" height="36" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="1.3" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
              </svg>
            </div>
            <div class="related-body">
              <span class="related-tag"><?php echo htmlspecialchars($rel['category_name'] ?? 'Insights'); ?></span>
              <h3><a href="blog-post.php?slug=<?php echo urlencode($rel['slug']); ?>"><?php echo htmlspecialchars($rel['title']); ?></a></h3>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endif; ?>

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