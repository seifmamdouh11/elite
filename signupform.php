<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (isset($_SESSION["name"])) {
    header("Location: homepage.php");
    exit();
}
?>

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
    <link rel="stylesheet" href="signup.css">
    <meta charset="UTF-8">
    <title>Sign up</title>
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
    <section class="signupsec">
        <h2>Create Your Account</h2>
        <p>Please fill in the details below to create your account and join our community.</p>
        </form>
        <form action="" method="post">

            <table>
                <?php
                if (isset($_POST["submit"])) {
                    $fname = $_POST["fname"];
                    $lname =  $_POST["lname"];
                    $username = $_POST["username"];
                    $address = $_POST["address"];
                    $email = $_POST["email"];
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];
                    $errors = array();

                    $conn = mysqli_connect("localhost", "root", "", "elite_automotive");

                    if (empty($fname) or empty($lname) or empty($username) or empty($address) or empty($email) or empty($pass1) or empty($pass2)) {
                        array_push($errors, "All fields are required");
                    }
                    $stmt = "SELECT * FROM `user` WHERE `Email`='$email' OR `Username`='$username'";
                    $result = mysqli_query($conn, $stmt);
                    if (mysqli_num_rows($result) > 0) {
                        array_push($errors, "Email/Username Already Registered");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Invalid Email");
                    }
                    if (strlen($pass1) < 6) {
                        array_push($errors, "Password must contain 6 characters minimum");
                    }
                    if ($pass1 != $pass2) {
                        array_push($errors, "Password do not match");
                    }
                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<tr><td colspan='2'><div class='alert alert-danger'>$error</div></td></tr>";
                        }
                    } else {
                        $stmt1 = "INSERT INTO `user` (`FirstName`, `LastName`, `Username`, `Email`, `Address`, `Password`) 
VALUES ('$fname','$lname','$username','$email','$address','$pass1')";
                        $result1 = mysqli_query($conn, $stmt1);
                        if ($result1) {
                            $_SESSION["name"] = $username;
                            $_SESSION["fname"] = $fname;
                            $_SESSION["lname"] = $lname;
                            $_SESSION["mail"] = $email;
                            $_SESSION["address"] = $address;
                            header("location:homepage.php");
                            exit();
                        }
                    }
                }
                ?>

                <tr>
                    <td><input type='text' name='fname' id='name' placeholder="First Name"></td>
                    <td><input type='text' name='lname' id='name' placeholder="Last Name"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="username" id="username" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="email" id="username" placeholder="E-mail"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="address" id="username" placeholder="Address"></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass1" id="password" placeholder="Password"></td>
                    <td><input type="password" name="pass2" id="password" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <input type="checkbox" name="terms" required> I agree to the <a href="#">Terms and
                                Conditions</a>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit" class="submit-button">Sign Up</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="signinform.php" id="already">already have an account?</a>
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