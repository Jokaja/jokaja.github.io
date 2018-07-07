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
						<th>Action</th>
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
						<th>Action</th>
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
      <td class="cl">
        <a onclick="return confirm('Are You Sure?')" href="users.php?idd=<?php echo $row['id']?>" class="btn btn-danger">delete</a>
      </td>
    </tr>
  <?php
  }
  if(isset($_GET['idd'])){
    $idd = $_GET['idd'];
    $result = $mysqli->query("DELETE FROM drivers WHERE id='$idd'");
    if($result){
      ?>
      <script>
        alert("Driver Deleted successfuly");
        window.location.href='http://localhost/part2/pages/admin.php?p=users';
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Failed to delete driver")
      </script>
      <?php
    }
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
