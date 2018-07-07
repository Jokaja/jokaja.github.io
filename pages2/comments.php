<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="../style.css">
<?php
	ob_start();
	session_start();
	require('dbconnect.php');

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);

	$id = $userRow['id'];
	$sender = $userRow['uname'];

function send_msg($id,$sender, $message, $conn){

	if(!empty($sender) && !empty($message)){
		$sender = mysqli_real_escape_string($conn,$sender);
		$message = mysqli_real_escape_string($conn,$message);

		$query = "INSERT INTO comments(id,uname,msg) VALUES('{$id}','{$sender}','$message')";


		if($run = mysqli_query($conn,$query)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}

}



if(isset($_POST['send'])){
	$message=$_POST['message'];
	if(send_msg($id,$sender,$message,$conn )){
		$errMSG = 'Comments sent';
	}else{
		$errMSG = 'Comments Not sent.';
	}
}
?>

<br>

<div class="container">
  <div class="col-md-5">
  <div class="panel-group">
    <div class="formy">
    <div class="panel orange">
      <div class="panel-heading">
				<center><h2>
					<div class="header">
						<div class="card-header">
						<b>
					<h2 style="color:black;">Leave Comments Below</h2>
							</h2>
						</b>
					</div>
						</div>
				</h2></center>
			</div>
			<div class="formy">
      <div class="panel-body">
				<p>Dear <b><?php echo $userRow['uname']; ?> </b> you may leave comment about our services below.
				We Hope your comments will make us improve in making you Enyoy
				All that you need.<br>
				<b>CTC we deliver them Better</b></p><hr>
				<form class="" action="" method="post">
					<label for="">Enter Comments:</label><br/>
					<textarea name="message" rows="5" cols="40"></textarea>
					<button type="submit" name="send" class="btn btn-success glyphicon glyphicon-send"></button>
				</form>
	        </div>
      </div>
    </div>
  </div>


<div class="col-md-4">
	<div class="header">
		<div class="card-header">
		<h2>Comments</h2>
	</div>
		</div>
	<div id='messages'>
	<?php require_once('pages2/send.php') ?>
</div>
</div>
</div>
</div>
