<?php 

    require_once('sidebar.php');
    require_once('check_application.php');

    if($count_application > 0):
        echo "<script>window.location='index.php'</script>";
    endif;
    
    $faculty = mysqli_query($dbconnect, "SELECT * FROM faculty");
    $faculty_list = mysqli_fetch_assoc($faculty);

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-light">
                <p class="mu-color text-center px-2 pt-2">
                    <b>Dear <?php echo "$user_data[lname] $user_data[fname]" ?>
                     Please select the unit that you wish to look for a job</b></p>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <?php  $sn = 1; while($faculty_item = mysqli_fetch_assoc($faculty)) {?>
                            <a class="col-md-2" href="departiment.php?key=<?php echo $faculty_item['faculty_id'] ?>">
                                <div class="text-center card shadow p-4 m-2 unit-card">
                                    <?php echo $faculty_item['faculty_name'] ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('finish.php') ?>