<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'elite_automotive');
if (!isset($_SESSION['mail']) || !isset($_SESSION['name'])) {
    header("Location: signinform.php");
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
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="reserve.css">
    <meta charset="UTF-8">
    <title>Reservation</title>
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
    <section class="reservesec">
        <h2>RESERVE NOW</h2>
        <p>Please fill the form.</p>
        <form action="" method="post">
            <table class="table table-borderless">
                <?php
                if (isset($_POST['submit'])) {
                    $phone = $_POST['phone'];
                    $service = $_POST['service_type'];
                    $vin = $_POST['vin'];
                    $make = $_POST['make'];
                    $model = $_POST['model'];
                    $year = $_POST['year'];
                    $color = $_POST['color'];
                    $reserveDate = date('Y-m-d');
                    $preferedDate = $_POST['preferedDate'];
                    $errors = array();
                    $oneMonthAhead = date('Y-m-d', strtotime('+1 month'));

                    if (empty($phone) || empty($service) || empty($make) || empty($model) || empty($year) || empty($color)) {
                        array_push($errors, 'All the fields are required');
                    }
                    if (strlen($phone) != 11) {
                        array_push($errors, 'Phone must be 11 characters');
                    }
                    if ($year > 2024 || strlen($year) > 4) {
                        array_push($errors, 'Incorrect Car Year');
                    }
                    if (empty($preferedDate)) {
                        $errors[] = "Preferred service date is required.";
                    } else {
                        if ($preferedDate <= $reserveDate) {
                            $errors[] = "Preferred service date must be greater than today's date.";
                        }
                    }
                    if ($preferedDate > $oneMonthAhead) {
                        $errors[] = "Preferred service date cannot be more than one month from today.";
                    }

                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<tr><td colspan='4'><div class='alert alert-danger'>$error</div></td></tr>";
                        }
                    } else {
                        $stmt1 = "INSERT INTO `reservation` (`Username`,`Whatsapp`,`Request_Date`,`Preferred_Date`,`ServiceName`,`VIN`,`Car_Make`,`Car_Year`,`Car_Color`,`Car_Model`)
                        Values ('" . $_SESSION['name'] . "','$phone','$reserveDate','$preferedDate','$service','$vin','$make','$year','$color','$model')";
                        $result1 = mysqli_query($conn, $stmt1);
                        if ($result1) {
                            header("Location:success.php");
                        }
                    }
                }
                ?>

                <tr>
                    <th colspan="4" class="text-center bg-dark text-white">Personal Details</th>
                </tr>

                <!-- Personal Details -->
                <tbody>
                    <tr>
                        <td id="label">First Name</td>
                        <td id="label">Last Name</td>
                        <td colspan="2" id="label">Username</td>
                    </tr>
                    <tr>
                        <td><input type='text' name='fname' id='fname' placeholder='First Name' value="<?php echo $_SESSION['fname']; ?>" disabled></td>
                        <td><input type='text' name='lname' id='fname' placeholder='Last Name' value="<?php echo $_SESSION['lname']; ?>" disabled></td>
                        <td colspan="2"><input type='text' name='username' id='fname' placeholder='Username' value="<?php echo $_SESSION['name']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td colspan="2" id="label">Email</td>
                        <td colspan="2" id="label">Whatsapp Number</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type='email' name='email' id='fname' value="<?php echo $_SESSION['mail']; ?>" disabled></td>
                        <td colspan="2"><input type='text' name='phone' id='phone' placeholder="(010xxxxxxxx)"></td>
                    </tr>
                    <tr>
                        <td colspan="4" id="label">Address</td>
                    </tr>
                    <tr>
                        <td colspan='4'><input type='text' name='address' id='fname' value="<?php echo $_SESSION['address']; ?>" disabled></td>
                    </tr>
                </tbody>
                <!-- Reservation Details -->

                <tr>
                    <th colspan="4" class="text-center bg-dark text-white">Reservation Details</th>
                </tr>

                <tr>
                    <td id="label">Request Date</td>
                    <td colspan="3" id="label">Preferred Service Date</td>
                </tr>
                <tr>
                    <td><input type='text' name='reqDate' id='phone' value="<?php echo date('d-m-Y'); ?>" disabled></td>
                    <td colspan="2"><input type='date' name='preferedDate' id='phone' placeholder="dd-mm-yyyy"></td>
                </tr>
                <tr>
                    <td id="label" colspan="2">Vehicle Identification Number</td>
                    <td id="label">Choose Service</td>
                </tr>
                <tr>
                    <td colspan='2'><input type='text' name='vin' id='phone' placeholder="Vehicle Identification Number"></td>
                    <td align="right">
                        <select name="service_type" id="ServiceName" required>
                            <?php
                            $stmt = "SELECT `ServiceName` FROM `services`";
                            $result = mysqli_query($conn, $stmt);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['ServiceName'] . "'>" . $row['ServiceName'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>

                <tr>
                    <td id="label">Car Make</td>
                    <td id="label">Car Year</td>
                    <td id="label">Car Color</td>

                </tr>

                <tr>
                    <td><input type='text' name='make' id='phone' placeholder="ex: BMW,AUDI,..."></td>
                    <td><input type='text' name='year' id='phone' placeholder="ex: 2015,2020,..."></td>
                    <td><input type='text' name='color' id='phone' placeholder="ex: Red,Blue,..."></td>

                </tr>

                <tr>
                    <td id="label" colspan="3">Car Model</td>
                </tr>
                <td colspan="3"><input type='text' name='model' id='phone' placeholder="ex: BMW x5,AUDI A7,..."></td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <button type='submit' class='submit-button text-center' name="submit">Submit Reservation</button>
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