<?php
$pageTitle = "Terms & Conditions | ABPO Africa Limited";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $pageTitle; ?></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f5f7fa;
    color:#333;
    line-height:1.8;
}

.hero{
    background:linear-gradient(rgba(11,46,99,.90),rgba(11,46,99,.90)),
    url('assets/images/terms-bg.jpg') center/cover no-repeat;
    padding:100px 20px;
    text-align:center;
    color:#fff;
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
    padding:45px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.section{
    margin-bottom:45px;
}

.section h2{
    color:#0B2E63;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    gap:10px;
    font-size:25px;
}

.section p{
    margin-bottom:15px;
}

.section ul{
    margin-left:25px;
}

.section li{
    margin-bottom:10px;
}

.notice{
    background:#EEF5FF;
    border-left:5px solid #0B2E63;
    padding:20px;
    border-radius:8px;
    margin-top:20px;
}

.contact{
    background:#0B2E63;
    color:white;
    padding:30px;
    border-radius:10px;
}

.contact a{
    color:#FFD54F;
    text-decoration:none;
}

footer{
    background:#111827;
    color:white;
    text-align:center;
    padding:25px;
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

<h1>Terms & Conditions</h1>

<p>
These Terms & Conditions govern your use of the ABPO Africa Limited website and services.
By accessing this website, you agree to comply with these terms.
</p>

</section>

<div class="container">

<div class="card">

<div class="section">

<h2> Acceptance of Terms</h2>

<p>
By accessing or using this website, you acknowledge that you have read, understood, and agreed to be bound by these Terms & Conditions. If you do not agree with any part of these terms, please discontinue use of this website.
</p>

</div>

<div class="section">

<h2> Use of the Website</h2>

<p>You agree to use this website only for lawful purposes and in a manner that does not:</p>

<ul>

<li>Violate any applicable law or regulation.</li>

<li>Attempt to gain unauthorized access to our systems.</li>

<li>Transmit viruses or malicious software.</li>

<li>Interfere with the operation or security of the website.</li>

<li>Use our content for illegal or fraudulent activities.</li>

</ul>

</div>

<div class="section">

<h2> Our Services</h2>

<p>

ABPO Africa Limited provides professional consulting services including but not limited to:

</p>

<ul>

<li>IT Risk Advisory & Analytics</li>

<li>Business Process Outsourcing (BPO)</li>

<li>Fraud & Forensic Investigations</li>

<li>Risk Management Advisory</li>

<li>Data Analytics & Business Intelligence</li>

<li>Technology Consulting</li>

</ul>

<p>

Information on this website is provided for general informational purposes and does not constitute professional advice unless agreed upon through a formal engagement.

</p>

</div>

<div class="section">

<h2> Intellectual Property</h2>

<p>

All content on this website including logos, graphics, text, images, documents, software, designs, and branding is the property of ABPO Africa Limited unless otherwise stated.

</p>

<p>

You may not reproduce, modify, distribute, publish, or commercially exploit any content without prior written permission.

</p>

</div>

<div class="section">

<h2> Disclaimer</h2>

<p>

While we strive to keep information accurate and up to date, ABPO Africa Limited makes no warranties regarding the completeness, accuracy, reliability, or availability of information contained on this website.

</p>

</div>

<div class="section">

<h2> Limitation of Liability</h2>

<p>

ABPO Africa Limited shall not be liable for any direct, indirect, incidental, consequential, or special damages arising from your use of this website or reliance on its content.

</p>

</div>

<div class="section">

<h2> Third-Party Links</h2>

<p>

Our website may include links to third-party websites for your convenience. We do not control or endorse their content and are not responsible for their privacy practices or services.

</p>

</div>

<div class="section">

<h2> Privacy</h2>

<p>

Your use of this website is also governed by our Privacy Policy. We encourage you to review it to understand how we collect and protect your personal information.

</p>

</div>

<div class="section">

<h2> Changes to These Terms</h2>

<p>

ABPO Africa Limited reserves the right to modify these Terms & Conditions at any time without prior notice. Continued use of the website constitutes acceptance of the updated terms.

</p>

<div class="notice">

<strong>Last Updated:</strong>

<?php echo date("F d, Y"); ?>

</div>

</div>

<div class="section">

<h2>Governing Law</h2>

<p>

These Terms & Conditions shall be governed and interpreted in accordance with the laws of the Republic of Kenya. Any disputes arising from the use of this website shall be subject to the jurisdiction of the Kenyan courts.

</p>

</div>

<div class="contact">

<h2> Contact Information</h2>

<p>

For questions regarding these Terms & Conditions, please contact us.

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