<?php include_once('../includes/config.php') ?>
<?php  

    if(isset($_POST['register'])) {
        $fname      = mysqli_real_escape_string($dbconnect, $_POST['fname']);
        $lname      = mysqli_real_escape_string($dbconnect, $_POST['lname']);
        $sex        = mysqli_real_escape_string($dbconnect, $_POST['sex']);
        $email      = mysqli_real_escape_string($dbconnect, $_POST['email']);
        $phone      = mysqli_real_escape_string($dbconnect, $_POST['phone']);
        $username   = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $is_admin   = mysqli_real_escape_string($dbconnect, $_POST['is_admin']);
        $password   = mysqli_real_escape_string($dbconnect, $_POST['password']);
        $cpassword  = mysqli_real_escape_string($dbconnect, $_POST['cpassword']);

        //check username
        $username_check = mysqli_query($dbconnect, "SELECT username FROM user WHERE username='$username'");
        $count_username = mysqli_num_rows($username_check);

        //check if password metch
        if($password != $cpassword) {
            $_SESSION['error'] = "Password does not match";
            header("location:user_add.php");
        }

        //check password length
        else if(strlen($password) < 5) {
            $_SESSION['error'] = "Password must have at least five (5) characher";
            header("location:user_add.php");
        }

         //check if username exist
         else if($count_username == 1){
            $_SESSION['error'] = "User with the same username aready registered";
            header("location:user_add.php");
        }

        else {
            //password hashing
            $password = md5($password);

            if($is_admin = 0) {
                $type = "staff";
            }

            else {
                $type = "admin";
            }

            $register_user_query = mysqli_query($dbconnect, "INSERT 
            INTO user (`fname`, `lname`, `sex`, `email`, `username`, `phone`, `password`, `is_admin`, `type`)
            VALUES ('$fname', '$lname', '$sex', '$email', '$username', '$phone', '$password', '$is_admin', '$type')");
            
            //check if user registered successfully
            if($register_user_query) {
                $_SESSION['success'] = "User added successfully!!";
                header("location:user.php");
            }
            else {
                $_SESSION['error'] = "Something went wrong, please try again!";
                header("location:user.php");
            }
        }
    }
?>