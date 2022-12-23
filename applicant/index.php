<?php 
    require_once('sidebar.php');
    include('check_application.php');
    //feedback
    $select_feedback = mysqli_query($dbconnect, "SELECT * 
    FROM feedback 
    WHERE `application_id` = $application_number");
    if($count_application >= 1) {
        $fetch_feedback = mysqli_fetch_array($select_feedback);
        $count_feedback = mysqli_num_rows($select_feedback);
    }

    $user = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
    $user_data = mysqli_fetch_assoc($user);
    $dept = mysqli_query($dbconnect, "SELECT * FROM department");
    $dept_data = mysqli_fetch_array($dept);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-light">
                <?php if($count_application >= 1): ?>
                    <?php if($count_feedback == 0 ): ?>
                        <p class="mu-color text-center px-2 pt-2"><b>Your application is on progress please wait for results</b></p>
                    <?php else: ?>
                        <?php if($fetch_feedback['status'] == "selected"): ?>
                            <p class="mu-color px-2 pt-2">
                                <i class="fa fa-info-circle"></i> Congratulation...! <b><?php echo "$user_data[fname] $user_data[lname]" ?></b>
                                Your have being selected for the interview at our MU Organisation in the department of <b><?php echo "$dept_data[deptName]" ?>.</b> </p>
                            
                            <div class="px-2">
                            <h5 class="ml-2">Requirements</h5>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check-circle mu-color px-2"></i>Your Original Certificates</li>
                                <li><i class="fa fa-check-circle mu-color px-2"></i>Your National Identification</li>
                            </ul>
                        </div>

                        <!-- my trial -->
                        <?php else: ?>
                            <?php if($fetch_feedback['status'] == "not selected"): ?>
                                <p class="mu-color px-2 pt-2">
                                <i class="fa fa-info-circle"></i> 
                                Sorry...! <b><?php echo "$user_data[fname] $user_data[lname]" ?></b>
                                Your have not being selected for the partitime job into our organisation, try other time.</p>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>
                <?php else: ?>
                    <?php 
                        echo "<script>window.location='units.php'</script>" 
                    ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>