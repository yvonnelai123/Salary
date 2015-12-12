
<ul class="nav nav-tabs">
	<li role="presentation" class="active">
		<a href="#">
			Paysheet
		</a>
	</li>
	<li role="presentation">
		<a href="#">
			Employee
		</a>
	</li>
</ul>
<div class="contain-box">
<button id="btn" >button</button>
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