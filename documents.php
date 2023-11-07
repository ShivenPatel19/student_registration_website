<?php
// accessing the sesion
session_start();
if (isset($_SESSION['userName'])) {
    $user_session = $_SESSION['userName'];
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
    <link rel="stylesheet" href="css/style_documents.css">
    <title>Documents</title>
</head>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // conecting to the database and inserting the data into table
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "wd_db";
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn) {
        die("Sorry failed to connect:" . mysqli_connect_errno());
    } else {
        // echo var_dump($_FILES["ssc_marksheet"]); // prints -> Associative Array
        // print_r($_FILES["ssc_marksheet"]); // printing Array values
        $filename1 = $_FILES["ssc_marksheet"]["name"];
        $temp_name1 = $_FILES["ssc_marksheet"]["tmp_name"];

        // uploding file to the images folder (preparing image to upload)
        $folder1 = "images/" . $filename1;
        move_uploaded_file($temp_name1, $folder1); // image move to images folder
        // echo "<img src='$folder' alt='.' height='100px' width='100px'>"; // correct method
        // echo '<img src="$folder" alt="." height="100px" width="100px">' // this will not work

        $filename2 = $_FILES["hsc_marksheet"]["name"];
        $temp_name2 = $_FILES["hsc_marksheet"]["tmp_name"];
        $folder2 = "images/" . $filename2;
        move_uploaded_file($temp_name2, $folder2);

        $filename3 = $_FILES["aadhar_card"]["name"];
        $temp_name3 = $_FILES["aadhar_card"]["tmp_name"];
        $folder3 = "images/" . $filename3;
        move_uploaded_file($temp_name3, $folder3);

        $filename4 = $_FILES["pan_card"]["name"];
        $temp_name4 = $_FILES["pan_card"]["tmp_name"];
        $folder4 = "images/" . $filename4;
        move_uploaded_file($temp_name4, $folder4);

        $sql = "INSERT INTO `student_documents`(`ssc_marksheet`, `hsc_marksheet`, `aadhar_card`, `pan_card`) VALUES ('$folder1','$folder2','$folder3','$folder4')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // $msg = "Sucessfully Submited !";
            // $msg = $_GET['msg'];
            // header("Location:profile.php?msg=" . $msg);
            header("Location: profile.php");
        } else {
            $msg = "Failed to save you, Please try again later!";
            header("Location:documents.php");
        }
    }
}
?>

<body>
    <?php
    if (isset($_GET['msg'])) {
        echo $_GET['msg'];
    }
    ?>
    <div class="signup">Upload Student Documents</div>
    <div class="container Roboto">
        <form action="documents.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <label for="ssc_marksheet" id="col1">Photo</label>
                <input type="file" name="ssc_marksheet" id="col2" required>
                <br>
            </div>
            <div class="row">
                <label for="hsc_marksheet" id="col3">Aadhar card</label>
                <input type="file" name="hsc_marksheet" id="col4" required>
                <br>
            </div>
            <div class="row">
                <label for="aadhar_card" id="col5">Voter ID Card</label>
                <input type="file" name="aadhar_card" id="col6" required>
                <br>
            </div>
            <div class="row">
                <label for="pan_card" id="col7">Pan Card</label>
                <input type="file" name="pan_card" id="col8" required>
                <br>
            </div>
            <div class="box2">
                <div>
                    <input type="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

