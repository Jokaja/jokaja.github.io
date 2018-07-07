<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome - <?php echo $userRow['uname']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--routing issues-->
<?php
if (isset($_GET["p"])){
	$page=$_GET["p"];
	if ($page=="hom"){
		$main_content="pages2/hom.php";
	}elseif ($page=="comments") {
		$main_content="pages2/comments.php";
	}elseif ($page=="about") {
		$main_content="pages2/about.php";
	}elseif ($page=="order") {
		$main_content="pages2/order.php";
	}elseif ($page=="payment") {
		$main_content="pages2/payment.php";
	}elseif ($page=="profile") {
		$main_content="pages2/profile.php";
	}elseif ($page=="msg") {
		$main_content="pages2/msg.php";
	}elseif ($page=="pass") {
		$main_content="pass.php";
	}
}else{
	$main_content="pages2/hom.php";
}
?>



</head>
<body class="body">
<div class="col-md-12">
	<nav class="navbar navbar-deff navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="?p=hom" style="color:white;"><b>COMMODITY TRANSIT CENTER |</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
						<li class=""><a href="?p=hom"><span class="glyphicon glyphicon-home">&nbsp;|&nbsp;home</span></a></li>
						<li class=""><a href="?p=order"><span class="glyphicon glyphicon-send">&nbsp;|&nbsp;order</span></a></li>
						<li class=""><a href="?p=comments"><span class="glyphicon glyphicon-comment">&nbsp;|&nbsp;Comment</span></a></li>
            <li class=""><a href="?p=about"><span class="glyphicon glyphicon-certificate">&nbsp;|&nbsp;About</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
						<li>
							<a href="?p=msg">&nbsp;
								<?php

							$cc = $userRow['uname'];
							$yy = 'customers';

							if ($result = $mysqli->query("SELECT * FROM reply WHERE cstm ='$cc' OR cstm = '$yy'")) {

									/* determine number of rows result set */
									$row_cnt = $result->num_rows;
								printf(" %d \n", $row_cnt);

									/* close result set */
									$result->close();
							}
							 ?><span class="glyphicon glyphicon-envelope"></span></a>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  				<span class="glyphicon glyphicon-cog"></span>&nbsp;<?php echo $userRow['uname']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
								<li>
									<a href="?p=order">
										<?php

									$cc = $_SESSION['user'];

									if ($result = $mysqli->query("SELECT * FROM orders WHERE id='$cc'")) {

											/* determine number of rows result set */
											$row_cnt = $result->num_rows;
										printf(" %d Orders made\n", $row_cnt);

											/* close result set */
											$result->close();
									}
									 ?></a>
								</li>
								<li><a href="?p=profile"><span class="glyphicon glyphicon-edit"></span>&nbsp;Profile</a></li>
                <li><a href="?p=about"><span class="glyphicon glyphicon-certificate"></span>&nbsp;Help</a></li>
								<li><a href="?p=pass"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change password</a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br><br>
</div>

<!--xxxxxxxxxxxxxxxxxxxxxx-->
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
							?>

							<?php
								if ($image_src2 == "") {
								?><img class="img-circle" src="images/avater3.png" alt="" style="height:30%; width:80%;"><?php
							}else {
								?><img class="img-circle" src="<?php echo $image_src2; ?>" alt="" style="height:200px; width:170px;"><?php
							}
							 ?>
							<?php include('pages2/image.php'); ?>
								<i><b><u><h3><?php echo $userRow['uname']?>'s Profile</h3></u></b></i>
					      <h4><code><span class="glyphicon glyphicon-user"></span></code>&nbsp;&nbsp;<?php echo $userRow['fname']?>&nbsp;&nbsp;<?php echo $userRow['lname']?></h4>
					      <h4><code><span class="glyphicon glyphicon-phone"></span></code>&nbsp;&nbsp; <?php echo $userRow['phone']?></h4>
					      <h4><code><span class="glyphicon glyphicon-envelope"></span></code>&nbsp;&nbsp; <?php echo $userRow['email']?></h4>
					      <h4><code><span class="glyphicon glyphicon-map-marker"></span></code>&nbsp;&nbsp; <?php echo $userRow['location']?></h4>
								<h4><code><a href="?p=profile"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Profile</a></code>
								</h4>
					  </div>
					<br><br>
					</div>
				</div>

<!--change-->
