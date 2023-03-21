<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="./css/settings.css">
</head>
<body>
    <script src="./js/valid.js"></script>

    <?php
        include './heading.php';
        include './db.php';

        $uid = $_COOKIE['userid'];
        $uemail = $_COOKIE['email'];
        $upass = $_COOKIE['pass'];
    ?>

    <section id="cngPass">
        <form action="./password.php" method="GET">
            <input type="text" name="uid" id="uid" value="<?php echo $uid ?>" readonly required hidden>
            <input type="text" name="uemail" id="uemail" value="<?php echo $uemail ?>" readonly required hidden>

            <input type="text" name="oldPass" id="oldPass" placeholder="Enter Old Password" required>
            <input type="text" name="newPass" id="newPass" placeholder="New Password (Max 12 Characters)" required>
            <input type="text" name="renewPass" id="renewPass" placeholder="Re-type New Password" required>

            <input type="text" name="passOTP" id="passOTP" value="<?php echo rand(1000, 9999); ?>" hidden readonly required>

            <input type="submit" name="change" id="change" value="Change">
        </form>
    </section>
</body>
</html>