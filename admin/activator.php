<?php include_once('../includes/config.php'); ?>
<?php if(!isset($_SESSION['admin_loged_in'])): ?>
    <?php header('location:../logout.php') ?>
<?php endif ?>
<?php 
    if(isset($_GET['deactivate'])) {
        $user_id = $_GET['deactivate']; 
        if(mysqli_query($dbconnect, "UPDATE user SET is_active = 0 WHERE `user_id`= '$user_id'")) {
            header("location:applicant.php");
            exit;
        }
    }
    else if(isset($_GET['activate'])){
        $user_id = $_GET['activate']; 
        if(mysqli_query($dbconnect, "UPDATE user SET is_active = 1 WHERE `user_id`= '$user_id'")) {
            header("location:applicant.php");
            exit;
        }
    }

    else if(isset($_GET['close'])){
        $id = $_GET['close']; 
        if(mysqli_query($dbconnect, "UPDATE post SET available = 'no' WHERE `post_id`= '$id'")) {
            $_SESSION['success'] = "CLosed Successfully";
            header("location:posts.php");
            // echo "error";
            die(mysqli_error($dbconnect));
            exit;
        }
        else {
            die(mysqli_error($dbconnect));
            echo "error $id";
        }
    }

    else if(isset($_GET['open'])){
        $id = $_GET['open']; 
        if(mysqli_query($dbconnect, "UPDATE post SET available = 'yes' WHERE `post_id`= '$id'")) {
            $_SESSION['success'] = "Open Successfully";
            header("location:posts.php");
            exit;
        }
    }

    else {
        echo '<script>
            alert("Bad access");
            document.location.href="doctor.php";
        </script>';
    }
?>
