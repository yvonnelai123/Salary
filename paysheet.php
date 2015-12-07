<?php
@session_start();
$err = "";
if($_SESSION['Account'] == null){
	header("Location:login.php");
	die();
}
elseif($_SESSION['Account'] == 'admin')
{
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($_FILES['file']['error'] > 0)
		{
			echo '<script>alert("檔案上傳失敗！");</script>';
		}
		elseif(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != 'xlsx')
		{
			echo '<script>alert("檔案格式錯誤！");</script>';
		}
		else
		{
			$fileName = $_POST['account'].'-'.$_POST['date'].'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$fileName);//複製檔案

			include('function/Mysql.php');
			include('function/Paysheet.php');
			$Paysheets= new Paysheet(new Mysql());
			$Paysheets->Insert($_POST['account'], $fileName);
			echo '<script>alert("Success!");</script>';
		}
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
		<?php include("header.php"); ?>
<<<<<<< HEAD
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
=======
>>>>>>> origin/master

		<div class="contain">
			<?php
			if($_SESSION['Account'] == 'admin')
			{
				include("uploadPaysheet.php");
			}
			else
			{

			}
			?>
		</div>
	</body>
</html>