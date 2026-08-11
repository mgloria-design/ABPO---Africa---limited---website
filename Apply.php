<?php
require_once __DIR__ . '/jobs-data.php';

$slug = $_GET['job'] ?? null;
$job = find_job($jobs, $slug);

$success = isset($_GET['success']);
$error = $_GET['error'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $job ? h($job['title']) . ' — Apply' : 'General Application' ?> — ABPO Careers</title>
<link rel="stylesheet" href="style.css">
<style>
:root{
  --navy: var(--navy, #0A1F3D);
  --cyan: var(--cyan, #12B5B0);
  --lblue: var(--lblue, #EAF4F8);
  --white: var(--white, #FFFFFF);
  --text: var(--text, #0F2138);
  --muted: #64748b;
  --border: #DCE7EE;
  --radius: 14px;
}
.wrap{max-width:1180px;margin:0 auto;padding:0 5%;}
.apply-page{background:var(--lblue);min-height:calc(100vh - 64px);padding:60px 0;}
.apply-card{max-width:620px;margin:0 auto;background:var(--white);border-radius:var(--radius);border:1px solid var(--border);padding:44px;}
.apply-card h1{font-size:1.55rem;margin:0;}
.apply-card .eyebrow{font-size:.72rem;letter-spacing:.16em;text-transform:uppercase;color:var(--cyan);font-weight:700;}
.apply-card .job-ref{margin-top:8px;color:var(--muted);font-size:.9rem;}
.field{margin-top:22px;}
.field label{display:block;font-size:.82rem;font-weight:600;margin-bottom:8px;color:var(--text);}
.field input[type=text],.field input[type=email],.field input[type=tel],.field textarea{
  width:100%;padding:12px 14px;border:1px solid var(--border);border-radius:10px;
  font-size:.92rem;background:#FBFDFE;font-family:inherit;
}
.field textarea{resize:vertical;min-height:110px;}
.field input:focus,.field textarea:focus{outline:2px solid var(--cyan);outline-offset:1px;}
.file-drop{border:1.5px dashed var(--border);border-radius:10px;padding:20px;background:#FBFDFE;font-size:.85rem;color:var(--muted);}
.helper{font-size:.76rem;color:var(--muted);margin-top:6px;}
.submit-row{margin-top:28px;}
.btn-primary{background:var(--cyan);color:#071630;border:none;padding:13px 24px;border-radius:999px;font-weight:600;font-size:.92rem;cursor:pointer;width:100%;}
.alert{padding:14px 18px;border-radius:10px;font-size:.88rem;margin-bottom:24px;}
.alert-success{background:#E4F8EE;color:#0B6B3A;border:1px solid #BEEBD2;}
.alert-error{background:#FDECEC;color:#A31212;border:1px solid #F6C7C7;}
@media(max-width:700px){.apply-card{padding:28px;}}
</style>
</head>
<body>

<nav style="background:var(--navy,#0A1F3D);padding:18px 5%;">
  <div class="wrap" style="display:flex;align-items:center;justify-content:space-between;padding:0;">
    <a href="index.php" style="color:#fff;font-weight:700;font-size:1.1rem;text-decoration:none;">AB<span style="color:var(--cyan);">PO</span></a>
    <a href="careers.php" style="color:#C7D5E4;text-decoration:none;font-size:.9rem;">&larr; Back to Careers</a>
  </div>
</nav>

<div class="apply-page">
  <div class="wrap">
    <div class="apply-card">

      <?php if ($success): ?>
        <div class="alert alert-success">Your application has been sent to our HR team. We'll be in touch if there's a fit.</div>
      <?php endif; ?>

      <?php if ($error === 'file'): ?>
        <div class="alert alert-error">Please upload your CV as a PDF, DOC or DOCX file under 5MB.</div>
      <?php elseif ($error === 'fields'): ?>
        <div class="alert alert-error">Please fill in all required fields.</div>
      <?php elseif ($error === 'mail'): ?>
        <div class="alert alert-error">Something went wrong sending your application. Please try again or email us directly.</div>
      <?php endif; ?>

      <?php if (!$success): ?>
        <span class="eyebrow"><?= $job ? h($job['department']) : 'Careers' ?></span>
        <h1><?= $job ? h($job['title']) : 'General Application' ?></h1>
        <p class="job-ref">
          <?php if ($job): ?>
            <?= h($job['location']) ?> · <?= h($job['type']) ?>
          <?php else: ?>
            Tell us where you'd fit — we'll match you to a team.
          <?php endif; ?>
        </p>

        <form action="submit_application.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="job_slug" value="<?= h($job['slug'] ?? '') ?>">
          <input type="hidden" name="job_title" value="<?= h($job['title'] ?? 'General Application') ?>">

          <div class="field">
            <label for="full_name">Full name *</label>
            <input type="text" id="full_name" name="full_name" required>
          </div>

          <div class="field">
            <label for="email">Email address *</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="field">
            <label for="phone">Phone number *</label>
            <input type="tel" id="phone" name="phone" required>
          </div>

          <div class="field">
            <label for="cover_note">Why ABPO? (optional)</label>
            <textarea id="cover_note" name="cover_note" placeholder="A few sentences on why you'd be a good fit..."></textarea>
          </div>

          <div class="field">
            <label for="cv">Upload CV *</label>
            <div class="file-drop">
              <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required style="width:100%;">
              <div class="helper">PDF, DOC or DOCX — max 5000KB</div>
            </div>
          </div>

          <div class="submit-row">
            <button type="submit" class="btn-primary">Submit application</button>
          </div>
        </form>
      <?php endif; ?>

    </div>
  </div>
</div>

</body>
</html>