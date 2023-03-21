<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="./css/confirm.css">
</head>
<body>
    <?php
        include './heading.php';
        include './db.php';

        $uid = $_GET['uid'];
        $uemail = $_GET['uemail'];
        $oldPass = $_GET['oldPass'];
        $newPass = $_GET['newPass'];
        $renewPass = $_GET['renewPass'];
        $passOTP = $_GET['passOTP'];

        date_default_timezone_set('Asia/Dhaka');
        $dt = date('d-m-y h:i:s');

        $getUserQ = "SELECT upassword FROM user_info WHERE uid = $uid";
        $getUserQRun = $conn->query($getUserQ);
        $getUserQCount = mysqli_num_rows($getUserQRun);

        if($getUserQCount == 1){
            $userData = $getUserQRun->fetch_assoc();
            $uOldPass = $userData['upassword'];
        }
        else{
            ?>
            <script>
                alert("Something went wrong & session expired. Please login again.");
                window.location.href = "./login.php";
            </script>
            <?php
        }

        if($uOldPass == $oldPass){
            if($newPass == $renewPass){
                ?>
                <script src="https://smtpjs.com/v3/smtp.js"></script>
                <script>
                    Email.send({
                        Host : "smtp.elasticemail.com",
                        Username : "ptesting449@gmail.com",
                        Password : "C1C6D5559CEC473996481D9166B1AB82E00A",
                        To : '<?php echo $uemail; ?>',
                        From : "ptesting449@gmail.com",
                        Subject : "OTP for Password Changing",
                        Body : "<?php echo "Your OTP is: ".$passOTP; ?>"
                    });
                </script>
                <section id="otpPart">
                    <p>Chech your email for OTP</p>
                    <p><i>(Please check Spam/Promotions folder)</i></p>
                    <br>
                    <form action="" method="POST">
                        <input type="text" name="newOTP" id="newOTP" required>
                        <input type="submit" name="submit" id="submit" value="Submit">
                    </form>
                </section>
                <?php
                if(isset($_POST['submit'])){
                    $entOTP = $_POST['newOTP'];


                    if($entOTP == $passOTP){
                        $updQ = "UPDATE user_info SET upassword = '$newPass' WHERE uid = '$uid'";

                        if(mysqli_query($conn, $updQ)){
                            ?>
                            <script src="https://smtpjs.com/v3/smtp.js"></script>
                            <script>
                                Email.send({
                                    Host : "smtp.elasticemail.com",
                                    Username : "ptesting449@gmail.com",
                                    Password : "C1C6D5559CEC473996481D9166B1AB82E00A",
                                    To : '<?php echo $uemail; ?>',
                                    From : "ptesting449@gmail.com",
                                    Subject : "Password Changed",
                                    Body : "Your password has been changed at <?php echo $dt; ?>"
                                });
                            </script>
                            <script>
                                alert("Password changed successfully.");
                                window.location.replace("./");
                            </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                alert("Error occured.");
                                window.location.replace("./settings.php");
                            </script>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <script>
                            alert("Incorrect OTP. Please try again.");
                            window.location.href = "./settings.php";
                        </script>
                        <?php
                    }
                }
            }
            else{
                ?>
                <script>
                    alert("Your entered passwords don't match. Please try again.");
                    window.location.href = "./settings.php";
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("Wrong password. Please try again.");
                window.location.href = "./settings.php";
            </script>
            <?php
        }
    ?>
</body>
</html>