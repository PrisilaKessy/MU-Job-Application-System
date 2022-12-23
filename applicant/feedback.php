<?php require_once('sidebar.php') ?>
<?php if(isset($_SESSION['pregnant'])):?>
    <?php header('location:preg_clinic.php')?>
<?php endif ?>
<?php
    $select_applicant = mysqli_query($dbconnect, "SELECT applicant_num 
    FROM applicant 
    WHERE user_id=$user_id");
    $fetch_applicant  = mysqli_fetch_assoc($select_applicant);
    $applicant        = $fetch_applicant['applicant_num'];

    $application_query = mysqli_query($dbconnect, "SELECT application.*, applicant.*, department.dept_id
    FROM application, applicant, department
    WHERE applicant.applicant_number = application.applicant
    AND application.department = department.dept_id
    AND applicant.applicant_number = $applicant");

    $fetch_application = mysqli_fetch_array($application_query);
    $count_application = mysqli_num_rows($application_query);

    //feedback
    $application_number = $fetch_application['application_number'];
    $select_feedback = mysqli_query($dbconnect, "SELECT * 
    FROM feedback 
    WHERE `application` = $application_number");
    if($count_application == 1) {
        $fetch_feedback = mysqli_fetch_array($select_feedback);
        $count_feedback = mysqli_num_rows($select_feedback);
    }

    $user = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
    $user_data = mysqli_fetch_assoc($user);

    $applicant = mysqli_query($dbconnect, "SELECT * FROM applicant WHERE user_id = '$user_id'");
    $applicant_data = mysqli_fetch_assoc($applicant);

    $dept = mysqli_query($dbconnect, "SELECT * FROM department");
    $dept_data = mysqli_fetch_assoc($dept);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-light">
                <?php if($count_application == 1): ?>
                    <?php if($count_feedback == 0 ): ?>
                        <p class="mu-color text-center px-2 pt-2"><b>Your application is on progress please wait for results</b></p>
                    <?php else: ?>
                        <?php if($fetch_feedback['status'] == "selected"): ?>
                            <p class="mu-color px-2 pt-2">
                                <i class="fa fa-info-circle"></i> Congratulation...! <b><?php echo "$user_data[last_name] $user_data[first_name]" ?></b>
                                Your have being selected for the interview at our MU Organisation in the department of <b><?php echo "$dept_data[name]" ?>.</b> </p>
                            <p class="mu-color px-2 pt-2" style="margin-top:-1rem">
                                Reporting Date: <b><?php echo date('d-m-Y', strtotime($fetch_application['from_date'])) ?></b> </p>
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
                                <i class="fa fa-info-circle"></i> Sorry...! <b><?php echo "$user_data[last_name] $user_data[first_name]" ?></b>
                                Your have not being selected for the partitime job into our organisation, try other time.</p>
                <!-- -->
                        <?php endif ?>
                    <?php endif ?>
                    <?php endif ?>
                <!-- <?php //else: ?>
                    <p class="mu-color text-center px-2 pt-2">
                    <b>Congraturation...! <?php //echo "$user_data[last_name] $user_data[first_name]" ?>
                     Your account is active and now we are waiting for your application</b></p>
                    <center><a href="application.php" class="btn mu-btn col-4 mb-3">Apply now</a><center>
                <?php //endif ?> -->
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>