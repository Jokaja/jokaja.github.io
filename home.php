<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>

<?php require("includes/header.php"); ?>
	<!--<div id="wrapper">-->
		<?php
		// main contets
		if(isset($main_content)) {
			require ($main_content);
		}
		 ?>
		 <!--</div>-->
				<?php require("includes/footer.php"); ?>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
