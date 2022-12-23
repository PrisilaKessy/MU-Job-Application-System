<?php include ("includes/config.php"); ?>
<?php

    $user_id = mysqli_query($dbconnect, "SELECT * FROM user WHERE user_id = '$user_id'");
    $user_data = mysqli_fetch_assoc($user);

    $department_list = mysqli_query($dbconnect, "SELECT department.*, post.* FROM post, department WHERE post.dept_id = department.dept_id");
    $department_count = mysqli_num_rows($department_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-light">
                <p class="mu-color text-center px-2 pt-2">
                    <b>Dear <?php echo "$user_data[lname] $user_data[fname]" ?>
                     Be carefully with your application after submission no chance to edit and you have one chance</b></p>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Department</th>
                                    <th>Required</th>
                                    <th>Job Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping doctor -->
                                <?php  $sn = 1; while($department=mysqli_fetch_array($department_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $department['deptName'] ?></td>
                                        <td><?php echo $department['required'] ?></td>
                                        <td><?php echo $department['jobtitle'] ?></td>
                                        <td>
                                            <?php if($department['available'] == "yes"): ?>
                                                <a href="login.php?post_id=<?php echo $department['post_id']?>"
                                                    class="btn btn-success btn-sm">
                                                    Login in now</a>
                                            <?php else: ?>
                                                <a href="" data-target="#apply<?php echo $department['dept_id']?>">
                                                    <span href="" class="badge bg-danger">Department Closed</span></a>
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
<!-- <?php //include ("applicant/finish.php"); ?> -->