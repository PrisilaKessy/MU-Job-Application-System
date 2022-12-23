<?php 

include_once('../includes/config.php');

$user_id = $_SESSION['applicant_detail']['user_id'];
$user = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
$user_data = mysqli_fetch_assoc($user);

$applicant_query = mysqli_query($dbconnect, "SELECT * FROM user, applicant 
    WHERE applicant.user_id = user.user_id 
    AND  user.user_id = '$user_id' 
    AND applicant.user_id = '$user_id'");
$applicant_data = mysqli_fetch_assoc($applicant_query);

$applicant_number = $applicant_data['applicant_num'];

require_once('check_application.php');

if($count_application > 0):
    echo "<script>window.location='index.php'</script>";
endif;


if(isset($_POST['send_application'])) {
    
    $applicant_num  = mysqli_real_escape_string($dbconnect, $_POST['applicant_num']);
    $post_id  = mysqli_real_escape_string($dbconnect, $_POST['post_id']);
   
    // array for allowed file type files
    $allowType = array('pdf');

    $certificate = $_FILES['certificate']['name'];
    $certificate_temp = $_FILES['certificate']['tmp_name'];
    $certificate_destnation = "../files/certificate/".$certificate;
    $certificate_extension = strtolower(pathinfo($certificate, PATHINFO_EXTENSION));

    if(!in_array($certificate_extension, $allowType)) {
        $_SESSION['error'] = "Only pdf file is Allowed";
        header("location:application.php");
        //echo "only pdf";
    }

    $cv = $_FILES['cv']['name'];
    $cv_temp = $_FILES['cv']['tmp_name'];
    $cv_destnation = "../files/cv/".$certificate;
    $cv_extension = strtolower(pathinfo($cv, PATHINFO_EXTENSION));

    if(!in_array($cv_extension, $allowType)) {
        $_SESSION['error'] = "Only pdf file is Allowed";
        header("location:application.php");
        //echo "only pdf";
    }

    else if(move_uploaded_file($certificate_temp, $certificate_destnation) && move_uploaded_file($cv_temp, $cv_destnation)) { 
        $send_application = mysqli_query($dbconnect, "INSERT INTO application(applicant_id, post, certificate, cv)
            VALUES ('$applicant_num', '$post_id', '$certificate', '$cv')");

        if($send_application) {
            $_SESSION['success'] = "Congratulation your application sent successfully and we are working on it, we will notify through your mobile phone.";
            header("location:index.php");
        }
        else {
            $_SESSION['error'] = "Something went wrong please try again";
            header("location:index.php");
        }
    }
    else {
        $_SESSION['error'] = "Something went wrong please try again";
        header("location:index.php");
    }
}

else {

    $_SESSION['error'] = "Bad access method";
    header("location:index.php");
}
?>