<?php
	require '../dbconnect.php';
	/*$sql = 'SELECT * FROM users';
	$statement = $connection->prepare($sql);
	$statement->execute();
	$people = $statement->fetchAll(PDO::FETCH_OBJ);
*/ ?>

<div class="container">
	<div class="card mt-7">
		<div class="card-header">
			<b><center><h2>Customer details</h2></center></b>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>address</th>
						<th>location</th>
						<th>nationality</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>address</th>
						<th>location</th>
						<th>nationality</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					$mysqli = new mysqli("localhost","root","","transit");
					if ($mysqli->connect_errno) {
						echo "Failed connect (".$mysqli->connect_errno.")".$mysqli->connect_errno;
					}
					$query = $mysqli->query("SELECT id,fname,lname,uname,email,phone,address,location,nationality,role FROM users");
					while($row = $query->fetch_assoc()){
						?>
							<tr>
								<td id="uid" class="cl"><?php echo $row['id']; ?></td>
								<td><?php echo $row['fname']; ?></td>
								<td><?php echo $row['lname']; ?></td>
								<td><?php echo $row['uname']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['phone']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><?php echo $row['location']; ?></td>
								<td><?php echo $row['nationality']; ?></td>
								<td class="cl">
									<a href="#" class="btn btn-success" onclick="document.getElementById('id011').style.display='block'" style="width:auto;">Message</a>
									<a onclick="return confirm('Are You Sure?')" href="users.php?idd=<?php echo $row['id']?>" class="btn btn-danger">delete</a>
								</td>
							</tr>
						<?php
						}
						if(isset($_GET['idd'])){
							$idd = $_GET['idd'];
							$result = $mysqli->query("DELETE FROM users WHERE id='$idd'");
							if($result){
								?>
								<script>
									alert("Customer Deleted successfuly");
									window.location.href='http://localhost/part2/pages/admin.php?p=users';
								</script>
								<?php
							}else{
								?>
								<script>
									alert("Failed to delete Customer")
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



<!--Message-->
<div class="container">
<link rel="stylesheet" href="../styles.css">
<div id="id011" class="modal">

	<div class="modal-content animate">
		<table border="1px">
			<form class="table table-bordered">
					<div class="bgc">
						<div class="form-header">
							<h2>Send message</h2>
						</div>
					</div>
				<div class="form-body">
					<input type="textarea" name="textarea" value="" placeholder="Enter your message" class="textarea" style="width: 100%; height:90px;">
				</div>

					<center>
						<div class="cancelbtn">
								<button type="submit" class="btn btn-success" onclick="document.getElementById('id011').style.display='none'">Send</button>
								<button type="submit" class="btn btn-danger" onclick="document.getElementById('id011').style.display='none'">Cancel</button>
						</div>
					</center>
				</div>
	</form>
		</table>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// Get the modal
var modal = document.getElementById('id011');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
		if (event.target == modal) {
				modal.style.display = "none";
		}
}
</script>
