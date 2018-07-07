<div class="card-header">
	<h2>Drivers</h2>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
					<tr>
            <th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Phone</th>
						<th>License</th>
						<th>Truck_no</th>
						<th>Location</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Phone</th>
						<th>License</th>
						<th>Truck_no</th>
						<th>Location</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT d_id,fname,lname,phone,license,t_no,location FROM drivers");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td id="uid" class="cl"><?php echo $row['d_id']; ?></td>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['license']; ?></td>
      <td><?php echo $row['t_no']; ?></td>
      <td><?php echo $row['location']; ?></td>
    </tr>
  <?php
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
