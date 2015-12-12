<?php
@session_start();
$err       = "";

include('function/Mysql.php');
include('function/Paysheet.php');
include('function/User.php');
$db        = new Mysql();
$Paysheets = new Paysheet($db);
$Users     = new User($db);
if($_SESSION['Account'] == null)
{
	header("Location:login.php");
	die();
}
elseif($_SESSION['Account'] == 'admin'){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_FILES['file']['error'] > 0){
			echo '<script>alert("檔案上傳失敗！");</script>';
		}
		elseif(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != 'xlsx' && pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != 'xls'){
			echo '<script>alert("檔案格式錯誤！");</script>';
		}
		else
		{
			$list     = explode("-", $_POST['date']);
			$date     = $list[0].$list[1];
			$fileName = $_POST['account'].'-'.$_POST['date'].'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$fileName);//複製檔案

			$Paysheets->Insert($_POST['account'],$date, $fileName);
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">
		</script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js">
		</script>
		<!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/paysheet.css" type="text/css">
		<script>
			$(function()
				{
					$("#dialog").dialog(
						{
							title: '新增薪資表',
							autoOpen: false,
							bgiframe: true,
							width: 400,
							height: 350,
							modal: true,
							draggable: true,
							resizable: false,
							overlay:
							{
								opacity: 0.7, background: "#FF8899"
							}
						});
					$( "#btn" ).click(function()
						{
							$( "#dialog" ).dialog( "open" );
						});
					$( "#cancel" ).click(function()
						{
							$( "#dialog" ).dialog( "close" );
						});
				});
		</script>

	</head>
	<body>
		<?php include("header.php"); ?>
		<div class="contain">
			<?php
			if($_SESSION['Account'] == 'admin'){
				include("managePaysheet.php");
			}
			else
			{
				include("employeePaysheet.php");
			}
			?>
		</div>
	</body>
</html>