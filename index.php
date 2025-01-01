<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (isset($_SESSION["name"])) {
    header("Location: signinform.php");
    exit();
}
?>
<head>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- font -->
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="">ELITE AUTOMOTIVE</a>
        </div>
        <nav>
            <a href="index.php">HOME</a>
            <a href="aboutus.html">ABOUT US</a>
            <a href="services.html">SERVICES</a>
            <a href="contact.html">CONTACT US</a>
        </nav>
        <div class="rheader">
            <a href="https://maps.app.goo.gl/HUZx5m8ix8R1zwvWA" target="_blank" class="loc"><i class="fa-solid fa-location-dot"></i></a>
            <a href="signupform.php" class="button1">JOIN US NOW</a>
        </div>
    </header>
    <section class="homesec">
        <div class="container1">
            <h1 class="title">PREMIUM PARTS &<br>SERVICE.<br>POWERFUL VALUE.</h1>
        </div>
        <div class="buttons">
            <a href="signupform.php" class="button">schedule your service today</a>
        </div>
    </section>
    <section class="servicesec">
        <h1 class="title">OUR SERVICES</h1>
        <div class="container">

            <div class="card">
                <div class='top-img'>
                    <img src="images/oilchange.jpg" alt="alt" />
                </div><br>
                <div class='description'>
                    <h1>Oil Change</h1><br>
                    <p>Regular oil changes ensure that your engine runs smoothly and efficiently. Our team uses
                        high-quality oil and filters to maximize your car's performance and longevity.</p>
                </div>
            </div>

            <div class="card">
                <div class='top-img'>
                    <img src="images/brake.jpg" alt="alt" />
                </div><br>
                <div class='description'>
                    <h1>Brake Inspection & Repair</h1><br>
                    <p>Stay safe on the road with our expert brake services. From pad replacements to complete system
                        diagnostics, we’ll ensure your brakes are in perfect working condition.</p>
                </div>
            </div>

            <div class="card">
                <div class='top-img'>
                    <img src="images/tires.jpg" alt="alt" />
                </div><br>
                <div class='description'>
                    <h1>Tire Services</h1><br>
                    <p>Prolong the life of your tires with professional rotation and balancing services. Properly
                        maintained tires improve fuel efficiency, handling, and overall safety.</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="left">
            <a href="#">©2025 - ELITE AUTOMOTIVE | All rights reserved</a>
        </div>
        <div class="social">
            <i class="fa-brands fa-whatsapp"></i><a href="">+201010000000</a>
            <i class="fa-brands fa-facebook"></i><a href="">ELITE AUTOMOTIVE</a>
            <i class="fa-brands fa-instagram"></i><a href="">ELITE_AUTOMOTIVE</a>
        </div>
    </footer>
</body>

</html>