<?php
$admin = $userRow['uname'];

	if (isset($_POST['submit'])) {
		$rcv = $_POST['reciver'];
		$txt = $_POST['textarea'];

		$role = $userRow['role'];
		$query = "INSERT INTO reply(cstm,admn,txt,role) VALUES('$rcv','$admin','$txt','$role')";
	$res = mysqli_query($conn, $query);

	if ($res) {
		$errTyp = "success";
		$errMSG = " Message Sent to ".$rcv.".";
	} else {
		$errTyp = "danger";
		$errMSG = "Message Not Sent";
	}
}
 ?>


<div class="card-header">
	<h2>Messages sent</h2>
</div>
<div class="tblz">
  <div style="float:right" class="col-md-3">
  <button class="btn btn-success" onclick="document.getElementById('id011').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-send"></span></button>
  </div>
  <div class="alert alert-info-sign">
    <?php echo $errMSG; ?>
  </div>
	<div class="col-md-9">
		<div class="card-body">
			<table class="table table-bordered">
        <thead>
					<tr>
						<th>Reciver</th>
						<th>Message</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
            <th>Reciver</th>
						<th>Message</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>

<?php require('main.php');

$query = $mysqli->query("SELECT * FROM reply");
while($row = $query->fetch_assoc()){
  ?>
    <tr>
      <td><?php echo $row['cstm']; ?></td>
      <td><?php echo $row['txt']; ?></td>
      <td><?php echo $row['r_tm']; ?></td>
      <td class="cl">
        <a onclick="return confirm('Are You Sure?')" href="rply.php?idd=<?php echo $row['r_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
  <?php
  }
  if(isset($_GET['idd'])){
    $idd = $_GET['idd'];
    $result = $mysqli->query("DELETE FROM reply WHERE r_id='$idd'");
    if($result){
      ?>
      <script>
        alert("Message Deleted successfuly");
        window.location.href='http://localhost/www.ctc.com/pages/admin.php?p=trucks';
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Failed to delete Message")
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

<script type="text/javascript">
  function check(){
   if(document.getElementById('reciver').value==""){
        alert('Reciver required');
        document.getElementById('reciver').focus();
        return false;
      }else if (document.getElementById('textarea').value=="") {
        alert('Empty Message');
        document.getElementById('textarea').focus();
        return false;
      }else {
        return true;
}
  }
</script>

<!--Message-->
<div class="container">
<link rel="stylesheet" href="../styles.css">
<div id="id011" class="modal">

 <div class="modal-content animate">
   <table border="1px">
     <form class="table table-bordered" method="post" action="?p=rply" onsubmit="return check();">
         <div class="bgc">
           <div class="">
           </div>
           <div class="form-header">
             <h2>Reply</h2>
           </div>
         </div>
       <label for="" style="color:black;">Send To:<input type="text" name="reciver" id="reciver" value=""></label>
       <div class="form-body">
         <textarea style="color:black; border-radius: 5px;" name="textarea" id="textarea" rows="6" cols="64" placeholder="Enter your message" class="textarea"></textarea>
       </div>

         <center>
           <div class="cancelbtn">
               <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span></button>
               <button type="button" class="btn btn-danger" onclick="document.getElementById('id011').style.display='none'"><span class="glyphicon glyphicon-remove"></span></button>
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
