<?php
// accessing the sesion
session_start();
if (isset($_SESSION['userName'])) {
    $user_session = $_SESSION['userName'];
}
// echo '<strong style="color:white";>'.$user.'</strong>';
// checking the request method type
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sfname  = $_POST['sfname'];
    $smname  = $_POST['smname'];
    $slname  = $_POST['slname'];
    $smobile  = $_POST['smobile'];
    $semail  = $_POST['semail'];
    $sgender  = $_POST['sgender'];
    $ffname  = $_POST['ffname'];
    $mfname  = $_POST['mfname'];
    $fmobile  = $_POST['fmobile'];
    $mmobile  = $_POST['mmobile'];
    $pemail  = $_POST['pemail'];
    $address  = $_POST['address'];
    $dob  = $_POST['dob'];
    $religion  = $_POST['religion'];
    $cast  = $_POST['cast'];
    $country  = $_POST['country'];
    $state  = $_POST['state'];
    $city  = $_POST['city'];

    // conecting to the database and inserting the data into table
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "wd_db";
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn) {
        die("Sorry failed to connect:" . mysqli_connect_errno());
    } else {
        // echo "Database connection Sucessfull";
        $sql = "INSERT INTO `student_registration`(`sfname`, `smname`, `slname`, `smobile`, `semail`, `sgender`, `ffname`, `mfname`, `fmobile`, `mmobile`, `pemail`, `address`, `dob`, `religion`, `cast`, `country`, `state`, `city`, `username`) VALUES ('$sfname','$smname','$slname','$smobile','$semail','$sgender','$ffname','$mfname','$fmobile','$mmobile','$pemail','$address','$dob','$religion','$cast','$country','$state','$city', '$user_session')";
        $result = mysqli_query($conn, $sql);
        // echo "var_dump($request)";
        if ($result) {
            // $msg = $_GET['msg'];
            // header("Location:documents.php?msg=" . $msg);
            header("Location:documents.php");
        } else {
            $msg = "Failed to save you, Please try again later!";
            header("Location:registration.php?msg=" . $msg);
        }
        die();
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_registration.css">
    <title>Registration</title>
</head>

<body>
    <div class="register">Student Registration Form</div>
    <?php
    if (isset($_GET['msg'])) {
        echo $_GET['msg'];
    }
    ?>
    <div class="container Roboto">
        <form action="registration.php" method="post">

            <div class="row">
                <div class="col" id="col1">
                    <label for="fname">Student Firstname</label>
                    <br>
                    <input type="text" autocomplete="off" name="sfname" required>
                </div>
                <div class="col" id="col2">
                    <label for="mname">Student Middlename</label>
                    <br>
                    <input type="text" autocomplete="off" name="smname" required>
                </div>
                <div class="col" id="col3">
                    <label for="lname">Student Lastname</label>
                    <br>
                    <input type="text" autocomplete="off" name="slname" required>
                </div>
            </div>

            <div class="row">
                <div class="col" id="col4">
                    <label for="smobile">Student Mobile Number</label>
                    <br>
                    <input type="tel" name="smobile" autocomplete="off" maxlength="10" required>
                </div>
                <div class="col" id="col5">
                    <label for="semail">Student Email Address</label>
                    <br>
                    <input type="email" autocomplete="off" name="semail" required>
                </div>
                <div class="col" id="col6">
                    <label for="sgender">Gender</label>
                    <br>
                    <select name="sgender" id="sgender" required>
                        <option value="-select-" selected>-select-</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col" id="col7">
                    <label for="ffname">Father's Fullname</label>
                    <br>
                    <input type="text" autocomplete="off" name="ffname" required>
                </div>
                <div class="col" id="col8">
                    <label for="mfname">Mothers's Fullname</label>
                    <br>
                    <input type="text" autocomplete="off" name="mfname" required>
                </div>
            </div>
            <div class="row">
                <div class="col" id="col9">
                    <label for="fmobile">Father's Mobile Number</label>
                    <br>
                    <input type="tel" name="fmobile" maxlength="10" autocomplete="off" required>
                </div>
                <div class="col" id="col10">
                    <label for="mmobile">Mother's Mobile Number</label>
                    <br>
                    <input type="tel" name="mmobile" maxlength="10" autocomplete="off" required>
                </div>
                <div class="col" id="col11">
                    <label for="password">Parent Email Address</label>
                    <br>
                    <input type="email" name="pemail" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="address">Address</label><br>
                    <textarea name="address" id="address" cols="123" rows="4" placeholder="Enter Residence Address" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col" id="col12">
                    <label for="dob">Date of Birth</label>
                    <br>
                    <input type="date" name="dob" required>
                </div>
                <div class="col" id="col14">
                    <label for="religion">Religion</label>
                    <br>
                    <input type="text" name="religion" autocomplete="off" required>
                </div>
                <div class="col" id="col13">
                    <label for="cast">Cast</label>
                    <br>
                    <input type="text" name="cast" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="col" id="col15">
                    <label for="country">Country</label>
                    <br>
                    <input type="text" name="country" autocomplete="off" required>
                </div>
                <div class="col" id="col16">
                    <label for="state">State</label>
                    <br>
                    <input type="text" name="state" autocomplete="off" required>
                </div>
                <div class="col" id="col17">
                    <label for="city">City</label>
                    <br>
                    <input type="text" name="city" autocomplete="off" required>
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Submit and Upload Documents">
                <!-- <button onclick="window.location='documents.php'"></button> -->
            </div>
        </form>
    </div>
</body>

</html>