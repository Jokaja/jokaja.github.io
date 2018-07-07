<?php
if ( isset($errMSG) ) {

?>
<div class="form-group">
	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
		</div>
	</div>
		<?php
}
?>

<div class="card-header">
<b><h2>Drivers</h2></b>
</div>
<div style="float:right" class="col-md-3">
	<?php require('add_drivers.php') ?>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
					<tr>
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
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['license']; ?></td>
      <td><?php echo $row['t_no']; ?></td>
      <td><?php echo $row['location']; ?></td>
      <td class="cl">
        <a onclick="return confirm('Are You Sure?')" href="drivers.php?idd=<?php echo $row['d_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  <?php
  }
  if(isset($_GET['idd'])){
    $idd = $_GET['idd'];
    $result = $mysqli->query("DELETE FROM drivers WHERE d_id='$idd'");
    if($result){
      ?>
      <script>
        alert("Driver Deleted successfuly");
        window.location.href='http://localhost/www.ctc.com/pages/admin.php?p=drivers';
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
