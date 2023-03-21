<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/signup.css">
</head>
<body>
    <?php
        include './heading.php';
        include './db.php';
    ?>
    <section id="reg">
        <div class="left">
            <img src="./img/signup_pic.jpg">
        </div>
        <div class="right">
            <form action="./confirm.php" method="GET">
                <input type="text" name="inpName" id="inpName" placeholder="Name" required>
                <input type="text" name="inpEmail" id="inpEmail" placeholder="Email" required>
                <input type="date" name="inpDOB" id="inpDOB" required>
                <input type="text" name="inpPassword" id="inpPassword" placeholder="Password (12 characters)" required>
                <input type="text" name="inpSec" id="inpSec" placeholder="Security Code (6 characters)" required>
                <input type="text" name="inpOTP" id="inpOTP" placeholder="OTP" value="<?php echo rand(100000, 999999); ?>" hidden readonly required>

                <input type="submit" name="signup" id="singup" value="Register">
            </form>
        </div>
    </section>
</body>
</html>