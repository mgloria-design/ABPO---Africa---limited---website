<?php
require_once __DIR__ . '/jobs-data.php';

// Adjust this path to wherever PHPMailer lives in your project.
// If installed via Composer: require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ---- Configuration — update to match your mail setup ----
const SMTP_HOST     = 'smtp.yourmailprovider.com';
const SMTP_USER     = '[email protected]';
const SMTP_PASS     = 'your-smtp-password';
const SMTP_PORT     = 587;
const HR_EMAIL      = '[email protected]';
const FROM_EMAIL    = '[email protected]';
const FROM_NAME     = 'ABPO Careers';

const CV_MAX_BYTES  = 5 * 1024 * 1024; // 5MB
const CV_ALLOWED_EXT = ['pdf', 'doc', 'docx'];

function back_with_error(string $code, ?string $slug): void
{
    $qs = $slug ? "job={$slug}&error={$code}" : "error={$code}";
    header("Location: apply.php?{$qs}");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit;
}

$slug      = trim($_POST['job_slug'] ?? '');
$jobTitle  = trim($_POST['job_title'] ?? 'General Application');
$fullName  = trim($_POST['full_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$phone     = trim($_POST['phone'] ?? '');
$coverNote = trim($_POST['cover_note'] ?? '');

if ($fullName === '' || $email === '' || $phone === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    back_with_error('fields', $slug ?: null);
}

// ---- Validate uploaded CV ----
if (!isset($_FILES['cv']) || $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
    back_with_error('file', $slug ?: null);
}

$file = $_FILES['cv'];

if ($file['size'] > CV_MAX_BYTES) {
    back_with_error('file', $slug ?: null);
}

$originalName = $file['name'];
$ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

if (!in_array($ext, CV_ALLOWED_EXT, true)) {
    back_with_error('file', $slug ?: null);
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

$allowedMimes = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
];
if (!in_array($mime, $allowedMimes, true)) {
    back_with_error('file', $slug ?: null);
}

// ---- Send via PHPMailer ----
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->setFrom(FROM_EMAIL, FROM_NAME);
    $mail->addAddress(HR_EMAIL);
    $mail->addReplyTo($email, $fullName);

    // Attach the CV directly from the temp upload location
    $mail->addAttachment($file['tmp_name'], $originalName);

    $mail->isHTML(true);
    $mail->Subject = "New Application: {$jobTitle} — {$fullName}";
    $mail->Body = "
        <h3>New job application received</h3>
        <p><strong>Role:</strong> " . htmlspecialchars($jobTitle) . "</p>
        <p><strong>Name:</strong> " . htmlspecialchars($fullName) . "</p>
        <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
        <p><strong>Cover note:</strong><br>" . nl2br(htmlspecialchars($coverNote ?: '—')) . "</p>
        <p><em>CV attached.</em></p>
    ";
    $mail->AltBody = "New application for {$jobTitle}\nName: {$fullName}\nEmail: {$email}\nPhone: {$phone}\n\n{$coverNote}";

    $mail->send();
} catch (Exception $e) {
    back_with_error('mail', $slug ?: null);
}

$qs = $slug ? "job={$slug}&success=1" : "success=1";
header("Location: apply.php?{$qs}");
exit;