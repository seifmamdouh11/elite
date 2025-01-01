<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: signinform.php");
    exit();
}
$username = $_SESSION["name"];
$conn = mysqli_connect('localhost', 'root', '', 'elite_automotive');
$stmt = "SELECT * FROM `reservation` WHERE `Username`='$username'";
$result = mysqli_query($conn, $stmt);


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- bootstarp -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- bootstarp -->
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
        <link rel="stylesheet" href="success.css">
        <meta charset="UTF-8">
        <title>Profile</title>
    </head>

    <body>
        <header>
            <div class="logo">
                <a href="">ELITE AUTOMOTIVE</a>
            </div>
            <nav>
                <a href="homepage.php">HOME</a>
                <a href="aboutus.php">ABOUT US</a>
                <a href="success.php">RESERVATIONS</a>
                <a href="contact.php">CONTACT US</a>
            </nav>
            <div class="rheader">
                <a href="https://maps.app.goo.gl/HUZx5m8ix8R1zwvWA" target="_blank" class="loc"><i class="fa-solid fa-location-dot"></i></a>
                <a href="Profile.php" class="button1"><i class="fa-solid fa-user"></i> PROFILE</a>
                <a href="logout.php" class="button1"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
            </div>
        </header>
        <section class="homesec">
            <div class="container1">
                <h2>Welcome <?php echo $_SESSION['name']; ?></h2>
                <p>TRACK YOUR RESERVATIONS.</p>
                <table class="table-bordered">
                    <?php
                    if (mysqli_num_rows($result) == 0) { ?>
                        
                        <h1>"It looks like you don't have any reservations at the moment. <br> Please feel free to make a new one when you're ready."</h1>
                        <a href="reservationform.php" class="button">RESERVE NOW</a>
                    <?php } else { ?>
                        <tr class="heder">
                            <td id="label">RESERVATION_ID</td>
                            <td id="label">REQUEST_DATE</td>
                            <td id="label">PREFERRED_DATE</td>
                            <td id="label">SERVICE</td>
                            <td id="label" colspan="4">CAR INFORMATION</td>
                        </tr>
                        <?php


                        while ($row = mysqli_fetch_array($result)) {
                            $RequestDate = date("d-m-Y", strtotime($row['Request_Date']));
                            $PreferredDate = date("d-m-Y", strtotime($row['Preferred_Date']));
                        ?>
                            <tr>
                                <td id="result"><?php echo $row['ID']; ?></td>
                                <td id="result"><?php echo $RequestDate; ?></td>
                                <td id="result"><?php echo $PreferredDate; ?></td>
                                <td id="result"><?php echo $row['ServiceName']; ?></td>
                                <td id="result"><?php echo $row['Car_Make']; ?></td>
                                <td id="result"><?php echo $row['Car_Year']; ?></td>
                                <td id="result"><?php echo $row['Car_Color']; ?></td>
                                <td id="result"><?php echo $row['Car_Model']; ?></td>
                            </tr>
                           
                    <?php  }?>
                </table> 
                       <a href="reservationform.php" class="button">ADD NEW RESERVATION</a><?php
                    } ?>

                
             
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
    <?php

    ?>
</body>

</html>