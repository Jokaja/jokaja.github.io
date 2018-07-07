<div class="card-header">
	<h2>Orders made</h2>
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
						<th>Reciver #</th>
            <th>Date</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT * FROM orders");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td id="uid" class="cl"><?php echo $row['o_id']; ?></td>
			<td><?php echo $row['cstm']; ?></td>
      <td><?php echo $row['com']; ?></td>
      <td><?php echo $row['frm']; ?></td>
      <td><?php echo $row['dest']; ?></td>
      <td><?php echo $row['qnty']; ?> Tons</td>
      <td><?php echo $row['rname']; ?></td>
			<td><?php echo $row['rphone'] ?></td>
      <td><?php echo $row['o_date']; ?></td>
    </tr>
  <?php
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
