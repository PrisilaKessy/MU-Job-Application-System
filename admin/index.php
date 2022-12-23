<?php require_once('sidebar.php') ?>
<?php
    
    $application = mysqli_query($dbconnect, "SELECT * FROM application");
    $count_application = mysqli_num_rows($application);

    $post = mysqli_query($dbconnect, "SELECT * FROM post");
    $count_post = mysqli_num_rows($post);
    
    $user = mysqli_query($dbconnect, "SELECT * FROM user");
    $user_count = mysqli_num_rows($user);

    $applicant = mysqli_query($dbconnect, "SELECT * FROM applicant");
    $applicant_count = mysqli_num_rows($applicant);
?>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card george-bg">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-user text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $user_count ?> Users</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card edgar-bg">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-envelope text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $count_application ?> Applications</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card elina-bg">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-info-circle text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $count_post ?> Posts</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card fgl-bg">
                <div class="card-body">
                    <div class="quantinty">
                        <i class="fa fa-envelope-open text-white fa-3x"></i>
                        <h4 class="text-light"></h4>
                        <a> <span class="h5 text-white">
                            <?php echo $applicant_count ?> Applicants</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>