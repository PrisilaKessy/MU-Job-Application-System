<?php include_once('includes/config.php') ?>
<?php  

    if(isset($_POST['register'])) {
        $fname = mysqli_real_escape_string($dbconnect, $_POST['fname']);
        $lname = mysqli_real_escape_string($dbconnect, $_POST['lname']);
        $sex   = mysqli_real_escape_string($dbconnect, $_POST['sex']);
        $phone = mysqli_real_escape_string($dbconnect, $_POST['phone']);
        $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
        $address = mysqli_real_escape_string($dbconnect, $_POST['address']);
        $level_of_education = mysqli_real_escape_string($dbconnect,$_POST['level']);
        $nok_name = mysqli_real_escape_string($dbconnect, $_POST['next_of_kin']);
        $nok_phone = mysqli_real_escape_string($dbconnect, $_POST['next_of_kin_phone']);
        $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
        $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
        $cpassword = mysqli_real_escape_string($dbconnect, $_POST['cpassword']);

        //check username
        $username_check = mysqli_query($dbconnect, "SELECT username FROM user WHERE username='$username'");
        $count_username = mysqli_num_rows($username_check);

        //check if password match
        if($password != $cpassword) 
        {
            $_SESSION['error'] = "Password does not match";
            header("location:registration.php");
        }

        //check password length
        else if(strlen($password) < 5) 
        {
            $_SESSION['error'] = "Password must have at least five (5) characher";
            header("location:registration.php");
        }

        //check if username exist
        else if($count_username == 1)
        {
            $_SESSION['error'] = "That Username has already registered, find another one!!";
            header("location:registration.php");
        }

        else 
        {
            //password hashing
            $password = md5($password);
            $sql = "INSERT INTO user (`fname`, `lname`, `sex`, `phone`, `email`, `username`, `password`)
                    VALUES ('$fname', '$lname', '$sex', '$phone', '$email', '$username', '$password')";
            $register_user_query = mysqli_query($dbconnect, $sql);
            //check if user registered successfully
            if($register_user_query)
            {
                $select_user_id = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username'");
                $fetch_user     = mysqli_fetch_array($select_user_id);
                $user_id        = $fetch_user['user_id'];

                //insert data into table applicant
                $query = "INSERT INTO applicant (`address`, `level`, `next_of_kin`, `next_of_kin_phone`, `user_id`) VALUES ('$address', '$level_of_education', '$nok_name', '$nok_phone', '$user_id')";
                $register_applicant_query = mysqli_query($dbconnect, $query);
                
                if($register_applicant_query) 
                {
                    $_SESSION['applicant_loged_in'] = true;
                    //check if user array is empty and redirect applicant to his pages
                    if(!empty($fetch_user)) 
                    {
                        $_SESSION['applicant_detail']   = $fetch_user;
                        $_SESSION['success'] = "You have been registered successfully!, use your username and password to login.";
                        header("location:index.php");
                    }
                }
                else 
                {
                    $_SESSION['error'] = "Failed to create account";
                    header("location:registration.php");
                }
            }

            else 
            {
                $_SESSION['error'] = "Something went wrong please try again";
                header("location:registration.php");
            }
        }
    } 
    else 
    {
        $_SESSION['error'] = "Bad access method";
        header("location:registration.php");
    }
?>