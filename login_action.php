<?php require_once('includes/config.php'); ?>
<?php 
    //check if button signin is pressed
    if(isset($_POST['signin'])) 
    {

        //recieve data from html input and store into variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        //escape sql injection by escape_real_string
        $username = mysqli_real_escape_string($dbconnect, $username);
        $password = mysqli_real_escape_string($dbconnect, $password);

        //check if all field have data
        if(empty($username) || empty($password)) 
        {
            $message = "All entry field are required";
            $_SESSION['error'] = $message;
            header("location:login.php");
        }
        
        //if all field have data
        else
        {
            //password hashing
            $password = md5($password);

            //query to select user from database
            $query_user = mysqli_query($dbconnect, "SELECT *
                FROM user 
                WHERE (((username) = '$username')
                AND ((password) = '$password' )
                AND ((is_active) = 1))");
            
            //count how many row returned from the query
            $count_row = mysqli_num_rows($query_user);

            //check if number of rows equal to one
            if($count_row == 1) 
            {
                //store user data in array
                $user_data = mysqli_fetch_assoc($query_user);
                $_SESSION['type'] = $user_data['type'];
                $_SESSION['is_login'] = $user_data['user_id'];

                if($_SESSION['type'] == "applicant") 
                {
                    if(isset($_POST['apply'])) {
                        $apply = $_POST['apply'];
                        $_SESSION['success'] = "You have login successfully";
                        $_SESSION['applicant_loged_in'] = true;
                        $_SESSION['applicant_detail']   = $user_data;
                        header("location:post_list.php?faculty_id=$apply");
                    }
                    else {
                        $_SESSION['applicant_loged_in'] = true;
                        $_SESSION['applicant_detail']   = $user_data;
                        header("location:applicant/units.php");
                    }
                }
                else 
                {
                    $_SESSION['admin_loged_in'] = true;
                    $_SESSION['admin_detail']   = $user_data;
                    header("location:admin/");
                }
            } 
            else 
            {

                if(isset($_POST['apply'])) {
                    $apply = $_POST['apply'];
                    $_SESSION['error'] = "Sorry wrong username or password, please try again!";
                    header("location:post_list.php?faculty_id=$apply");
                    echo "error 2";
                }
                else {
                    
                    $_SESSION['error'] = "Sorry wrong username or password, please try again!";
                    header("location:login.php");
                    echo "error 3";
                }
            }
        }
    }
?>