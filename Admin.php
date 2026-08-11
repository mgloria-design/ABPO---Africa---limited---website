<?php
session_start();
require_once 'db.php';

// ── Auth helpers ─────────────────────────────────────────────────────────────
function isLoggedIn(): bool {
    return isset($_SESSION['admin_id']);
}

function requireAuth(): void {
    if (!isLoggedIn()) {
        header('Location: admin.php?page=login');
        exit;
    }
}

function logout(): void {
    session_destroy();
    header('Location: admin.php?page=login');
    exit;
}

// ── Router ───────────────────────────────────────────────────────────────────
$page   = $_GET['page']   ?? 'dashboard';
$action = $_POST['action'] ?? '';
$conn   = null;

// ── Handle POST actions ───────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($action === 'login') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $conn = getDBConnection();
        $stmt = $conn->prepare("SELECT id, password_hash, full_name FROM admin_users WHERE username = ? LIMIT 1");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin_id']   = $user['id'];
            $_SESSION['admin_name'] = $user['full_name'];
            // Update last login
            $conn->query("UPDATE admin_users SET last_login=NOW() WHERE id=".(int)$user['id']);
            $conn->close();
            header('Location: admin.php');
            exit;
        }
        $loginError = 'Invalid username or password.';
        $conn->close();

    } elseif ($action === 'update_status') {
        requireAuth();
        $id     = (int)($_POST['id'] ?? 0);
        $status = $_POST['status'] ?? 'read';
        $allowed = ['new','read','replied','archived'];
        if ($id > 0 && in_array($status, $allowed)) {
            $conn = getDBConnection();
            $conn->query("UPDATE inquiries SET status='$status' WHERE id=$id");
            $conn->close();
        }
        header('Location: admin.php?page=inquiries');
        exit;

    } elseif ($action === 'delete') {
        requireAuth();
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            $conn = getDBConnection();
            $conn->query("DELETE FROM inquiries WHERE id=$id");
            $conn->close();
        }
        header('Location: admin.php?page=inquiries');
        exit;

    } elseif ($action === 'logout') {
        logout();
    }
}

if ($page === 'logout') logout();

// Open DB for GET pages
if ($page !== 'login') {
    requireAuth();
    $conn = getDBConnection();
}

// ── Fetch data ────────────────────────────────────────────────────────────────
$inquiries = [];
$stats     = ['total'=>0,'new'=>0,'read'=>0,'replied'=>0,'archived'=>0];

if ($conn) {
    // Stats
    $res = $conn->query("SELECT status, COUNT(*) AS cnt FROM inquiries GROUP BY status");
    while ($r = $res->fetch_assoc()) {
        $stats[$r['status']] = (int)$r['cnt'];
        $stats['total'] += (int)$r['cnt'];
    }

    // Inquiry list (with optional filter)
    $filterStatus = $_GET['status'] ?? '';
    $filterSQL    = $filterStatus ? "WHERE status='".($conn->real_escape_string($filterStatus))."'" : '';
    $res = $conn->query("SELECT * FROM inquiries $filterSQL ORDER BY created_at DESC LIMIT 200");
    while ($r = $res->fetch_assoc()) $inquiries[] = $r;

    // Single inquiry view
    $singleInquiry = null;
    if ($page === 'view' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $r  = $conn->query("SELECT * FROM inquiries WHERE id=$id")->fetch_assoc();
        if ($r) {
            $singleInquiry = $r;
            if ($r['status'] === 'new') {
                $conn->query("UPDATE inquiries SET status='read' WHERE id=$id");
            }
        }
    }
    $conn->close();
}

