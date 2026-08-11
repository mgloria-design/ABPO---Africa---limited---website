<?php
/*=========================================================
    ABPO Africa Limited - Cookie Consent
=========================================================*/
?>

<style>

.cookie-box{
    position:fixed;
    left:25px;
    bottom:25px;

    width:360px;
    max-width:calc(100% - 40px);

    background:#fff;
    border-radius:15px;
    padding:22px;

    box-shadow:0 15px 35px rgba(0,0,0,.18);

    border:1px solid #e5e7eb;

    z-index:9999;

    display:none;

    animation:slideUp .4s ease;
}

@keyframes slideUp{

from{
    opacity:0;
    transform:translateY(30px);
}

to{
    opacity:1;
    transform:translateY(0);
}

}

.cookie-box h3{
    color:#0B2E63;
    margin-bottom:10px;
    font-size:20px;
}

.cookie-box p{
    color:#555;
    font-size:14px;
    line-height:1.7;
    margin-bottom:20px;
}

.cookie-box a{
    color:#0B2E63;
    text-decoration:none;
    font-weight:600;
}

.cookie-buttons{

    display:flex;
    gap:10px;
}

.cookie-buttons button{

    flex:1;

    padding:12px;

    border:none;

    border-radius:8px;

    cursor:pointer;

    font-weight:600;

    transition:.3s;
}

.accept-btn{

    background:#0B2E63;
    color:#fff;
}

.accept-btn:hover{

    background:#08224b;
}

.decline-btn{

    background:#f3f4f6;
    color:#333;
}

.decline-btn:hover{

    background:#ddd;
}

@media(max-width:768px){

.cookie-box{

    left:15px;
    right:15px;
    bottom:15px;

    width:auto;

}

.cookie-buttons{

    flex-direction:column;

}

}

</style>

<div class="cookie-box" id="cookieBox">

<h3> Cookie Notice</h3>

<p>
We use cookies to improve your browsing experience and analyze website traffic.
Read our
<a href="privacy-policy.php">Privacy Policy</a>
and
<a href="cookies.php">Cookie Policy</a>.
</p>

<div class="cookie-buttons">

<button class="decline-btn" id="declineCookies">
Decline
</button>

<button class="accept-btn" id="acceptCookies">
Accept
</button>

</div>

</div>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const cookieBox=document.getElementById("cookieBox");

    if(localStorage.getItem("abpo_cookie_consent")===null){

        cookieBox.style.display="block";

    }

    document.getElementById("acceptCookies").addEventListener("click",function(){

        localStorage.setItem("abpo_cookie_consent","accepted");

        cookieBox.style.display="none";

    });

    document.getElementById("declineCookies").addEventListener("click",function(){

        localStorage.setItem("abpo_cookie_consent","declined");

        cookieBox.style.display="none";

    });

});

</script>