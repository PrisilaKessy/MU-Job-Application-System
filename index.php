<?php
	include ("includes/config.php");
	$faculty_and_course_query = mysqli_query($dbconnect, "SELECT * FROM faculty_list");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/mulogo.png">
    <title>MU Part-time Job Application</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body">
	<div class="container">
		<div class="row justify-content-center pt-0">
			<?php include ("includes/messages.php")?>
            <div class="col-md-5 col-sm-6 col-xl-12 col-xs-5 bg-light border d-flex flex-row">
               	 <div><img src="img/mulogo.png" alt="" srcset="" width="25%" class="pt-2 col-xl-4"></div>
                 <div class="bg-primary col-md-5 col-sm-6 col-xl-4 col-xs-5 bg-light">
                 	<h2 class="mu-text pt-2 font-weight-bold text-justify">Mzumbe <br>University</h2>
                 </div>
                 <div class="mu-text pt-2 col-xl-4 text-justify"><h3 class="font-weight-bold">Part-time Job Application <span><h3 class="text-center font-weight-bold">(MU - PTA)</h3></span></h3><a href="login.php"><h6 class="text-right">User Login | Register</h6></a></div>	
            </div>      
		</div><hr>
		<div class="d-flex flex-column col-xl-12">
			<h5 class="mu-text pt-2 col-xl-12 text-justify text-center">Help Desk: +255768726834, +255655389210 - Enquaries: +255788129034, +255654239101</h5>
		</div>
		<div class="card-body"><hr>
			<h4 class="text-center font-weight-bold text-uppercase">Ajira za muda mfupi katika Chuo Kikuu Mzumbe</h4>
		</div><hr>
			<h5 class="text-grey text-uppercase">Job Posts By Units</h5>
			<div class="row bg-light">
				<?php while ($list_of_fucuty = mysqli_fetch_assoc($faculty_and_course_query)) { ?>
				<div class="col-md-4 col-xl-4 mu-text">
					<li>
						<a href="post_list.php?faculty_id=<?php echo $list_of_fucuty['faculty_id'] ?>">
						<?php echo $list_of_fucuty['faculty_name'] ?> (<?php echo $list_of_fucuty['total'] ?>)		
						</a>
					</li>
				</div>
				<?php }?>	
			</div>
		<div style="margin-bottom: 148px">
			<footer>
				<?php include("applicant/finish.php");?>
			</footer>
		</div>
	</div>
</body>
</html>