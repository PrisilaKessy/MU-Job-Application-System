<?php include("../includes/config.php")?>


<?php
	if(isset($_GET['delete_id']))
	{
		$post_id = $_GET['delete_id'];

		$delete_query = "DELETE FROM `post` WHERE `post_id` = '$post_id'";
		$run_delete= mysqli_query($dbconnect, $delete_query);

		if($run_delete)
		{
			$_SESSION['success'] = "Post deleted successfully!";
            header("location:posts.php");
		}

		else
		{
			$_SESSION['error'] = "The process wasn't successful";
			header("location:posts.php");
			// die(mysqli_error($dbconnect));
		}
	}

	else
	{
		$_SESSION['error'] = "Something went wrong try again";
		header("location:posts.php");
		//echo "error 2";
	}
?>

<?php require_once('finish.php') ?>
