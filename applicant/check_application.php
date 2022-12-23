<?php  
error_reporting(0);

	$select_applicant = mysqli_query($dbconnect, "SELECT applicant_num 
    FROM applicant 
    WHERE user_id=$user_id");
    $fetch_applicant  = mysqli_fetch_assoc($select_applicant);
    $applicant        = $fetch_applicant['applicant_num'];

	$check_application = mysqli_query($dbconnect, "SELECT application.*, applicant.* 
		FROM application, applicant 
		WHERE applicant.applicant_num = application.applicant_id 
		AND applicant.applicant_num = $applicant ");

	$fetch_application = mysqli_fetch_array($check_application);
    $count_application = mysqli_num_rows($check_application);
    $application_number = $fetch_application['application_id'];


?>
