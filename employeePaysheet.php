<h2>
	Pay Sheet Download
</h2>
<p>
	The pay sheet table:
</p>
<table class="table table-striped">
	<thead>
		<tr>
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
		$Paysheets->GetByAccount($_SESSION['Account']);
		while($Paysheets->HasNext())
		{
			$fileName = $Paysheets->FileName;
			$year = explode("-", $fileName);
			$month = explode(".", $year[2]);
			echo '<tr>
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
		?>
	</tbody>
</table>