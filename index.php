<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style_signin.css">
  <title>Signin</title>
</head>

<body>
  <?php

  // checking the request method type
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['username'];
    $password = $_POST['password'];
    // starting the session
    session_start();
    $_SESSION['userName'] = $name;
    // ending session
    // session_start();
    // session_unset();
    // session_destroy();

  
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
      $sql = "SELECT * FROM `student_login`";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['username'] == $name && $row['password'] == $password) {

            // adding url parameter along with redirection
            // $msg = $name;
            // header("Location:registration.php?msg=" . $msg);
            header("Location:registration.php");
            // } elseif ($row['username'] == $name) {
            //   $text = "user exist";
            //   header("Location:index.php?msg=" . $text);
          } else {
            $msg = "user exist";
            header("Location:index.php?msg=" . $msg);
          }
        }
        die();
        exit();
      }
    }
  }
  ?>

  <?php
  // if (isset($_GET['text'])) {
  //   echo "<strong style='color:red;'>".$_GET['text']."</strong><span style='color:red;'>Please register yourself if you haven't.</span>";
  // }
  if (isset($_GET['msg'])) {
    echo "<strong style='color:red;'>Wrong Password!</strong><span style='color:red;'>Please register yourself if you haven't.</span>";
  }
  ?>


  <div class="signup">Student Sign in</div>
  <div class="container Roboto">
    <form action="index.php" method="post">
      <div class="box1">
        <i class="fa fa-user icon"></i>
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" autocomplete="off" class="input1" required>
        <!-- <input type="text" name="username" class="input1" placeholder="Enter Username" required> -->
        <br>
        <i class="fa fa-unlock" aria-hidden="true"></i>
        <label for="password">Password</label>
        <br>
        <input type="password" name="password" class="input2" required>
        <!-- <input type="text" name="password" class="input2" placeholder="Enter Password" required> -->
      </div>
      <div class="box2">
        <div>
          <input type="submit" value="sign in">
          <button><a href="signup.php">signup</a></button>
        </div>
        <p><a href="forgotpassword_mobile.php">forgot password?</a></p>
      </div>
    </form>
  </div>
</body>

</html>