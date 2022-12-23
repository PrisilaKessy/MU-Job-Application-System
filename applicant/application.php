<?php 

    require_once('sidebar.php');
    require_once('check_application.php');

    if($count_application > 0):
        echo "<script>window.location='index.php'</script>";
    endif;

?>
<?php if(isset($_GET['dept_id'])): ?>
    <?php

        $department_list = mysqli_query($dbconnect, "SELECT department.*, post.* FROM post, department WHERE post.dept_id = department.dept_id AND post.dept_id = $_GET[dept_id]");
        $department_count = mysqli_num_rows($department_list);
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card bg-light">
                    <p class="mu-color text-center px-2 pt-2">
                        <b>Dear <?php echo "$user_data[lname] $user_data[fname]" ?>
                         Be carefully with your application after submission, no chance to edit and you have one chance
                        </b>
                    </p>
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
                                    <!-- loop for looping post -->
                                    <?php  $sn = 1; while($department=mysqli_fetch_array($department_list)) {?>
                                        <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $department['deptName'] ?></td>
                                            <td><?php echo $department['required'] ?></td>
                                            <td><?php echo $department['jobtitle'] ?></td>
                                            <td>
                                                <?php if($department['available'] == "yes"): ?>
                                                    <a href="application_form.php?post_id=<?php echo $department['post_id']?>"
                                                        class="btn btn-success btn-sm">
                                                        Apply Now</a>
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
    <?php require_once('finish.php') ?>
<?php endif ?>