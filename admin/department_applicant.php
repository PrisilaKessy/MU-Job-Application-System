5<?php require_once('sidebar.php') ?>

<?php if(!isset($_GET['post_id'])): ?>
    <!-- this script below used to limit applicant according to their department-->
    <?php echo "<script>window.location='posts.php' </script>" ?>
<?php endif ?>

<?php
    $post_id = $_GET['post_id'];
    $applicant_list = mysqli_query($dbconnect, "SELECT user.*, applicant.*, application.* ,department.*,post.jobtitle
    FROM user, applicant, department, `application`, `post` 
    WHERE user.user_id = applicant.user_id
    AND application.applicant_id = applicant.applicant_num
    AND post.dept_id = department.dept_id 
    AND post.post_id = application.post
    AND application.post = $post_id
    ORDER BY application.date DESC");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <table width="102%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>NOK Name</th>
                                    <th>NOK Phone</th>
                                    <th>Job Title</th>
                                    <th>active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping applicant -->
                                <?php  $sn = 1; while($applicant=mysqli_fetch_array($applicant_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $applicant['fname'] ?></td>
                                        <td><?php echo $applicant['lname'] ?></td>
                                        <td><?php echo $applicant['sex'] ?></td>
                                        <td><?php echo $applicant['phone'] ?></td>
                                        <td><?php echo $applicant['next_of_kin'] ?></td>
                                        <td><?php echo $applicant['next_of_kin_phone'] ?></td>
                                      
                                        <td><?php echo $applicant['jobtitle']?>
                                        <td>
                                            <?php if($applicant['app_status'] == "processing"): ?>
                                                <a href="#">
                                                    <span class="badge mu-bg bg-grey">Proccesing</span>
                                                </a>
                                            <?php else: ?>
                                                <a href="#">
                                                    <span class="badge bg-success">Proccessed</span>
                                                </a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php if($applicant['app_status'] == "processing"): ?>
                                                <form action="selection_form.php" method="post">
                                                    <input hidden type="number" name="application_num" 
                                                        value="<?php echo $applicant['application_id'] ?>">
                                                    <input  type="number" name="applicant_num" 
                                                        value="<?php echo $applicant['applicant_num'] ?>">
                                                    <input type="submit" name="select_app" class="btn btn-sm btn-primary text-light" value ="Select">
                                                </form>
                                            <?php else: ?>
                                                <a href="#">
                                                    <span class="badge bg-success">Proccessed</span>
                                                </a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>