$adminName = $_SESSION['admin_name'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ABPO Africa – Admin Panel</title>
<style>
:root {
    --navy: #0a1628;
    --blue:  #1a4fd6;
    --lblue: #3b82f6;
    --accent:#00d4ff;
    --bg:    #0f1d35;
    --card:  #162040;
    --border:#1e3058;
    --text:  #e2e8f0;
    --muted: #7c8db5;
    --green: #22c55e;
    --yellow:#f59e0b;
    --red:   #ef4444;
}
*{box-sizing:border-box;margin:0;padding:0;}
body{font-family:'Segoe UI',system-ui,sans-serif;background:var(--navy);color:var(--text);min-height:100vh;}
a{color:var(--lblue);text-decoration:none;}
a:hover{color:var(--accent);}

/* LOGIN */
.login-wrap{display:flex;align-items:center;justify-content:center;min-height:100vh;background:linear-gradient(135deg,#060e1f,#0a1628,#0d1f3c);}
.login-card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:48px 40px;width:400px;max-width:95vw;}
.login-card h1{font-size:1.5rem;margin-bottom:4px;color:var(--accent);}
.login-card p{color:var(--muted);font-size:.875rem;margin-bottom:28px;}
.form-group{margin-bottom:20px;}
.form-group label{display:block;font-size:.8rem;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px;}
.form-group input,.form-group select,.form-group textarea{width:100%;background:#0a1628;border:1px solid var(--border);color:var(--text);padding:12px 14px;border-radius:8px;font-size:.95rem;transition:border .2s;}
.form-group input:focus,.form-group select:focus,.form-group textarea:focus{outline:none;border-color:var(--lblue);}
.btn{padding:12px 24px;border:none;border-radius:8px;font-weight:600;cursor:pointer;transition:.2s;font-size:.9rem;}
.btn-primary{background:linear-gradient(135deg,var(--blue),var(--lblue));color:#fff;width:100%;}
.btn-primary:hover{opacity:.9;}
.error-msg{background:#3f0a0a;border:1px solid var(--red);color:#fca5a5;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:.875rem;}

/* LAYOUT */
.layout{display:flex;min-height:100vh;}
.sidebar{width:240px;background:var(--card);border-right:1px solid var(--border);display:flex;flex-direction:column;padding:0;flex-shrink:0;}
.sidebar-logo{padding:24px 20px;border-bottom:1px solid var(--border);}
.sidebar-logo span{font-size:1.1rem;font-weight:700;color:var(--accent);}
.sidebar-logo small{display:block;color:var(--muted);font-size:.75rem;margin-top:2px;}
.sidebar-nav{flex:1;padding:16px 0;}
.nav-item{display:flex;align-items:center;gap:10px;padding:12px 20px;color:var(--muted);font-size:.9rem;font-weight:500;transition:.15s;cursor:pointer;}
.nav-item:hover,.nav-item.active{background:rgba(59,130,246,.12);color:var(--text);}
.nav-item.active{border-right:3px solid var(--lblue);}
.nav-item svg{width:18px;height:18px;}
.badge{background:var(--red);color:#fff;font-size:.7rem;padding:2px 7px;border-radius:99px;margin-left:auto;}
.sidebar-footer{padding:16px 20px;border-top:1px solid var(--border);}
.main{flex:1;display:flex;flex-direction:column;overflow:auto;}
.topbar{background:var(--card);border-bottom:1px solid var(--border);padding:16px 28px;display:flex;align-items:center;justify-content:space-between;}
.topbar h2{font-size:1.1rem;font-weight:600;}
.topbar-right{display:flex;align-items:center;gap:14px;color:var(--muted);font-size:.875rem;}
.content{padding:28px;}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:16px;margin-bottom:28px;}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:20px;text-align:center;}
.stat-card .num{font-size:2rem;font-weight:700;}
.stat-card .lbl{color:var(--muted);font-size:.8rem;text-transform:uppercase;letter-spacing:.05em;margin-top:4px;}
.stat-card.new .num{color:var(--accent);}
.stat-card.replied .num{color:var(--green);}
.stat-card.archived .num{color:var(--muted);}

/* TABLE */
.table-wrap{background:var(--card);border:1px solid var(--border);border-radius:12px;overflow:hidden;}
.table-head{padding:16px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;}
.table-head h3{font-size:.95rem;font-weight:600;}
.filter-tabs{display:flex;gap:8px;}
.filter-tab{padding:6px 14px;border-radius:99px;border:1px solid var(--border);background:transparent;color:var(--muted);font-size:.8rem;cursor:pointer;transition:.15s;}
.filter-tab:hover,.filter-tab.active{background:var(--blue);border-color:var(--blue);color:#fff;}
table{width:100%;border-collapse:collapse;}
th{background:#0d1830;padding:12px 16px;text-align:left;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:var(--muted);}
td{padding:13px 16px;border-top:1px solid var(--border);font-size:.875rem;vertical-align:top;}
tr:hover td{background:rgba(59,130,246,.05);}
.status-badge{padding:3px 10px;border-radius:99px;font-size:.75rem;font-weight:600;}
.status-new{background:#0c2a4a;color:var(--accent);}
.status-read{background:#1a2a1a;color:#86efac;}
.status-replied{background:#14280a;color:var(--green);}
.status-archived{background:#1a1a1a;color:var(--muted);}
.action-btns{display:flex;gap:6px;flex-wrap:wrap;}
.btn-sm{padding:5px 12px;font-size:.75rem;border-radius:6px;border:none;cursor:pointer;font-weight:600;}
.btn-view{background:#1a3a6a;color:#93c5fd;}
.btn-replied{background:#14340a;color:#86efac;}
.btn-archive{background:#2a2010;color:#fcd34d;}
.btn-delete{background:#3f0a0a;color:#fca5a5;}

/* SINGLE VIEW */
.inquiry-card{background:var(--card);border:1px solid var(--border);border-radius:12px;padding:28px;max-width:780px;}
.inquiry-card h3{font-size:1.2rem;margin-bottom:20px;}
.meta-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px;}
.meta-item label{font-size:.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:.05em;}
.meta-item p{margin-top:3px;font-size:.9rem;}
.msg-box{background:#0a1628;border:1px solid var(--border);border-radius:8px;padding:16px;line-height:1.7;white-space:pre-wrap;font-size:.9rem;margin-top:16px;}
.back-link{display:inline-flex;align-items:center;gap:6px;color:var(--muted);font-size:.875rem;margin-bottom:20px;}
</style>
</head>
<body>

<?php if ($page === 'login'): ?>
<!-- ── LOGIN PAGE ─────────────────────────────────────────────────────────── -->
<div class="login-wrap">
  <div class="login-card">
    <h1>ABPO Africa</h1>
    <p>Admin Panel — Sign in to continue</p>
    <?php if (!empty($loginError)): ?>
      <div class="error-msg"><?= htmlspecialchars($loginError) ?></div>
    <?php endif; ?>
    <form method="POST">
      <input type="hidden" name="action" value="login">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
  </div>
</div>

<?php else: ?>
<!-- ── AUTHENTICATED LAYOUT ───────────────────────────────────────────────── -->
<div class="layout">
  <div class="sidebar">
    <div class="sidebar-logo">
      <span>ABPO Africa</span>
      <small>Admin Panel</small>
    </div>
    <nav class="sidebar-nav">
      <a class="nav-item <?= $page==='dashboard'?'active':'' ?>" href="admin.php">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
      </a>
      <a class="nav-item <?= $page==='inquiries'||$page==='view'?'active':'' ?>" href="admin.php?page=inquiries">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        Inquiries
        <?php if ($stats['new'] > 0): ?><span class="badge"><?= $stats['new'] ?></span><?php endif; ?>
      </a>
    </nav>
    <div class="sidebar-footer">
      <form method="POST"><input type="hidden" name="action" value="logout">
        <button type="submit" style="background:none;border:none;color:var(--muted);cursor:pointer;font-size:.875rem;">⏻ Sign Out</button>
      </form>
    </div>
  </div>

  <div class="main">
    <div class="topbar">
      <h2><?= $page==='dashboard'?'Dashboard':($page==='view'?'Inquiry Detail':'All Inquiries') ?></h2>
      <div class="topbar-right">
        <span>👤 <?= htmlspecialchars($adminName) ?></span>
      </div>
    </div>
    <div class="content">

<?php if ($page === 'dashboard'): ?>
      <div class="stats-grid">
        <div class="stat-card"><div class="num"><?= $stats['total'] ?></div><div class="lbl">Total</div></div>
        <div class="stat-card new"><div class="num"><?= $stats['new'] ?></div><div class="lbl">New</div></div>
        <div class="stat-card"><div class="num"><?= $stats['read'] ?></div><div class="lbl">Read</div></div>
        <div class="stat-card replied"><div class="num"><?= $stats['replied'] ?></div><div class="lbl">Replied</div></div>
        <div class="stat-card archived"><div class="num"><?= $stats['archived'] ?></div><div class="lbl">Archived</div></div>
      </div>

      <div class="table-wrap">
        <div class="table-head"><h3>Recent Inquiries (Last 10)</h3></div>
        <table>
          <tr><th>Ref</th><th>Name</th><th>Subject</th><th>Service</th><th>Date</th><th>Status</th><th></th></tr>
          <?php foreach(array_slice($inquiries,0,10) as $q): ?>
          <tr>
            <td style="color:var(--muted)">ABPO-<?= str_pad($q['id'],5,'0',STR_PAD_LEFT) ?></td>
            <td><?= htmlspecialchars($q['full_name']) ?></td>
            <td><?= htmlspecialchars($q['subject']) ?></td>
            <td><span style="color:var(--muted)"><?= htmlspecialchars($q['service'] ?: '—') ?></span></td>
            <td style="color:var(--muted);white-space:nowrap"><?= date('M j, Y', strtotime($q['created_at'])) ?></td>
            <td><span class="status-badge status-<?= $q['status'] ?>"><?= ucfirst($q['status']) ?></span></td>
            <td><a href="admin.php?page=view&id=<?= $q['id'] ?>" class="btn-sm btn-view">View</a></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

<?php elseif ($page === 'inquiries'): ?>
      <div class="stats-grid">
        <div class="stat-card new"><div class="num"><?= $stats['new'] ?></div><div class="lbl">New</div></div>
        <div class="stat-card"><div class="num"><?= $stats['read'] ?></div><div class="lbl">Read</div></div>
        <div class="stat-card replied"><div class="num"><?= $stats['replied'] ?></div><div class="lbl">Replied</div></div>
        <div class="stat-card archived"><div class="num"><?= $stats['archived'] ?></div><div class="lbl">Archived</div></div>
      </div>
      <div class="table-wrap">
        <div class="table-head">
          <h3>All Inquiries</h3>
          <div class="filter-tabs">
            <?php $cur=$_GET['status']??''; foreach([''=>'All','new'=>'New','read'=>'Read','replied'=>'Replied','archived'=>'Archived'] as $v=>$l): ?>
              <a href="admin.php?page=inquiries<?= $v?'&status='.$v:'' ?>" class="filter-tab <?= $cur===$v?'active':'' ?>"><?= $l ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <table>
          <tr><th>Ref</th><th>Name</th><th>Email</th><th>Subject</th><th>Service</th><th>Date</th><th>Status</th><th>Actions</th></tr>
          <?php foreach($inquiries as $q): ?>
          <tr>
            <td style="color:var(--muted);white-space:nowrap">ABPO-<?= str_pad($q['id'],5,'0',STR_PAD_LEFT) ?></td>
            <td><?= htmlspecialchars($q['full_name']) ?></td>
            <td style="color:var(--muted)"><?= htmlspecialchars($q['email']) ?></td>
            <td><?= htmlspecialchars($q['subject']) ?></td>
            <td style="color:var(--muted)"><?= htmlspecialchars($q['service']?:'—') ?></td>
            <td style="color:var(--muted);white-space:nowrap"><?= date('M j, Y', strtotime($q['created_at'])) ?></td>
            <td><span class="status-badge status-<?= $q['status'] ?>"><?= ucfirst($q['status']) ?></span></td>
            <td>
              <div class="action-btns">
                <a href="admin.php?page=view&id=<?= $q['id'] ?>" class="btn-sm btn-view">View</a>
                <?php if($q['status']!=='replied'): ?>
                <form method="POST" style="display:inline"><input type="hidden" name="action" value="update_status">
                  <input type="hidden" name="id" value="<?= $q['id'] ?>"><input type="hidden" name="status" value="replied">
                  <button type="submit" class="btn-sm btn-replied">Replied</button></form>
                <?php endif; ?>
                <?php if($q['status']!=='archived'): ?>
                <form method="POST" style="display:inline"><input type="hidden" name="action" value="update_status">
                  <input type="hidden" name="id" value="<?= $q['id'] ?>"><input type="hidden" name="status" value="archived">
                  <button type="submit" class="btn-sm btn-archive">Archive</button></form>
                <?php endif; ?>
                <form method="POST" style="display:inline" onsubmit="return confirm('Delete this inquiry?')">
                  <input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?= $q['id'] ?>">
                  <button type="submit" class="btn-sm btn-delete">Delete</button></form>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php if(empty($inquiries)): ?>
          <tr><td colspan="8" style="text-align:center;padding:40px;color:var(--muted);">No inquiries found.</td></tr>
          <?php endif; ?>
        </table>
      </div>

<?php elseif ($page === 'view' && $singleInquiry): ?>
      <a class="back-link" href="admin.php?page=inquiries">← Back to Inquiries</a>
      <div class="inquiry-card">
        <h3><?= htmlspecialchars($singleInquiry['subject']) ?></h3>
        <div class="meta-grid">
          <div class="meta-item"><label>Reference</label><p>ABPO-<?= str_pad($singleInquiry['id'],5,'0',STR_PAD_LEFT) ?></p></div>
          <div class="meta-item"><label>Status</label><p><span class="status-badge status-<?= $singleInquiry['status'] ?>"><?= ucfirst($singleInquiry['status']) ?></span></p></div>
          <div class="meta-item"><label>Full Name</label><p><?= htmlspecialchars($singleInquiry['full_name']) ?></p></div>
          <div class="meta-item"><label>Email</label><p><a href="mailto:<?= htmlspecialchars($singleInquiry['email']) ?>"><?= htmlspecialchars($singleInquiry['email']) ?></a></p></div>
          <div class="meta-item"><label>Phone</label><p><?= htmlspecialchars($singleInquiry['phone']?:'—') ?></p></div>
          <div class="meta-item"><label>Service Interest</label><p><?= htmlspecialchars($singleInquiry['service']?:'—') ?></p></div>
          <div class="meta-item"><label>Submitted</label><p><?= date('F j, Y \a\t g:i A', strtotime($singleInquiry['created_at'])) ?></p></div>
          <div class="meta-item"><label>IP Address</label><p style="color:var(--muted)"><?= htmlspecialchars($singleInquiry['ip_address']?:'—') ?></p></div>
        </div>
        <label style="font-size:.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:.05em;">Message</label>
        <div class="msg-box"><?= htmlspecialchars($singleInquiry['message']) ?></div>
        <div class="action-btns" style="margin-top:20px;">
          <a href="mailto:<?= htmlspecialchars($singleInquiry['email']) ?>?subject=Re: <?= urlencode($singleInquiry['subject']) ?>" class="btn-sm btn-replied" style="padding:10px 18px;font-size:.85rem;">✉ Reply via Email</a>
          <form method="POST" style="display:inline"><input type="hidden" name="action" value="update_status">
            <input type="hidden" name="id" value="<?= $singleInquiry['id'] ?>"><input type="hidden" name="status" value="replied">
            <button type="submit" class="btn-sm btn-replied" style="padding:10px 18px;font-size:.85rem;">✓ Mark Replied</button></form>
          <form method="POST" style="display:inline"><input type="hidden" name="action" value="update_status">
            <input type="hidden" name="id" value="<?= $singleInquiry['id'] ?>"><input type="hidden" name="status" value="archived">
            <button type="submit" class="btn-sm btn-archive" style="padding:10px 18px;font-size:.85rem;">Archive</button></form>
        </div>
      </div>
<?php endif; ?>

    </div>
  </div>
</div>
<?php endif; ?>
</body>
</html>