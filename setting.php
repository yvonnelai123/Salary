<?php
session_start();
$err = "";
if($_GET['Action'] == "Logout"){
	session_destroy();
}
else if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /*
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
    */
    if(isset($_POST['password'])&& isset( $_POST['confirm'])&& $_POST['password'] == $_POST['confirm']){
        include('function/Mysql.php');
        include('function/User.php');
        $Users = new User(new Mysql());
        $Users->UpdatePassword($_SESSION['Account'], $_POST['password']);  
        header('Location: paysheet.php');
    }
    else{
        echo "<script type='text/javascript'>alert('confirming password fails');</script>";
        
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
		<link rel="stylesheet" href="css/login.css" type="text/css">
        
		

	</head>
	<body>
	<?php include("header.php"); ?>
		<!-- Where all the magic happens -->
		<!-- LOGIN FORM -->
		<div class="text-center" style="padding:50px 0">
			<div class="logo">
				setting
			</div>
			<!-- Main Form -->
			<div class="login-form-1">
				<form id="login-form" class="text-left" action="setting.php" method="POST">
					<div class="login-form-main-message">
					</div>
					<div class="main-login-form">
						<div class="login-group">
							<div class="form-group">
							    <?php 
                                    $acc=$_SESSION['Account'];
                                    echo "<input type=text class=form-control name=account value=\"$acc\" readonly=readonly>";
                                ?>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="password" name="password"  required="" >
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="confirm" name="confirm"  required="" >
							</div>
							<div class="form-group">
								<font color="red">
									<?php echo $err;?>
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