<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_profile.css">
    <title>Profile</title>
</head>

<body>
    <?php
    // accessing the sesion
    $user_session;
    session_start();
    if (isset($_SESSION['userName'])) {
        global $user_session;
        $user_session = $_SESSION['userName'];
    }
    // checking the request method type
    // conecting to the database and inserting the data into table
    $sfname;
    $smname;
    $slname;
    $smobile;
    $semail;
    $sgender;
    $ffname;
    $mfname;
    $fmobile;
    $mmobile;
    $pemail;
    $address;
    $dob;
    $religion;
    $cast;
    $country;
    $state;
    $city;

    $row;

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "wd_db";;
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn) {
        die("Sorry failed to connect:" . mysqli_connect_errno());
    } else {
        // echo "Database connection Sucessfull";
        // $sql = "SELECT * FROM `student_registration` WHERE username = '$user_session' ";
        $sql = "SELECT * FROM `student_registration` WHERE `username` = '$user_session' ";
        $result = mysqli_query($conn, $sql);
        // echo var_dump($result);
        $num = mysqli_num_rows($result);
        // echo var_dump($num);
        if ($num > 0) {
            global $row;
            $row = mysqli_fetch_assoc($result);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                global $sfname;
                $sfname  = $_POST['sfname'];
                global $smname;
                $smname  = $_POST['smname'];
                global $slname;
                $slname  = $_POST['slname'];
                global $smobile;
                $smobile  = $_POST['smobile'];
                global $semail;
                $semail  = $_POST['semail'];
                global $sgender;
                $sgender  = $_POST['sgender'];
                global $ffname;
                $ffname  = $_POST['ffname'];
                global $mfname;
                $mfname  = $_POST['mfname'];
                global $fmobile;
                $fmobile  = $_POST['fmobile'];
                global $mmobile;
                $mmobile  = $_POST['mmobile'];
                global $pemail;
                $pemail  = $_POST['pemail'];
                global $address;
                $address  = $_POST['address'];
                global $dob;
                $dob  = $_POST['dob'];
                global $religion;
                $religion  = $_POST['religion'];
                global $cast;
                $cast  = $_POST['cast'];
                global $country;
                $country  = $_POST['country'];
                global $state;
                $state  = $_POST['state'];
                global $city;
                $city  = $_POST['city'];
                // Trim the user input
                $trimmedInput_sfname = trim($sfname);
                // Check if the trimmed input is empty
                if (empty($trimmedInput_sfname)) {
                    global $sfname;
                    $sfname  = $row['sfname'];
                }

                $trimmedInput_smname = trim($smname);
                if (empty($trimmedInput_smname)) {
                    global $smname;
                    $smname = $row['smname'];
                }

                $trimmedInput_slname = trim($slname);
                if (empty($trimmedInput_slname)) {
                    global $slname;
                    $slname = $row['slname'];
                }

                $trimmedInput_smobile = trim($smobile);
                if (empty($trimmedInput_smobile)) {
                    global $smobile;
                    $smobile = $row['smobile'];
                }

                $trimmedInput_semail = trim($semail);
                if (empty($trimmedInput_semail)) {
                    global $semail;
                    $semail = $row['semail'];
                }

                $trimmedInput_sgender = trim($sgender);
                if (empty($trimmedInput_sgender)) {
                    global  $sgender;
                    $sgender = $row['sgender'];
                }

                $trimmedInput_ffname = trim($ffname);
                if (empty($trimmedInput_ffname)) {
                    global $ffname;
                    $ffname = $row['ffname'];
                }

                $trimmedInput_mfname = trim($mfname);
                if (empty($trimmedInput_mfname)) {
                    global $mfname;
                    $mfname = $row['mfname'];
                }

                $trimmedInput_fmobile = trim($fmobile);
                if (empty($trimmedInput_fmobile)) {
                    global $fmobile;
                    $fmobile = $row['fmobile'];
                }

                $trimmedInput_mmobile = trim($mmobile);
                if (empty($trimmedInput_mmobile)) {
                    global $mmobile;
                    $mmobile = $row['mmobile'];
                }

                $trimmedInput_pemail = trim($pemail);
                if (empty($trimmedInput_pemail)) {
                    global $pemail;
                    $pemail = $row['pemail'];
                }

                $trimmedInput_address = trim($address);
                if (empty($trimmedInput_address)) {
                    global $address;
                    $address = $row['address'];
                }

                $trimmedInput_dob = trim($dob);
                if (empty($trimmedInput_dob)) {
                    global $dob;
                    $dob = $row['dob'];
                }

                $trimmedInput_religion = trim($religion);
                if (empty($trimmedInput_religion)) {
                    global $religion;
                    $religion = $row['religion'];
                }

                $trimmedInput_cast = trim($cast);
                if (empty($trimmedInput_cast)) {
                    global $cast;
                    $cast = $row['cast'];
                }

                $trimmedInput_country = trim($country);
                if (empty($trimmedInput_country)) {
                    global $country;
                    $country = $row['country'];
                }

                $trimmedInput_state = trim($state);
                if (empty($trimmedInput_state)) {
                    global $state;
                    $state = $row['state'];
                }

                $trimmedInput_city = trim($city);
                if (empty($trimmedInput_city)) {
                    global $city;
                    $city = $row['city'];
                }

                $sql = "UPDATE `student_registration` SET `sfname`='$sfname',`smname`='$smname',`slname`='$slname',`smobile`='$smobile',`semail`='$semail',`sgender`='$sgender',`ffname`='$ffname',`mfname`='$mfname',`fmobile`='$fmobile',`mmobile`='$mmobile',`pemail`='$pemail',`address`='$address',`dob`='$dob',`religion`='$religion',`cast`='$cast',`country`='$country',`state`='$state',`city`='$city' WHERE `username`='$user_session'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $msg = "Profile Update Sucessfully !";
                    header("Location:profile.php?msg=" . $msg);
                    // header("Location:profile.php");
                } else {
                    $msg = "Failed to save you, Please try again later!";
                    header("Location:profile.php?msg=" . $msg);
                }
            }
        }
    }
    ?>
    </table>
    <?php
    ?>

    <?php
    if (isset($_GET['msg'])) {
        echo '<strong style="color:green;">' . $_GET['msg'] . '</strong>';
    }
    ?>
    <div class="register">Student Profile</div>
    <div class="container Roboto">
        <form action="profile.php" method="post">

            <div class="row">
                <div class="col" id="col1">
                    <label for="fname">Student Firstname</label>
                    <br>
                    <input type="text" name="sfname" placeholder="<?php echo $row['sfname'] ?>">
                </div>
                <div class="col" id="col2">
                    <label for="mname">Student Middlename</label>
                    <br>
                    <input type="text" name="smname" placeholder="<?php echo $row['smname'] ?>">
                </div>
                <div class="col" id="col3">
                    <label for="lname">Student Lastname</label>
                    <br>
                    <input type="text" name="slname" placeholder="<?php echo $row['slname'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col" id="col4">
                    <label for="smobile">Student Mobile Number</label>
                    <br>
                    <input type="tel" name="smobile" maxlength="10" placeholder="<?php echo $row['smobile'] ?>">
                </div>
                <div class="col" id="col5">
                    <label for="semail">Student Email Address</label>
                    <br>
                    <input type="email" name="semail" placeholder="<?php echo $row['semail'] ?>">
                </div>
                <div class="col" id="col6">
                    <label for="sgender">Gender</label>
                    <br>
                    <input type="text" name="sgender" id="sgender" placeholder="<?php echo $row['sgender'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col" id="col7">
                    <label for="ffname">Father's Fullname</label>
                    <br>
                    <input type="text" name="ffname" placeholder="<?php echo $row['ffname'] ?>">
                </div>
                <div class="col" id="col8">
                    <label for="mfname">Mothers's Fullname</label>
                    <br>
                    <input type="text" name="mfname" placeholder="<?php echo $row['mfname'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col" id="col9">
                    <label for="fmobile">Father's Mobile Number</label>
                    <br>
                    <input type="tel" name="fmobile" maxlength="10" placeholder="<?php echo $row['fmobile'] ?>">
                </div>
                <div class="col" id="col10">
                    <label for="mmobile">Mother's Mobile Number</label>
                    <br>
                    <input type="tel" name="mmobile" maxlength="10" placeholder="<?php echo $row['mmobile'] ?>">
                </div>
                <div class="col" id="col11">
                    <label for="password">Parent Email Address</label>
                    <br>
                    <input type="email" name="pemail" placeholder="<?php echo $row['pemail'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="address">Address</label><br>
                    <textarea name="address" id="address" cols="123" rows="4" placeholder="<?php echo $row['address'] ?>"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col" id="col12">
                    <label for="dob">Date of Birth</label>
                    <br>
                    <input type="text" name="dob" placeholder="<?php echo $row['dob'] ?>">
                </div>
                <div class="col" id="col14">
                    <label for="religion">Religion</label>
                    <br>
                    <input type="text" name="religion" placeholder="<?php echo $row['religion'] ?>">
                </div>
                <div class="col" id="col13">
                    <label for="cast">Cast</label>
                    <br>
                    <input type="text" name="cast" placeholder="<?php echo $row['cast'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col" id="col15">
                    <label for="country">Country</label>
                    <br>
                    <input type="text" name="country" placeholder="<?php echo $row['country'] ?>">
                </div>
                <div class="col" id="col16">
                    <label for="state">State</label>
                    <br>
                    <input type="text" name="state" placeholder="<?php echo $row['state'] ?>">
                </div>
                <div class="col" id="col17">
                    <label for="city">City</label>
                    <br>
                    <input type="text" name="city" placeholder="<?php echo $row['city'] ?>">
                </div>
            </div>
            <div class="box2">
                <input type="submit" value="Edit Profile">
                <!-- <button onclick="window.location='documents.php'"></button> -->
            </div>
        </form>
    </div>
</body>

</html>