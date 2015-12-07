<?php
@session_start();
$err = "";
if($_SESSION['Account'] == null){
	header("Location:login.php");
	die();
}
elseif($_SESSION['Account'] == 'admin')
{
	include('function/Mysql.php');
	include('function/User.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


	}
}
else
{

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>
		</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- All the files that are required -->
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

		<!-- jQuery -->
		<script src="js/jquery.js">
		</script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js">
		</script>
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/paysheet.css" type="text/css">

	</head>
	<body>
		<? include("header.php"); ?>
		<div class="contain">
			<div class="contain panel panel-default">
				<div class="panel-heading">
					Upload File
				</div>
				<div class="panel-body">
					<form action="upload.php" enctype="multipart/form-data" method="post">
						<div class="form-box">
							<div class="upload">Employee Account :</div>
							<div class="dropdown-box">
							<select class="form-control" name="account" required="">
								<option value="N123456789">
									N123456789
								</option>

							</select>
							</div>
						</div>
						<div class="form-box">
							<div class="upload">Year & Month :</div>
							<div class="date-box">
							<input type="month" name="date" class="form-control" required=""/>
							</div>
						</div>
						<div class="form-box">
							<div class="upload">
								上傳薪資表 :
							</div>
							<div class="upload">
								<input id="file" name="file" type="file" required="">
							</div>
						</div>
						<div class="button-box">
							<input id="submit" name="submit" type="submit" value="開始上傳" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>

		</div>
	</body>
</html>