<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_forgotpassword_email.css">
    <title>Forgot Password</title>
</head>

<body>
    <div class="signup">Forgot Password</div>
    <div class="container Roboto">
        <form action="index.php" method="post">
            <div class="box1">
                <!-- <i class="fa fa-user icon"></i> -->
                <img src="assets/envelope-solid.svg" alt="!">
                <label for="username">Email</label>
                <br>
                <input type="email" name="username" class="input1" required>
                <!-- <input type="text" name="username" class="input1" placeholder="Enter Username" required> -->
                <br>
                <img src="assets/check-solid.svg" alt="!">
                <label for="password">OTP</label>
                <br>
                <div class="container2">
                    <div id="inputs" class="inputs">
                        <input class="input" type="text" inputmode="numeric" maxlength="1" />
                        <input class="input" type="text" inputmode="numeric" maxlength="1" />
                        <input class="input" type="text" inputmode="numeric" maxlength="1" />
                        <input class="input" type="text" inputmode="numeric" maxlength="1" />
                    </div>
                </div>
                <script src="script.js"></script>
            </div>
            <div class="box2">
                <input type="submit" value="verify">
                <p><a href="forgotpassword_mobile.php">try using mobile number?</a></p>
            </div>
        </form>
    </div>
    <script>
        // script.js
        const inputs = document.getElementById("inputs");

        inputs.addEventListener("input", function(e) {
            const target = e.target;
            const val = target.value;

            if (isNaN(val)) {
                target.value = "";
                return;
            }

            if (val != "") {
                const next = target.nextElementSibling;
                if (next) {
                    next.focus();
                }
            }
        });

        inputs.addEventListener("keyup", function(e) {
            const target = e.target;
            const key = e.key.toLowerCase();

            if (key == "backspace" || key == "delete") {
                target.value = "";
                const prev = target.previousElementSibling;
                if (prev) {
                    prev.focus();
                }
                return;
            }
        });
    </script>
</body>

</html>