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
	</body>
</html>