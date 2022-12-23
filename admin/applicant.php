<?php require_once('sidebar.php') ?>
<?php
    $applicant_list = mysqli_query($dbconnect, "SELECT user.*, applicant.* 
    FROM user, applicant 
    WHERE user.user_id = applicant.user_id");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="table">
                        <table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>NOK Name</th>
                                    <th>NOK Phone</th>
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
                                        <td><?php echo $applicant['next_of_kin'] ?></td>
                                        <td><?php echo $applicant['next_of_kin_phone'] ?></td>
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