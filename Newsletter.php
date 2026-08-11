<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMAILER/src/Exception.php';
require 'PHPMAILER/src/PHPMailer.php';
require 'PHPMAILER/src/SMTP.php';

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

// Get and validate email
$email = trim($_POST['email'] ?? '');

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
            alert('Please enter a valid email address.');
            window.history.back();
          </script>";
    exit();
}

$mail = new PHPMailer(true);

try {

    // ===========================
    // SMTP Configuration
    // ===========================

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;

    // Your Gmail address
    $mail->Username   = 'mutheug343@gmail.com';

    // Your Gmail App Password (NOT your Gmail password)
    $mail->Password   = 'ptei pzwn mnjz rtqv';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // ===========================
    // Email Details
    // ===========================

    $mail->setFrom('mutheug343@gmail.com', 'ABPO Africa Website');

    // Email where notifications should be sent
    $mail->addAddress('mutheug343@gmail.com');

    // Optional: Replying goes to the subscriber
    $mail->addReplyTo($email);

    $mail->isHTML(true);

    $mail->Subject = '📩 New Newsletter Subscription';

    $mail->Body = "
    <html>
    <head>
        <style>
            body{
                font-family:Arial,sans-serif;
                color:#333;
            }
            .container{
                border:1px solid #ddd;
                padding:20px;
                border-radius:8px;
            }
            h2{
                color:#0056b3;
            }
        </style>
    </head>

    <body>

        <div class='container'>

            <h2>New Newsletter Subscriber</h2>

            <p>A visitor has subscribed to the ABPO Africa newsletter.</p>

            <table cellpadding='8' cellspacing='0' border='0'>

                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{$email}</td>
                </tr>

                <tr>
                    <td><strong>Date:</strong></td>
                    <td>" . date("d M Y h:i A") . "</td>
                </tr>

                <tr>
                    <td><strong>IP Address:</strong></td>
                    <td>" . $_SERVER['REMOTE_ADDR'] . "</td>
                </tr>

            </table>

        </div>

    </body>
    </html>
    ";

    $mail->AltBody = "New Newsletter Subscriber\n\nEmail: {$email}";

    $mail->send();

    echo "<script>
            alert('Thank you for subscribing to our newsletter!');
            window.location='index.php#newsletter';
          </script>";

} catch (Exception $e) {

    echo "<script>
            alert('Subscription failed. Please try again later.');
            window.location='index.php#newsletter';
          </script>";

}
?>