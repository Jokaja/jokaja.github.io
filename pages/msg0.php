<div class="">
	<div class="card-header">
		<b><h2>Inbox</h2></b>
	</div>
	<div class="tblz">
		<div class="col-md-9">
			<div class="card-body">
				<table class="table table-bordered">
	        <thead style="background-color:orange; opacity:0.7;color:black;">
						<tr>
							<th>From</th>
							<th>Message</th>
							<th>Time</th>
							<th>Role</th>
						</tr>
					</thead>
					<tfoot style="background-color:orange; opacity:0.7;color:black;">
						<tr>
	            <th>From</th>
							<th>Message</th>
							<th>Time</th>
							<th>Role</th>
						</tr>
					</tfoot>
					<tbody>

	<?php require('main.php');
	$cc = $userRow['uname'];
	$yy = 'customers';
	$query = $mysqli->query("SELECT * FROM reply WHERE cstm ='$cc' OR cstm='$yy'");
	while($row = $query->fetch_assoc()){
	  ?>
	    <tr style="background-color:black; opacity:0.7;">
	      <td><?php echo $row['admn']; ?></td>
	      <td><?php echo $row['txt']; ?></td>
	      <td><?php echo $row['r_tm']; ?></td>
	      <td><?php echo $row['role']; ?></td>
	    </tr>
	    <?php
	  }

	 ?>
	</tbody>
	</table>
	</div>
	</div>
	</div>
</div>
