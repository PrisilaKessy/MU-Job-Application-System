<?php require_once('sidebar.php') ?>
<?php
    $applicant_list = mysqli_query($dbconnect, "SELECT user.*, applicant.* 
    FROM user, applicant 
    WHERE user.user_id = applicant.user_id");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="form">
                        <h4 class="text-center mu-text">NEW USER</h4>
                        <hr>
                        <form action="user_add_action.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="fname" id="fname" 
                                        placeholder="First Name" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="lname" id="lname" 
                                    placeholder="Last Name" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <select name="sex" id="" class="form-control">
                                        <option value="">--select sex--</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" name="phone" id="phone" 
                                        placeholder="Your Phone Number" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" id="email" 
                                        placeholder="Your Email Address" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="username" id="username" 
                                            placeholder="Username" class="form-control" >
                                </div>      
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="password" name="password" id="password" 
                                            placeholder="password" class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" name="cpassword" id="cpassword" 
                                                placeholder="Confirm Password" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="is_admin"><b>Admin Privallage</b></label><br>
                                            <input type="radio" name="is_admin" class="radio" value="1"> Yes Is Admin<br>
                                            <input type="radio" name="is_admin" class="radio" value="0"> Not Admin
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="register" id="signin" value="Register"
                                    class="btn mu-btn btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>