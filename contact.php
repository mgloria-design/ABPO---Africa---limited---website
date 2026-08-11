<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMAILER/src/Exception.php';
require 'PHPMAILER/src/PHPMailer.php';
require 'PHPMAILER/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Access denied.");
}

// Get form values
$full_name = trim($_POST["full_name"] ?? "");
$email     = trim($_POST["email"] ?? "");
$subject   = trim($_POST["subject"] ?? "");
$message   = trim($_POST["message"] ?? "");

// Validate
if (empty($full_name) || empty($email) || empty($subject) || empty($message)) {

    die("Please fill in all required fields.");

}

$mail = new PHPMailer(true);

try {

    // Tell PHPMailer to use SMTP
    $mail->isSMTP();

    // SMTP settings
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $mail->Username = 'mutheug343@gmail.com';
    $mail->Password = 'ptei pzwn mnjz rtqv';
    

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender
    $mail->setFrom('mutheug343@gmail.com', 'ABPO Africa Limited');

    // Recipient
    $mail->addAddress('mutheug343@gmail.com');

    // Reply goes to the visitor
    $mail->addReplyTo($email, $full_name);

    // Email format
    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body = "

        <h2>New Website Enquiry</h2>

        <p><strong>Name:</strong> {$full_name}</p>

        <p><strong>Email:</strong> {$email}</p>

        <p><strong>Subject:</strong> {$subject}</p>

        <p><strong>Message:</strong></p>

        <p>{$message}</p>

    ";

    $mail->send();

    echo "Your message has been sent successfully.";

} catch (Exception $e) {
    echo "Message could not be sent. Error: " . $mail->ErrorInfo;
}