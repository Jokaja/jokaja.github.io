<?php
	ob_start();
	session_start();
	require_once '../dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>
<style media="screen">
body{
	background-image: url('../images/back2.jpg');
	color: white;
}
</style>
<?php
if (isset($_POST['ps'])) {
	$pass = trim($_POST['ps']);
	$confi = hash('sha256', $pass);

	$xx=$userRow['pass'];
	$yy=$confi;

	if ($xx != $yy) {
		$errMSG = "Invalid Password";
	}else {
		header('Location:../home.php');
	}
}
 ?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="../style.css">
<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<div class="container">
  <div class="col-md-8 col-md-offset-3">
  <div class="panel-group">
    <div class="formz">
    <div class="panel panel-info">
      <div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:95%">
			<marquee><b>95% complete</b></marquee>
      </div>
		</div>
			<?php
if ( isset($errMSG) ) {

	?>
	<div class="form-group">
				<div class="alert alert-danger">
	<span class="glyphicon glyphicon-info-sign"></span><?php echo $errMSG; ?>
					</div>
				</div>
					<?php
}
	?>
      <div class="panel-heading">
				<center><h2>Finishing Payments</h2><center>
			</div>
      <div class="panel-body">
        <div class="">
          <h2>Commodity transit center (CTC) With the company number 1234 is taking Amount from your mobile Account. Enter the your Password Below to Confirm.</h2>
          <form class="form-group" action="" method="post">
						<input type="password" name="ps" id="ps" value="" placeholder="Confirm With Your Password">
						<div class="" style="float:right;">
							<div class="btn">
	            	<input type="submit" name="confirm" value="confirm" class="btn btn-success">
	            </div>
							<div class="btn">
								<a href="../home.php"><button type="button" name="button" class="btn btn-danger">Cancel</button></a>
							</div>
						</div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
