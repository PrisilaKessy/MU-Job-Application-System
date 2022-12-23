<?php 
if(isset($_GET['faculty_id'])):
	include ("includes/config.php");


	$faculty_id = $_GET['faculty_id'];
	$post_query = mysqli_query($dbconnect, "SELECT * FROM post_list WHERE faculty = $faculty_id");
	$count_post = mysqli_num_rows($post_query);

	if($count_post > 0):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MU Part-time Job List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
   
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="body">

	<div class="container mt-2">
		<?php require_once('includes/messages.php') ?>
		<div class="row justify-content-center pt-0">
          	<div class="col-md-12 col-xl-12 pt-3 pt-sm-4">
          		<div class="card">
          			<div class="card-body">
          				<h5 class="mu-text text-center text-uppercase">Apply according to Department you need</h5>
          				<div class="table">
          					<table width="100%" class="table table-striped table-sm table-bordered" id="dataTable">
                            	<thead>
                                	<tr class="text-center">
                                    	<th class="text-left">S/N</th>
                                    	<th>Department</th>
                                    	<th>Job Title</th>
                                    	<th>Required</th>
                                    	<th>Description</th>
                                    	<th>Action</th>
                                    	<th>End date</th>
                                	</tr>
                            	</thead>
                            	<tbody>
                                <!-- loop for looping Post -->
                                	<?php  $sn = 1; while ($post_list_item = mysqli_fetch_assoc($post_query)) {?>
                                    	<tr>
                                        	<td><?php echo $sn++ ?>.</td>
                                        	<td><?php echo $post_list_item['deptName'] ?></td>
                                        	<td><?php echo $post_list_item['jobtitle'] ?></td>
                                        	<td><?php echo $post_list_item['required'] ?></td>
                                        	<td><?php echo $post_list_item['description'] ?></td>
                                        	<td>
                                        		<?php if(isset($_SESSION['is_login'])): ?>
                                        			<a href="applicant/application_form.php?post_id=<?php echo $post_list_item['post_id'] ?>">
                                        				Apply
                                        			</a>
                                        		<?php else: ?>
                                        			<a href="#" type="button" data-toggle="modal" data-target="#login<?php echo $post_list_item['post_id']  ?>">Login</a>
                                        		<?php endif ?>

                                        	</td>
                                    	</tr>
                                    	<div class="modal fade" id="login<?php echo $post_list_item['post_id'] ?>">
                                    		<div class="modal-dialog">
                                    			<div class="modal-content">
                                    				<div class="modal-header">
                                    					<h3>Login</h3>
                                    					<button type="button" class="close" data-dismiss="modal">&times;</button>
                                    				</div>
                                    				<div class="modal-body">
                                    					<form action="login_action.php" method="POST">
                                    						<input type="text" name="apply" value="<?php echo $faculty_id ?>" hidden>
                                    						<div class="form-group mt-2">
                                    							<input type="text" name="username" placeholder="Username" class="form-control">
                                    						</div>
                                    						<div class="form-group mt-2">
                                    							<input type="password" name="password" placeholder="Password" class="form-control">
                                    						</div>
                                    						<div class="form-group mt-2">
                                    							<button type="submit" name="signin" class="btn mu-btn btn-block">
                                    								Sign in
                                    							</button>
                                    							<p class="text-center ml-3"><a href="registration.php" class="mu-text">Register</a> if you don't have an account</p>
                                    						</div>
                                    					</form>
                                    				</div>
                                    			</div>
                                    		</div>
                                    		
                                    	</div>
                                	<?php } ?>
                            	</tbody>
                        	</table>
          				</div>
          			</div>
          		</div>
          	</div>
		</div>
	</div>
</body>
</html>
<?php endif ?>
<?php endif ?>