<?php require_once('sidebar.php') ?>
<?php require_once('check_application.php') ?>
<?php

    $user = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
    $user_data = mysqli_fetch_assoc($user);
    $applicant = mysqli_query($dbconnect, "SELECT * FROM applicant WHERE applicant.applicant_num = applicant.user_id");
    $app_data = mysqli_fetch_array($applicant);

    //$department = mysqli_query($dbconnect, "SELECT * FROM department");
?>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="mu-color">Your personal Details</h4>
            <hr>
            <div class="quantinty">
                <table class="table table-striped">
                        <tr>
                        <th>Full Name</th>
                            <td><?php echo "$user_data[fname] $user_data[lname]"?></td>
                        </tr>
                        <tr>
                            <th>Sex</th>
                            <td><?php echo $user_data['sex'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $user_data['email'] ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $user_data['phone'] ?></td>
                        </tr>
                        <tr>
                            <th>Phisical Address</th>
                            <td><?php echo $app_data['address']?></td>
                        </tr>
                        <tr>
                            <th>Your Type</th>
                            <td><?php echo $user_data['type'] ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $user_data['username'] ?></td>
                        </tr>
                        <tr>
                            <th>Next Of kin</th>
                            <td><?php echo $app_data['next_of_kin']?></td>
                        </tr>
                        <tr>
                            <th>Next Of Kin Phone</th>
                            <td><?php echo $app_data['next_of_kin_phon']?></td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>