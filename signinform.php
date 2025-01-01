<!DOCTYPE html>
<?php
session_start();

// If the user is already logged in, redirect them to the homepage
if (isset($_SESSION['name'])) {
    header("Location: homepage.php");
    exit();  // Make sure the script stops here after redirection
}

?>

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
    <link rel="stylesheet" href="signin.css">
    <meta charset="UTF-8">
    <title>Sign In</title>
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
    <section class="signinsec">
        <h2>Welcome Back</h2>
        <p>Please log in to your account.</p>
        <form action="" method="post">
            <table>
                <?php

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $conn = mysqli_connect("localhost", "root", "", "elite_automotive");
                    $stmt = "SELECT * From `user` where `Username`= '$username' and `Password`='$password'";
                    $result = mysqli_query($conn, $stmt);

                    if ($result && mysqli_num_rows($result) > 0) {
                        if ($row = mysqli_fetch_assoc($result)) {
                            session_start();
                            $_SESSION['name'] = $row['Username'];
                            $_SESSION['fname'] = $row['FirstName'];
                            $_SESSION['lname'] = $row['LastName'];
                            $_SESSION['address'] = $row['Address'];
                            $_SESSION['mail'] = $row['Email'];
                            header("Location: homepage.php");
                            exit();
                        } else {
                            echo "<tr><td colspan='2'><div class='alert alert-danger'>INVALID USERNAME/PASSWORD</div></td></tr>";;
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Invalid Username/Password</div>";
                    }
                }
                ?>
                <tr>
                    <td colspan="2"><input type="text" name="username" id="username" placeholder="Username" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="password" id="password" placeholder="Password"
                            required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="submit-button">Sign In</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="signupform.php" id="create-account">Don't have an account? Sign Up</a>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <footer style="background-color:#1e201e;">
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