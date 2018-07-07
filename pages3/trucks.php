<div class="card-header">
	<center><h2>Trucks</h2></center>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
					<tr>
            <th>ID</th>
						<th>Truck name</th>
						<th>Truck No</th>
						<th>Location</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Truck name</th>
						<th>Truck No</th>
						<th>Location</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT t_id,t_name,t_no,t_location FROM trucks");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td id="uid" class="cl"><?php echo $row['t_id']; ?></td>
      <td><?php echo $row['t_name']; ?></td>
      <td><?php echo $row['t_no']; ?></td>
      <td><?php echo $row['t_location']; ?></td>
    </tr>
  <?php
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
