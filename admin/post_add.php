<?php include_once('../includes/config.php'); ?>

<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>

<?php
// Selection
if (isset($_POST['add_departmant'])){
 
    // receive all input values from the
    $dept             = mysqli_real_escape_string($dbconnect, $_POST['dept']);
    $job_title             = mysqli_real_escape_string($dbconnect, $_POST['jobtitle']);
    $desc                  = mysqli_real_escape_string($dbconnect, $_POST['description']);
    $required_student      = mysqli_real_escape_string($dbconnect, $_POST['required']);
    
    //validate form
    if (empty($dept) ||empty($job_title) || empty($desc) || empty($required_student))
    {
        //return error to user
        $_SESSION['error'] = "All field are required";
        header("location:posts.php");
    }

    else { 

        $new_posts_query = "INSERT INTO post (dept_id, jobtitle, description, required) VALUES ('$dept', '$job_title', '$desc', '$required_student')";
            
        if(mysqli_multi_query($dbconnect, $new_posts_query))
        {
            $_SESSION['success'] = "Post created successfully";
            header("location:posts.php");
        }
        else
        {
            $_SESSION['error'] = "Error Try Again";
            header("location:posts.php");
            die(mysqli_error($dbconnect));
        }
    }
}