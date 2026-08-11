<?php
$pageTitle = "Privacy Policy | ABPO Africa Limited";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f8fafc;
            color:#333;
            line-height:1.8;
        }

        .hero{
            background:linear-gradient(rgba(11,46,99,.88),rgba(11,46,99,.88)),
            url('assets/images/privacy-bg.jpg') center/cover;
            color:#fff;
            text-align:center;
            padding:100px 20px;
        }

        .hero h1{
            font-size:42px;
            margin-bottom:15px;
        }

        .hero p{
            max-width:700px;
            margin:auto;
            opacity:.95;
        }

        .container{
            width:90%;
            max-width:1100px;
            margin:60px auto;
        }

        .card{
            background:#fff;
            border-radius:12px;
            padding:40px;
            box-shadow:0 5px 25px rgba(0,0,0,.08);
        }

        .section{
            margin-bottom:45px;
        }

        .section h2{
            color:#0B2E63;
            margin-bottom:15px;
            font-size:26px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .section p{
            margin-bottom:15px;
        }

        ul{
            margin-left:25px;
        }

        ul li{
            margin-bottom:10px;
        }

        .highlight{
            background:#eef6ff;
            border-left:5px solid #0B2E63;
            padding:18px;
            border-radius:8px;
            margin-top:20px;
        }

        .contact{
            background:#0B2E63;
            color:white;
            padding:25px;
            border-radius:10px;
        }

        .contact a{
            color:#ffd54f;
            text-decoration:none;
        }

        footer{
            text-align:center;
            padding:30px;
            background:#111827;
            color:#fff;
            margin-top:60px;
        }

        @media(max-width:768px){

            .hero h1{
                font-size:32px;
            }

            .card{
                padding:25px;
            }

            .section h2{
                font-size:22px;
            }

        }

    </style>

</head>

<body>

<section class="hero">

    <h1>Privacy Policy</h1>

    <p>
        Your privacy is important to us. This Privacy Policy explains how ABPO Africa Limited
        collects, uses, stores, and protects your personal information.
    </p>

</section>


<div class="container">

<div class="card">

<div class="section">

<h2>Introduction</h2>

<p>
ABPO Africa Limited is committed to protecting the privacy and confidentiality of our clients,
partners, employees, and website visitors. By using our website, you consent to the practices
described in this Privacy Policy.
</p>

</div>


<div class="section">

<h2>Information We Collect</h2>

<p>We may collect the following information:</p>

<ul>

<li>Name</li>

<li>Email Address</li>

<li>Phone Number</li>

<li>Company Name</li>

<li>Business inquiries submitted through our contact forms</li>

<li>IP address and browser information</li>

<li>Cookies and website usage statistics</li>

</ul>

</div>



<div class="section">

<h2>How We Use Your Information</h2>

<p>Your information helps us:</p>

<ul>

<li>Respond to inquiries and requests.</li>

<li>Provide our consulting and advisory services.</li>

<li>Improve our website and customer experience.</li>

<li>Communicate service updates.</li>

<li>Maintain website security.</li>

<li>Meet legal and regulatory obligations.</li>

</ul>

</div>



<div class="section">

<h2> Data Security</h2>

<p>

We implement appropriate technical and organizational security measures to safeguard your
personal information against unauthorized access, alteration, disclosure, or destruction.

</p>

</div>



<div class="section">

<h2> Cookies</h2>

<p>

Our website may use cookies to improve user experience, analyze website traffic, and remember
user preferences. You may disable cookies through your browser settings.

</p>

</div>



<div class="section">

<h2> Information Sharing</h2>

<p>

ABPO Africa Limited does not sell or rent your personal information. Information may only be
shared:

</p>

<ul>

<li>With trusted service providers assisting our operations.</li>

<li>Where required by law.</li>

<li>To protect legal rights or prevent fraud.</li>

</ul>

</div>



<div class="section">

<h2> Your Rights</h2>

<p>You have the right to:</p>

<ul>

<li>Request access to your personal information.</li>

<li>Request correction of inaccurate information.</li>

<li>Request deletion where legally permitted.</li>

<li>Withdraw consent where applicable.</li>

<li>Object to certain processing activities.</li>

</ul>

</div>



<div class="section">

<h2>Third-Party Links</h2>

<p>

Our website may contain links to external websites. We are not responsible for the privacy
practices or content of third-party websites.

</p>

</div>



<div class="section">

<h2> Changes to This Policy</h2>

<p>

We may update this Privacy Policy periodically. Any changes will be posted on this page with an
updated revision date.

</p>

<div class="highlight">

<strong>Last Updated:</strong>

<?php echo date("F d, Y"); ?>

</div>

</div>



<div class="contact">

<h2><i class="fas fa-envelope"></i> Contact Us</h2>

<p>

If you have questions regarding this Privacy Policy, please contact us.

</p>

<p>

<strong>ABPO Africa Limited</strong><br>

Email:
<a href="mailto:info@abpoafrica.com">info@abpoafrica.com</a>

</p>

</div>

</div>

</div>



<footer>

&copy; <?php echo date("Y"); ?> ABPO Africa Limited. All Rights Reserved.

</footer>

</body>
</html>