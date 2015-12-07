<?php
@session_start();
$err = "";
if($_GET['Action'] == "Logout"){
	session_destroy();
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST')
{

	if($_POST['role'] == 'employee')
	{
		include('function/Mysql.php');
		include('function/User.php');
		$Users = new User(new Mysql());
		if($Users->Login($_POST['account'], $_POST['password']))
		{
			$_SESSION['Account'] = $_POST['account'];
		}
		else
		$err = "帳號或密碼錯誤!";
	}
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
				<div class="dropdown">
					Employee Account : <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Employee 
						<span class="caret">
						</span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li>
							<a href="#">
								Action
							</a>
						</li>
						<li>
							<a href="#">
								Another action
							</a>
						</li>
					</ul>
				</div>
				<div class="form-group">
					上傳薪資表 : <input id="file" name="file" type="file">
				</div>
				<input id="submit" name="submit" type="submit" value="開始上傳" class="btn btn-default">
			</form>
			</div>
		</div>
			
		</div>
	</body>
</html>