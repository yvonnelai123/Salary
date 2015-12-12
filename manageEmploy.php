<?php
@session_start();
$err = "";
include('function/Mysql.php');
	include('function/User.php');
	$Users = new User(new Mysql());
if($_GET['Action'] == "Logout")
{
	session_destroy();
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
	/*if($_POST['role'] == 'employee')
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
	elseif($_POST['role'] == 'admin')
	{
	if($_POST['account'] == 'admin' && $_POST['password'] == 'admin')
	{
	$_SESSION['Account'] = $_POST['account'];
	header("Location:paysheet.php");
	die();
	}
	else
	$err = "帳號或密碼錯誤!";
	}*/
	$isRightForm = false;
	$acc     = $_POST['account'];
	//check account is in right form
	$pattern = '[A-Z][12][0-9]{8}';
	if(eregi($pattern, $acc) && strlen($acc) == 10)
	{
		$pw    = substr($acc, - 4);
		$Users->Insert($acc,$pw);
		echo "<script type='text/javascript'>alert('success');</script>";
	}

	else
	{
		echo "<script type='text/javascript'>alert('The format of account is wrong!');</script>";
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
		<?php include("header.php"); ?>
		<div class="contain">
			<ul class="nav nav-tabs">
				<li role="presentation" >
					<a href="paysheet.php">
						Paysheet
					</a>
				</li>
				<li role="presentation"  class="active">
					<a href="manageEmploy.php">
						Employee
					</a>
				</li>
			</ul>

			<div class="contain-box">
				<div class="row">
					
					<div class="col-lg-6">
						<div class="input-group">

							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									Search!
								</button>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
					<button id="btn" class="btn btn-primary">
						新增員工
					</button>
				</div><!-- /.row -->

				<h2>
					Paysheet
				</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>
								Employee
							</th>
							<th>
								Modify
							</th>
							<th>
								Delete
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$Users->GetAll();
						while($Users->HasNext())
						{
							echo '<tr>
							<td>'.$Users->UserAccount.'</td>
							<td>
							<a href="#">修改</a>
							</td>
							<td>
							<a href="#"刪除></a>
							</td>
							</tr>';
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</body>
</html>