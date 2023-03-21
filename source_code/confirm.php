<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/confirm.css">
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $enteredOTP = $_POST['inpOTP'];
            if($enteredOTP == $otp){
                $regQ = "INSERT INTO user_info(uname, uemail, upassword, udob, usecurity) VALUES('$name', '$email', '$pass', '$dob', '$security')";
                $regQRun = $conn->query($regQ);
                ?>
                <script>
                    alert("Registration successful. Pleae login.");
                    window.location.href = "./login.php";
                </script>
                <?php               
            }
            else{
                ?>
                <script>
                    alert("Incorrect OTP. Please register again.");
                    window.location.href = "./register.php";
                </script>
                <?php
            }
        }
    ?>
    <?php
        include './heading.php';
        include './db.php';

        $name = $_GET['inpName'];
        $email = $_GET['inpEmail'];
        $dob = $_GET['inpDOB'];
        $pass = $_GET['inpPassword'];
        $security = $_GET['inpSec'];
        $otp = $_GET['inpOTP'];

        $chkDupQ = "SELECT * FROM user_info WHERE uemail = '$email'";
        $chkDupQRun = $conn->query($chkDupQ);
        $chkDupCount = mysqli_num_rows($chkDupQRun);

        if($chkDupCount == 0){
            ?>
            <script src="https://smtpjs.com/v3/smtp.js"></script>
            <script>
                Email.send({
                    Host : "smtp.elasticemail.com",
                    Username : "ptesting449@gmail.com",
                    Password : "C1C6D5559CEC473996481D9166B1AB82E00A",
                    To : '<?php echo $email; ?>',
                    From : "ptesting449@gmail.com",
                    Subject : "Confirmation OTP",
                    Body : "<?php echo "Your confimation OTP is: ".$otp; ?>"
                });
            </script>
            <section id="otpPart">
                <p>We've sent an OTP to your email. Please enter the OTP below to confirm your registration.</p>
                <p><i>(Please also check your Spam/promotions folder.)</i></p>
                <p>It may take 2 ot 3 minutes. Pleae wait a while.</p>
                <br>
                <form action="" method="POST">
                    <input type="text" name="inpOTP" id="inpOTP" required>
                    <input type="submit" name="submit" id="submit" value="Submit">
                </form>
            </section>
            <?php
        }
        else{
            ?>
            <script>
                alert("This email is already being registered. Plaese try with another email.");
                window.location.href = "./register.php";
            </script>
            <?php
        }
    ?>
</body>
</html>