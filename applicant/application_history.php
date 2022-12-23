<?php require_once('sidebar.php') ?>
<?php

    $applicant_sql = "SELECT applicant_num 
    FROM applicant 
    WHERE user_id=$user_id";

    $applicant_query  = mysqli_query($dbconnect, $applicant_sql);
    if($applicant_query)
    {
        $row = mysqli_fetch_assoc($applicant_query);
        $applicant = $row['applicant_num'];
       
        $application_sql ="SELECT application.*, applicant.*, post.*, department.*
        FROM application, applicant, post, department
        WHERE applicant.applicant_num = application.applicant_id
        AND application.post = post.post_id
        AND department.dept_id = post.dept_id
        AND applicant.applicant_num = $applicant";

        $application_query = mysqli_query($dbconnect, $application_sql);
        $application_row = mysqli_fetch_assoc($application_query);
        $applicant_number = $row['applicant_num'];
        $count_application = mysqli_num_rows($application_query);

        //feedback
        $application_number = $application_row['application_id'];
        $select_feedback = mysqli_query($dbconnect, "SELECT * 
        FROM feedback WHERE `application_id` = $application_number");
    
        if($count_application > 0) 
        {
            $fetch_feedback = mysqli_fetch_array($select_feedback);
            $count_feedback = mysqli_num_rows($select_feedback);
        }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="mu-color">Your Application History Details</h4>
                    <hr>
                    <div class="quantinty">
                        <table class="table table-striped">
                            <tr>
                                <th>Full Name</th>
                                <td><?php echo "$user_data[fname] $user_data[lname]" ?></td>
                            </tr>
                            <tr>
                                <th>Application Number</th>
                                <td><?php echo $application_row['application_id'] ?></td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td><?php echo $application_row['deptName'] ?></td>
                            </tr>
                            <tr>
                                <th>Date applied Date</th>
                                <td><?php echo $application_row['date'] ?></td>
                            </tr>
                            <!-- <tr>
                                <th>Finish Date</th>
                                <td><?php //echo $application_row['to_date'] ?></td>
                            </tr>
                            <tr>
                                <th>University</th>
                                <td><?php //echo $application_row['university'] ?></td>
                            </tr> -->
                            <tr>
                                <th>Status</th>
                                <td><?php echo strtoupper($application_row['app_status']) ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>