<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body class="body">
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-5 col-sm-12 col-xl-5 col-xs-12  border">
                <center><img src="img/mulogo.png" alt="" srcset="" width="20%" class="pt-3"></center>
            <h5 class="text-uppercase text-center text-dark  pt-4 font-weight-bold">MU - PAJA LOGIN</h5>
            <hr>
                <div class="">
                    <div class="card-body">
                        <?php require_once('includes/messages.php') ?>
                        <form action="login_action.php" method="post">
                            <div class="form-group mt-1">
                                <input type="text" name="username" id="username" 
                                    placeholder="username" class="form-control" >
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" name="password" id="password"    
                                placeholder="password" class="form-control" >
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" name="signin" id="signin" value="Sign in"
                                    class="btn mu-btn btn-block">
                            </div>
                            <div class="form-group mt-2">
                               <p class="text-center ml-4"><a href="" class="mu-text">Reset Password</a> if you forgot password</p> 
                            </div>
                            <div class="form-group mt-2">
                                <p class="text-center ml-3"><a href="registration.php" class="mu-text">Register</a> if you don't have an account</p>
                                <hr>
                                <a href="index.php"><h6 class="text-right">Back home</h6></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>