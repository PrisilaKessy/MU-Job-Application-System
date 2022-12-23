<?php include_once('../includes/config.php'); ?>
<?php include_once('../sms.php'); ?>
<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>
<?php

// Selection
if (isset($_POST['selection_btn'])){
 
    // receive all input values from selection_action.php
    $application_number = mysqli_real_escape_string($dbconnect, $_POST['application_id']);
    $user             = mysqli_real_escape_string($dbconnect, $_POST['user_id']);
    $status           = mysqli_real_escape_string($dbconnect, $_POST['select']);
    $reason           = mysqli_real_escape_string($dbconnect, $_POST['reason']);
    $applicant_num    = $_POST['applicant_num'];
    
    $get_phone_query = mysqli_query($dbconnect, "SELECT phone FROM user, application, applicant
        WHERE application.applicant_id = applicant.applicant_num
        AND applicant.user_id = user.user_id
        AND application.application_id
        AND applicant.applicant_num = $applicant_num");
    $fetch_phone = mysqli_fetch_array($get_phone_query);
    $phone = $fetch_phone['phone'];

    //validate form
    if (empty($application_number)|| empty($user) || empty($status)) {
        $_SESSION['error'] = "All field are required";
        header("location:selection_form.php");
    }
    else {
        if(empty($reason)) {
            $selection_query = mysqli_query($dbconnect, "INSERT 
                INTO feedback (`application_id`, `user_id`, `status`, `reason`)
                VALUES('$application_number', '$user', '$status', '$reason')");
            
            if($selection_query) {
                if(mysqli_query($dbconnect, "UPDATE application SET app_status='proccessed' WHERE application_id=$application_number")) {
                    $_SESSION['success'] = "Successfully make decision.";
                    $message = "Congratulation you have being selected on MU parttime job, Login to your account for more information.";
                    send_message($phone, $message);
                    header("location:posts.php");
                    // echo "success";
                } 
                else {
                    echo 'fail';
                }    
            }
            else {
                echo "error 1";
            }
        }

        else {
            $selection_query = mysqli_query($dbconnect, "INSERT INTO 
                feedback (`application_id`, `user_id`, `status`, `reason`)
                VALUES('$application_number', '$user', '$status', '$reason')");
        
            if($selection_query) {
                
                if(mysqli_query($dbconnect, "UPDATE application SET app_status='proccessed' WHERE application_id=$application_number")) {
                    $_SESSION['success'] = "Applicant feedback sent successfully";
                    $message = "Sorry!, you are not selected on our MU parttime Job";
                    send_message($phone, $message);
                    header("location:posts.php");
                    // echo "sucess 2";
                } 
                else {
                    $_SESSION['error'] = "Error try again";
                    header("location:selection_form.php");
                    echo 'fail';
                }

            }
            else {
                echo "error 2";
                die(mysqli_error($dbconnect));
            }
        }
    }
}