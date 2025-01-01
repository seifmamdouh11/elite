<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: signinform.php");
    exit();
}
$conn = mysqli_connect('localhost', 'root', '', 'elite_automotive');
$username = $_SESSION['name'];
$stmt = "SELECT * FROM `user` WHERE `Username`='$username'";
$result = mysqli_query($conn, $stmt);
if ($row = mysqli_fetch_array($result)) {
    $fname = $row["FirstName"];
    $lname = $row["LastName"];
    $email = $row["Email"];
    $address = $row["Address"];
}
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
        <link rel="stylesheet" href="profile.css">
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
        <section class="profile-container">
    <div class="profile-card">
        <div class="avatar">
        <i class="fa-solid fa-user img"></i>
        </div>
        <table class="profile-details">
            <tr>
                <td class="label">Full Name</td>
                <td class="value"><?php echo $fname . " " . $lname; ?></td>
            </tr>
            <tr>
                <td class="label">Username</td>
                <td class="value"><?php echo $_SESSION["name"]; ?></td>
            </tr>
            <tr>
                <td class="label">Address</td>
                <td class="value"><?php echo $address; ?></td>
            </tr>
        </table>
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