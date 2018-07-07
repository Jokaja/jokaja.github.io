<?php
	ob_start();
	session_start();
	require_once '../dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: ../index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysqli_query($conn,"SELECT * FROM Users WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin - <?php echo $userRow['uname']; ?></title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../style.css" type="text/css" />
<link rel="stylesheet" href="../styles.css" type="text/css" />



<!--routing issues-->
<?php
if (isset($_GET["p"])){
	$page=$_GET["p"];
	if ($page=="adhome"){
		$main_content="adhome.php";
	}elseif ($page=="orders") {
		$main_content="orders.php";
	}elseif ($page=="customers") {
		$main_content="customers.php";
	}elseif ($page=="comments") {
		$main_content="comments.php";
	}elseif ($page=="drivers") {
		$main_content="drivers.php";
	}elseif ($page=="trucks") {
		$main_content="trucks.php";
	}elseif ($page=="users") {
		$main_content="users.php";
	}elseif ($page=="rply") {
		$main_content="rply.php";
	}elseif ($page=="pass") {
		$main_content="../pass.php";
	}elseif ($page=="msg") {
		$main_content="msg.php";
	}
}else{
	$main_content="adhome.php";
}
?>


</head>
<body class="back3">
<div class="container">
	<div class="col-md-12">
		<nav class="navbar navbar-deff navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="?p=adhome" style="color:white;"><b>COMMODITY TRANSIT CENTER |</b></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="?p=adhome" class="glyphicon glyphicon-home"></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="?p=msg" class="top">&nbsp;
									<?php

								if ($result = $mysqli->query("SELECT * FROM reply WHERE cstm ='manager'")) {

										/* determine number of rows result set */
										$row_cnt = $result->num_rows;
									printf(" %d \n", $row_cnt);

										/* close result set */
										$result->close();
								}
								 ?><span class="glyphicon glyphicon-envelope"></span></a>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-user"></span>&nbsp;<b><?php echo $userRow['uname']; ?></b>&nbsp;<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?p=rply"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Sent Message</a></li>
									<li><a href="?p=drivers"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Add Driver</a></li>
									<li><a href="?p=trucks"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Add Truck</a></li>
									<li><a href="?p=pass"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change password</a></li>
									<li><a href="../logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
								</ul>
							</li>
						</ul>
						<div class="navbar navbar-brand navbar-right orange">
								<?php require('top.php'); ?>
						</div>
					</div><!--/.nav-collapse -->
				</div>
			</nav><br><br>
	</div>
</div>
		<!--sidebar-->

		</div>
	<div id="wrapper">

	<div class="">
		<div class="col-md-12">
						<div class="col-md-3">
							<div class="nav-container navbar-left">
								<div class="sidenav">
									<?php
									$num = $userRow['id'];
									 $sql = "select profile from users where id=".$num;
									 $result = mysqli_query($conn,$sql);
									 $row = mysqli_fetch_array($result);

									 $image_src2 = $row['profile'];

										if ($image_src2 == "") {
										?><img class="img-circle" src="../images/avater3.png" alt="" style="height:30%; width:80%;"><?php
									}else {
										?><img class="img-circle" src="<?php echo $image_src2; ?>" alt="" style="height:200px; width:170px;"><?php
									}
									 ?>
									<?php include('image.php'); ?>
										<i><b><u><h3><?php echo $userRow['uname']?>'s Profile</h3></u></b></i>
										<h4><code><b>User Name:</b></code>&nbsp;&nbsp; <?php echo $userRow['uname']?></h4>
										<h4><code><b>Full Name:</b></code>&nbsp;&nbsp;<?php echo $userRow['fname']?>&nbsp;&nbsp;<?php echo $userRow['lname']?></h4>
										<h4><code><b>Phone:</b></code>&nbsp;&nbsp; <?php echo $userRow['phone']?></h4>
										<h4><code><b>Email:</b></code>&nbsp;&nbsp; <?php echo $userRow['email']?></h4>
										<h4><code><b>Location:</b></code>&nbsp;&nbsp; <?php echo $userRow['location']?></h4>
										<h4><code><b>Role :</b></code>&nbsp;&nbsp; <?php echo $userRow['role']?></h4>
								</div>
							<br><br>
							</div>
						</div>
