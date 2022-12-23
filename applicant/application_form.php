<?php require_once('sidebar.php') ?>
<?php if(!isset($_GET['post_id'])) :?>
    <?php header("location:application.php") ?>
<?php endif ?>
<?php 
    
    $post_id = $_GET['post_id'];

    $post_query = mysqli_query($dbconnect, "SELECT department.*, post.*, faculty.* FROM post, department, faculty WHERE post.dept_id = department.dept_id AND department.faculty_id=faculty.faculty_id AND post.post_id = $post_id");
    $post_fetch = mysqli_fetch_array($post_query);

?>
    <div class="container-fluid">
        <div class="row justify-content-center"> 
            <div class="col-12">
                <div class="card bg-light">
                    <p class="mu-color text-center px-2 pt-2">
                       <strong>NB:</strong> To Complete application please upload your certified CV and Certificate
                    </p>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <div class="card card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>JOB TITLE</th>
                            <td><?php echo $post_fetch['jobtitle'] ?></td>
                        </tr>
                        <tr>
                            <th>JOB DESCRPTION</th>
                            <td><?php echo $post_fetch['description'] ?></td>
                        </tr>
                        <tr>
                            <th>JOB REQUIRED</th>
                            <td><?php echo $post_fetch['required'] ?></td>
                        </tr>
                        <tr>
                            <th>JOB AVAILABLE</th>
                            <td><?php echo $post_fetch['available'] ?></td>
                        </tr>
                        <tr>
                            <th>JOB UNIT</th>
                            <td><?php echo $post_fetch['faculty_name'] ?></td>
                        </tr>
                            <th>JOB DEPERTMENT</th>
                            <td><?php echo $post_fetch['deptName'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>   
            <div class="col-md-12 col-xl-12 mt-2">
                <div class="card">
                    <div class="card-body">
                       <!--  <h4 class="text-center mt-2">Fill The form Below to make application </h4>
                        <hr> -->
                        <form action="application_action.php" method="post" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="form-group mt-2 col-12">
                                    <input type="number" hidden name="post_id" 
                                        value="<?php echo $post_fetch['post_id'] ?>" class="form-control">
                                </div>
                                <div class="form-group mt-2 col-12">
                                    <input type="number" hidden name="applicant_num" 
                                        value="<?php echo $applicant_data['applicant_num'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="form-group col-4">
                                    <label class="text-danger">
                                        Your First Name *</label>
                                    <input readonly type="text"
                                    value="<?php echo "$applicant_data[fname]" ?>" class="form-control" >
                                </div>
                                <div class="form-group col-4">
                                    <label  class="text-danger">
                                        Your Last Name *</label>
                                    <input readonly type="text" 
                                    value="<?php echo "$applicant_data[lname]" ?>" class="form-control" >
                                </div>
                                <div class="form-group col-4">
                                    <label class="text-danger">
                                        Your Email *</label>
                                    <input readonly type="text" name="start_time" id="next_date" 
                                    value="<?php echo "$applicant_data[email]" ?>" class="form-control" >
                                </div>
                            </div>
                            <h6 class="text-muted mt-3">Required input</h6>
                     
                            <div class="row mt-2">
                                <div class="form-group col-4">
                                    <label class="text-danger">
                                        Certificates *</label>
                                    <input type="file" name="certificate" class="form-control" >
                                </div>
                                 <div class="form-group col-4">
                                    <label class="text-danger">
                                        CV *</label>
                                    <input type="file" name="cv" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group mt-2 col-6">
                                <input type="submit" name="send_application" 
                                    value="Send Application" class="btn mu-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('finish.php') ?>