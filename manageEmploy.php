<?php
@session_start();
$err = "";
$showSearch=false;
include('function/Mysql.php');
	include('function/User.php');
	$Users = new User(new Mysql());
if($_GET['Action'] == "Logout")
{
	session_destroy();
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
      //新增帳號
    if(isset($_POST['newAccount'])){
        $isRightForm = false;
	   $acc = $_POST['newAccount'];
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
    //搜尋帳號
    else{
        //if(isset($_POST['searchWord']))
        $showSearch=true;
    }

}
else if($_SERVER['REQUEST_METHOD'] == 'GET'&&isset($_GET['action'])&&isset($_GET['account'])){
    $act=$_GET['action'];
    $acc=$_GET['account'];
    //edit
    if($act==1){
        $Users->UpdateAccount($acc);
    }
    //delete
    else{
        $Users->DeleteAccount($acc);
         echo "<script type='text/javascript'>alert('success');</script>";
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
		<link rel="stylesheet" href="css/footer.css" type="text/css">

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
					 <form method="POST" action="manageEmploy.php" style="margin:0px">
					<div class="col-lg-5">
						<div class="input-group">
                            
							<input type="text" name="searchWord" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default">
									Search!
                                </button>
							</span>
                            
						</div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
                    </form>
                    <form method="POST" action="manageEmploy.php" style="margin:0px">
					<div class="col-lg-5">
					    <input type="text" name="newAccount" class="form-control" placeholder="account">
                    </div>
                        <button id="btn" class="btn btn-primary">
						    新增員工
					    </button>
                    </form>
				</div><!-- /.row -->
                
				<h2>
					Employee
				</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>
								Employee ID
							</th>
							<th>
								Delete
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                        if($showSearch){
                            $Users->SearchUser($_POST['searchWord']);
                        }
                        else{
                            $Users->GetAll();
                        }
                        $row=0;
						while($Users->HasNext())
				        {
							$acc= $Users->UserAccount;
                            echo '<tr>
							 <td>'.$acc.'</td>
							 <td>
							 <a href=manageEmploy.php?action=2&account=' . $acc .'  class="btn btn-default glyphicon glyphicon-trash"></a>
							 </td>
							 </tr>';
                            $row++;
				        }
                        
						?>
					</tbody>
				</table>
                    <?php 
                        //no information
                        if($row==0){
                            echo "<script type='text/javascript'>alert('Cannot find this account');</script>";
                        }
                        if($showSearch){
                            echo"<button id=btn class=btn btn-primary onclick=location.href='manageEmploy.php'>
						    back
					       </button>";
                        }
                        
                    ?>
			</div>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>