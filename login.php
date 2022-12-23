<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/mulogo.png">
    <title>Login-Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body class="body" style="margin-top:18px">
<div class="box-form">
    <div class="left">
        <div class="overlay">
            <img src="img/login3.jpg" height="604px" width="630px">
        </div>
    </div>
    <div class="right">
        <div>
        <img src="img/mulogo.png" height="100px" width="100px" class="mx-auto d-block">
        <h6 class="text-secondary text-center" style="margin-top: 8px;font-weight: bold; font-size: 20px">Login - (MU - PTA)</h6>
        </div>
        <div>
        <p>Don't have an account? <a href="registration.php">Creat Your Account</a> To access this site</p>
        </div>
        <?php require_once('includes/messages.php') ?>
        <form action="login_action.php" method="POST">
            <div class="inputs">
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
            </div>
            <br><br>
            <div class="remember-me--forget-password">
                <p class="text-center ml-4"><a href="" class="text-secondary">forgot password?</a></p>    
                <a href="index.php"><h6 class="text-right">Back home</h6></a>
            </div>
            <div style="margin-top: 18px;">
                <input type="submit" name="signin" value="Login" class="btn mu-btn btn-block">
            </div>
        </form>
    </div>
</div>
</body>
</html>