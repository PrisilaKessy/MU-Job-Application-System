<?php require_once('sidebar.php') ?>
<?php if(!isset($_POST['application_num'])): ?>
    <?php echo "<script>window.location='posts.php'</script>" ?>
<?php endif ?>

<?php $application_number = $_POST['application_num'] ?>
<?php $applicant_num = $_POST['applicant_num'] ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-xl-5 col-sm-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Selection Form</h3>
                    <hr>
                    <form action="selection_action.php" method="post">
                        <div class="form-group mt-2">
                            <label for="selection">Choose Option</label>
                            <select required name="select" id="selection" class="form-control">
                                <option value="">--select result--</option>
                                <option value="selected">Selected</option>
                                <option value="not selected">Not selected</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="reason">Choose reason if the student has not successfully selected</label>
                            <select name="reason" id="selection" class="form-control">
                                <option value="">--Choose reason--</option>
                                <option value="high comptition">High Competition</option>
                                <option value="late apply">Late Apply</option>
                            </select>
                        </div>
                        <!-- To know the user who make a selection -->
                        <input hidden type="number" name="user_id" value="<?php echo $user_id  ?>">
                        <input hidden type="number" name="applicant_num" value="<?php echo $applicant_num  ?>">
                        <input hidden type="number" name="application_id" value="<?php echo $application_number  ?>">
                        <div class="form-group mt-2">
                            <input type="submit" value="Select Applicant" class="btn mu-btn" name="selection_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>