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
	<form action="paysheet.php" method="GET">
		<div class="row">

			<div class="col-lg-4">
				<input type="month" class="form-control" name="date">
			</div><!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<div class="input-group">

					<input type="text" name="acc" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							Search!
						</button>
					</span>
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->

			<button id="btn" type="button" class="btn btn-primary">
				新增薪資表
			</button>
		</div><!-- /.row -->
	</form>
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

			if($_SERVER['REQUEST_METHOD'] == 'GET')
			{

				$list = explode("-", $_GET['date']);
				$date = $list[0].$list[1];
				$Paysheets->SearchByAccount($_GET['acc'], $date);
				outputTable($Paysheets);
			}
			else
			{
				$Users->GetAll();
				while($Users->HasNext())
				{
					$Paysheets->GetByAccount($Users->UserAccount);
					outputTable($Paysheets);
				}
			}
			function outputTable($Paysheets)
			{
				while($Paysheets->HasNext()){
					$fileName = $Paysheets->FileName;
					$year     = explode("-", $fileName);
					$month    = explode(".", $year[2]);
					echo '<tr>
					<td>'.$Paysheets->Account.'</td>
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
						<?php
						$Users->GetAll();
						while($Users->HasNext())
						{
							echo '<option value="'.$Users->UserAccount.'">
							'.$Users->UserAccount.'
							</option>';
						}
						?>
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
</div>