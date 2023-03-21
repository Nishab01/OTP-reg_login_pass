<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging in...</title>
</head>
<body>
    <?php
        include './db.php';

        $email = $_GET['email'];
        $pass = $_GET['password'];

        date_default_timezone_set('Asia/Dhaka');
        $dt = date('d-m-y h:i:s');
        $checkQ = "SELECT * FROM user_info WHERE uemail = '$email' AND upassword = '$pass'";

        $runQ = $conn->query($checkQ);
        $count = mysqli_num_rows($runQ);

        if($count == 1){
            $uData = $runQ->fetch_assoc();
            $userid = $uData['uid'];

            setcookie("userid", $userid, time()+(86400*30), "/");
            setcookie("email", $email, time()+(86400*30), "/");
            setcookie("pass", $pass, time()+(86400*30), "/");
            ?>
            <script src="https://smtpjs.com/v3/smtp.js"></script>
            <script>
                Email.send({
                    Host : "smtp.elasticemail.com",
                    Username : "ptesting449@gmail.com",
                    Password : "C1C6D5559CEC473996481D9166B1AB82E00A",
                    To : '<?php echo $email; ?>',
                    From : "ptesting449@gmail.com",
                    Subject : "Login Notification",
                    Body : "New login detected at <?php echo $dt; ?>"
                });
            </script>
            <script>
                var userid = "<?php echo $userid; ?>";
                var email = "<?php echo $email; ?>";
                var pass = "<?php echo $pass; ?>";

                localStorage.setItem("userid", userid);
                localStorage.setItem("email", email);
                localStorage.setItem("pass", pass);
                window.location.href = "./";
            </script>
            <?php            
        }
        else{
            ?>
            <script>
                alert("Unauthorized Access");
                window.location.href = "./login.php";
            </script>
            <?php
        }
    ?>

</body>
</html>