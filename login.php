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
			header("Location:paysheet.php");
			die();
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
		<script src="js/login.js">
		</script>
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/login.css" type="text/css">

	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">
						Toggle navigation
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
				</button>
				<a class="navbar-brand" href="login.php">
					<b>
						人事薪資系統
					</b>
				</a>
			</div>
		</nav>
		<!-- Where all the magic happens -->
		<!-- LOGIN FORM -->
		<div class="text-center" style="padding:50px 0">
			<div class="logo">
				login
			</div>
			<!-- Main Form -->
			<div class="login-form-1">
				<form id="login-form" class="text-left" action="login.php" method="POST">
					<div class="login-form-main-message">
					</div>
					<div class="main-login-form">
						<div class="login-group">
							<div class="form-group">
								<input type="text" class="form-control" name="account" placeholder="account" required="" value="n123456789">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="password" required="" value="6789">
							</div>
							<div class="form-group login-group-checkbox">
								<input type="radio" class="" name="role" value="employee" id="employee" checked="">
								<label for="employee">
									Employee
								</label>

								<input type="radio" class="" name="role" value="admin" id="admin">
								<label for="admin">
									Admin
								</label>
							</div>
							<div class="form-group">
								<font color="red">
									<? echo $err;?>
								</font>
							</div>
						</div>

						<button type="submit" class="login-button">
							<i class="fa fa-chevron-right">
							</i>
						</button>
					</div>
					
				</form>
			</div>
			<!-- end:Main Form -->
		</div>
	</body>
</html>