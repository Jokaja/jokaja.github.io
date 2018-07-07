<div class="card-header">
	<center><h2>Customers</h2></center>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
          <tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>address</th>
						<th>location</th>
						<th>nationality</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>address</th>
						<th>location</th>
						<th>nationality</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT id,fname,lname,uname,email,phone,address,location,nationality,role FROM users WHERE role='customer'");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td id="uid" class="cl"><?php echo $row['id']; ?></td>
      <td><?php echo $row['uname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['location']; ?></td>
      <td><?php echo $row['nationality']; ?></td>
    </tr>
  <?php
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
