<?php require_once('sidebar.php') ?>


<?php
    $applicant_list = mysqli_query($dbconnect, "SELECT user.*
    FROM user 
    WHERE user.type!='applicant'");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <a href="user_add.php" class="btn mu-btn">New User <i class="fa fa-user-plus"></i> </a>
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Type</th>
                                    <th>active</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop for looping doctor -->
                                <?php  $sn = 1; while($applicant=mysqli_fetch_array($applicant_list)) {?>
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $applicant['fname'] ?></td>
                                        <td><?php echo $applicant['lname'] ?></td>
                                        <td><?php echo $applicant['sex'] ?></td>
                                        <td><?php echo $applicant['phone'] ?></td>
                                        <td><?php echo $applicant['email'] ?></td>
                                        <td><?php echo $applicant['username'] ?></td>
                                        <td><?php echo $applicant['type'] ?></td>
                                        <td>
                                            <?php if($applicant['is_active'] == 1): ?>
                                                <a href="activator.php?deactivate=<?php echo $applicant['user_id']?>">
                                                    <span class="badge mu-btn">Active</span>
                                                </a>
                                            <?php else: ?>
                                                <a href="activator.php?activate=<?php echo $applicant['user_id']?>">
                                                    <span class="badge bg-success">Deactivated</span>
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