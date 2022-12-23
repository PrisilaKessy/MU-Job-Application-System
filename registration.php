<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/mulogo.png">
    <title>Parttime Job | Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .g
        {
            font-family: "Open Sans", sans-serif;
        }
    </style>
</head>
<body class="body g">
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-9 col-sm-12 col-xl-9 col-xs-12 shadow">
                <center><h5 class="mu-text mb-0 font-weight-bold">REGISTRATION FORM</h5><img src="img/mulogo.png" alt="" srcset="" width="10%" class="pt-3"></center>
            <h5 class="text-uppercase text-center mu-text pt-4 font-weight-bold">Mzumbe University Parttime Job Application <br>(MU - PTA)</h5>
            <hr>
                    <div class="card-body">
                        <?php require_once('includes/messages.php') ?>
                        <form action="register_action.php" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="fname" id="fname"placeholder="First Name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="lname" id="lname" 
                                    placeholder="Last Name" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                   <select name="sex" id="sex" class="form-control">
                                       <option value="">--Select Sex--</option>
                                       <option value="F">Female</option>
                                       <option value="M">Male</option>
                                   </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" name="phone" id="phone" 
                                        placeholder="Your Phone Number" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" id="email" 
                                        placeholder="Your Email Address" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="address" id="address" 
                                        placeholder="Your Physical Address" class="form-control">
                                </div>       
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="next_of_kin" id="nok_name" placeholder="Next Of Kin Name" class="form-control">
                                </div> 
                                <div class="form-group col-md-6">
                                    <input type="number" name="next_of_kin_phone" id="nok_phone" placeholder="Next of Kin Phone Number" class="form-control">
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <select name="level" id="level" class="form-control">
                                                <option value="">--Select Education Level--</option>
                                                <option value="Certificate">Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Degree">Bachelor Degree</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="username" id="username" placeholder="Username" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="password" name="password" id="password" placeholder="password" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register" id="signin" value="Register" class="btn mu-btn btn-block">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>