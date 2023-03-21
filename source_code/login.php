<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <?php include './heading.php'; ?>

    <br><br><br>
    <section id="login">
        <form action="./check.php" method="GET">
            <input type="text" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <input type="submit" name="login" id="login" value="Login">
        </form>
    </section>
</body>
</html>