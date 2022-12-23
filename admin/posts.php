<?php require_once('sidebar.php')?>

<?php
    $post_list = mysqli_query($dbconnect, "SELECT faculty.*, department.*, post.* FROM faculty, department, post WHERE department.dept_id=post.dept_id  AND department.faculty_id = faculty.faculty_id");
    $post_count = mysqli_num_rows($post_list);
    $post_fetch = mysqli_fetch_array($post_list);

    $department_list = mysqli_query($dbconnect, "SELECT * FROM department");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <form action="post_add.php" method="post" class="pt-3 px-3">
                    <h4>New post</h4>
                    <div class="row">
                        <div class="col-xl-4 col-md-7 col-xs-12 col-sm-12">
                            <select class="form-control" name="dept" required="">
                                <option value="">---select department---</option>
                                <?php while($row_dept = mysqli_fetch_assoc( $department_list)) { ?>
                                    <option value="<?php echo $row_dept['dept_id'] ?>">
                                        <?php echo $row_dept['deptName'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xl-4 col-md-7 col-xs-12 col-sm-12">
                            <input type="text" name="jobtitle" 
                                id="" class="form-control" placeholder="Job Title">
                        </div>
                     
                        <div class="col-xl-4 col-md-7 col-xs-12 col-sm-12">
                            <input type="number" name="required" 
                                id="" class="form-control" placeholder="Required Workers">
                        </div>

                        <div class="col-xl-4 col-md-7 col-xs-12 col-sm-12 mt-3">
                            <textarea type="text" name="description" 
                                id="" class="form-control" placeholder="Job Description"></textarea>
                        </div>
                    
                        <div>
                            <input type="submit" name="add_departmant" 
                                id="gets" class="btn mu-btn mt-3">
                        </div>
                    </div>
                </form>
                <hr>
                <div class="card-body">
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Units</th>
                                    <th>Department</th>
                                    <th>Job Title</th>
                                    <th>Description</th>
                                    <th>Required</th>
                                    <th>Available</th>
                                    <th width="30%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping 3 joined table(Faculty, Department and Post) -->
                                <?php  $sn = 1; while($fetch=mysqli_fetch_array($post_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $fetch['faculty_name'] ?></td>
                                        <td><?php echo $fetch['deptName'] ?></td>
                                        <td><?php echo $fetch['jobtitle'] ?></td>
                                        <td><?php echo $fetch['description'] ?></td>
                                        <td><?php echo $fetch['required'] ?></td>
                                        <td><?php echo $fetch['available'] ?></td>
                                        <td>
                                            <?php if($fetch['available'] == "yes"): ?>
                                                <a href="activator.php?close=<?php echo $fetch['post_id']?>"
                                                    class="btn elina-bg btn-md text-light">
                                                    Close</a>
                                            <?php else: ?>
                                                <a href="activator.php?open=<?php echo $fetch['post_id']?>"
                                                    class="btn btn-success btn-md">
                                                    Open</a>
                                            <?php endif ?>
                                            <a href="department_applicant.php?post_id=<?php echo $fetch['post_id']?>"
                                                    class="btn george-bg btn-md text-light">Applicants</a>
                                            <a href="delete_post.php?delete_id=<?php echo $fetch['post_id']?>"
                                                    class="btn danger-bg btn-md text-light">Delete Post</a>
                                        </td>
                                    </tr>
                                 <?php } ?>
                                 <?php include("delete_modal.php")?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>

<!-- <tr>
        <th>JOB TITLE</th>
        <td><?php //echo $post_fetch['jobtitle'] ?></td>
    </tr>
    <tr>
        <th>JOB DESCRPTION</th>
        <td><?php //echo $post_fetch['description'] ?></td>
    </tr> -->
