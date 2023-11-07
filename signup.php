<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_signup.css">
    <title>Signup</title>
</head>

<body>
    <?php
    $flag = 0;
    // checking the request method type
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name  = $_POST['username'];
        $password = $_POST['password'];


        // conecting to the database and inserting the data into table
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $database = "wd_db";
        $conn = mysqli_connect($servername, $username, $pass, $database);
        if (!$conn) {
            die("Sorry failed to connect:" . mysqli_connect_errno());
        } else {


            $sql = "SELECT * FROM `student_login`";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['username'] == $name) {
                        global $flag;
                        $flag = 1;
                        // adding url parameter along with redirection
                        $text = "Username unavailable! Try another one.";
                        header("Location:signup.php?text=" . $text);
                        die();
                    }
                }
            }
            if ($flag == 0) {
                // echo "Database connection Sucessfull";
                $sql = "INSERT INTO `student_login`(`username`, `password`, `status`, `dt`) VALUES ('$name','$password','y', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo "1 row inserted sucessfully !";
                    header("Location:index.php");
                } else {
                    // echo "failed to insert a row !";
                    $text = "Unable to record you! Please try again later.";
                    header("Location:signup.php?text=" . $text);
                }
            }
        }
    }


    ?>

    <?php
    if (isset($_GET['text'])) {
        echo $_GET['text'];
    }
    ?>
    <div class="signup">Signup</div>
    <div class="container Roboto">
        <form action="signup.php" method="post">
            <div class="box1">
                <i class="fa fa-user icon"></i>
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" autocomplete="off" class="input1" required>
                <p id="redundent_username_alert">

                </p>
                <!-- <input type="text" name="username" class="input1" placeholder="Enter Username" required> -->
                <br>
                <i class="fa fa-unlock" aria-hidden="true"></i>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" class="input2" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <!-- <input type="text" name="password" class="input2" placeholder="Enter Password" required> -->
                <br>
                <i class="fa fa-unlock" aria-hidden="true"></i>
                <label for="cpassword">Confirm Password</label>
                <br>
                <input type="password" name="cpassword" class="input2" id="confirm_pass" required onkeyup="validate_password()"><br>
                <span class="passwordAlert" id="wrong_pass_alert"></span>
                <!-- <input type="text" name="password" class="input2" placeholder="Enter Password" required> -->
            </div>
            <div class="box2">
                <input type="submit" value="signup" id="create">
            </div>
        </form>
    </div>
    <script>
        function validate_password() {
            var pass = document.getElementById('pass').value;
            var confirm_pass = document.getElementById('confirm_pass').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML = '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
    </script>
</body>

</html>