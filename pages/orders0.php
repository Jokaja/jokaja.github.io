<div class="card-header">
	<h2>Customer Orders made</h2>
</div>
<div class="tblz">
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
            <th>ID</th>
						<th>Customer</th>
						<th>Commodity</th>
						<th>From</th>
						<th>Destination</th>
						<th>Quantity</th>
						<th>Reciver</th>
						<th>Riciver #</th>
            <th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
            <th>ID</th>
						<th>Customer</th>
						<th>Commodity</th>
						<th>From</th>
						<th>Destination</th>
						<th>Quantity</th>
						<th>Reciver</th>
						<th>Riciver #</th>
            <th>Date</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT * FROM orders");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td id="uid" class="cl"><?php echo $row['o_id']; ?></td>
			<td></td>
      <td><?php echo $row['com']; ?></td>
      <td><?php echo $row['frm']; ?></td>
      <td><?php echo $row['dest']; ?></td>
      <td><?php echo $row['qnty']; ?> Tons</td>
      <td><?php echo $row['rname']; ?></td>
			<td><?php echo $row['rphone'] ?></td>
      <td><?php echo $row['o_date']; ?></td>
      <td class="cl">
        <a onclick="return confirm('Are You Sure?')" href="users.php?idd=<?php echo $row['id']?>" class="btn btn-danger">delete</a>
      </td>
    </tr>
  <?php
  }
  if(isset($_GET['idd'])){
    $idd = $_GET['idd'];
    $result = $mysqli->query("DELETE FROM orders WHERE o_id='$idd'");
    if($result){
      ?>
      <script>
        alert("Order Deleted successfuly");
        window.location.href='http://localhost/part2/pages3/admin.php?p=orders';
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Failed to delete Order")
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
