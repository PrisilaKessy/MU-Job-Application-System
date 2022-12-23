<?php require_once('sidebar.php') ?>
    <div class="container-fluid">
        <div class="row justify-content-center">    
            <div class="col-md-6 col-xl-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php" 
                            class="btn mu-btn btn-sm">Back</a>
                        <h4 class="text-center mt-2">Application Form</h4>
                        <hr>
                        <form action="change_password.php" method="post">
                            <div class="row mt-2">
                                <div class="form-group mt-1 col-12">
                                    <label for="current_password" class="text-danger pb-2">
                                        Your Current Password *</label>
                                    <input type="password" name="current_password" id="next_date" 
                                    placeholder="Enter Current Password" class="form-control" >
                                </div>
                                <div class="form-group mt-1 col-12">
                                    <label for="new_password" class="text-danger pt-3 pb-2">
                                        Your New Password*</label>
                                    <input type="password" name="new_password" id="new_password" 
                                    placeholder="Enter New Password" class="form-control" >
                                </div>
                                <div class="form-group mt-1 col-12">
                                    <label for="confirm_password" class="text-danger pt-3 pb-2">
                                        Your Confirm Password*</label>
                                    <input type="password" name="confirm_password" id="confirm_password" 
                                    placeholder="Confirm Password" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="change_pass" 
                                    value="Save Changes" class="btn mu-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>