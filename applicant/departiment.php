<?php 

    require_once('sidebar.php');
    require_once('check_application.php');

    if($count_application > 0):
        echo "<script>window.location='index.php'</script>";
    endif;

    $department_list = mysqli_query($dbconnect, "SELECT department.*, faculty.* FROM faculty, department 
        WHERE department.faculty_id = faculty.faculty_id
        AND department.faculty_id = $_GET[key]");
    $department_count = mysqli_num_rows($department_list);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card bg-light">
                <p class="mu-color text-center px-2 pt-2">
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php  $sn = 1; while($department_item = mysqli_fetch_assoc($department_list)) {?>
                           <?php    
                                $get_posts = mysqli_query($dbconnect, "SELECT * 
                                    FROM post, department 
                                    WHERE department.dept_id = post.post_id 
                                    AND post.dept_id = $department_item[dept_id]");
                                $count_posts = mysqli_num_rows($get_posts);
                           ?>
                            <a class="col-md-6" href="application.php?dept_id=<?php echo $department_item['dept_id'] ?>">
                                <div class="card shadow p-4 m-2 unit-card">
                                    <h6><?php echo $department_item['deptName'] ?></h6>
                                    <div>
                                        <span class="badge bg-dark"><?php echo $department_item['faculty_name'] ?></span>
                                    </div>
                                    <div>
                                        <span class="badge bg-danger">Available Posts <?php echo $count_posts  ?></span>
                                    </div>
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