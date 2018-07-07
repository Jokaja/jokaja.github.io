<div class="card-header">
	<h2>Trucks</h2>
</div>
<div style="float:right" class="col-md-3">
	<?php require('add_trucks.php') ?>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
					<tr>
						<th>Truck name</th>
						<th>Truck No</th>
						<th>Location</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Truck name</th>
						<th>Truck No</th>
						<th>Location</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT t_id,t_name,t_no,t_location FROM trucks");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td><?php echo $row['t_name']; ?></td>
      <td><?php echo $row['t_no']; ?></td>
      <td><?php echo $row['t_location']; ?></td>
      <td class="cl">
        <a onclick="return confirm('Are You Sure?')" href="trucks.php?idd=<?php echo $row['t_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  <?php
  }
  if(isset($_GET['idd'])){
    $idd = $_GET['idd'];
    $result = $mysqli->query("DELETE FROM trucks WHERE t_id='$idd'");
    if($result){
      ?>
      <script>
        alert("Truck Deleted successfuly");
        window.location.href='http://localhost/www.ctc.com/pages/admin.php?p=trucks';
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Failed to delete Truck")
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
