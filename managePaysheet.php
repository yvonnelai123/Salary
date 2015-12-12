<ul class="nav nav-tabs">
	<li role="presentation" class="active">
		<a href="paysheet.php">
			Paysheet
		</a>
	</li>
	<li role="presentation">
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
			新增薪資表
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
					Year
				</th>
				<th>
					Month
				</th>
				<th>
					Download
				</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$Users->GetAll();
			while($Users->HasNext()){
				$Paysheets->GetByAccount($Users->UserAccount);
				while($Paysheets->HasNext())
				{
					$fileName = $Paysheets->FileName;
					$year     = explode("-", $fileName);
					$month    = explode(".", $year[2]);
					echo '<tr>
					<td>'.$Users->UserAccount.'</td>
					<td>
					'.$year[1].'
					</td>
					<td>
					'.$month[0].'
					</td>
					<td>
					<a href="file/'.$fileName.'">'.$fileName.'</a>
					</td>
					</tr>';
				}
			}
			?>
		</tbody>
	</table>

	<div id="dialog">
		<form action="paysheet.php" enctype="multipart/form-data" method="post">
			<div class="form-box">
				<div class="upload">
					Employee Account :
				</div>
				<div class="dropdown-box">
					<select class="form-control" name="account" required="">
						<option value="N123456789">
							N123456789
						</option>

					</select>
				</div>
			</div>
			<div class="form-box">
				<div class="upload">
					Year & Month :
				</div>
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
				<input id="cancel" type="button" value="取消" class="btn btn-primary">
			</div>
		</form>
	</div>
	<!-- <div id="addPaysheet" class="upload-box panel panel-default">
	<div class="panel-heading">
	Upload File
	</div>
	<div class="panel-body">
	<form action="paysheet.php" enctype="multipart/form-data" method="post">
	<div class="form-box">
	<div class="upload">
	Employee Account :
	</div>
	<div class="dropdown-box">
	<select class="form-control" name="account" required="">
	<option value="N123456789">
	N123456789
	</option>

	</select>
	</div>
	</div>
	<div class="form-box">
	<div class="upload">
	Year & Month :
	</div>
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
	</div>-->
</div>