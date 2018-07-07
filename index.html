<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}

	$error = false;

	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$uname = trim($_POST['uname']);
		$uname = strip_tags($uname);
		$uname = htmlspecialchars($uname);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs

		if(empty($uname)){
			$error = true;
			$unameError = "Please enter your username.";
		}

		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}

		// if there's no error, continue to login
		if (!$error) {

			$password = hash('sha256', $pass); // password hashing using SHA256
			//die($password);
			$res=mysqli_query($conn, "SELECT id, uname, email, phone, location, role, pass FROM users WHERE uname='$uname'");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && ($row['pass']==$password) ) {
				$_SESSION['user'] = $row['id'];
				$_SESSION['user_role'] = $row['role'];
				//header("Location: home.php");


				$multirole = $row["role"];
				switch($multirole){
					case "Admin":
						header("Location: pages/admin.php");
						break;

					case "customer":
						header("Location: home.php");
						break;

					case "manager":
						header("Location: pages3/manager.php");
						break;

					default:
						header("Location: home.php");
				}



			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}

		}

	}


?>

<?php require("includes/fheader.php") ?>

<div class="container">
	<div class="col-md-12">
		<div class="jumbotron" style="color:black">
			<h1 class="heads">COMMODITY TRANSIT CENTER</h1>
		</div>
	</div>
	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

    	<div class="col-md-12">

            <?php
			if ( isset($errMSG) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}else{
				?>
				<div class="form-group">
							<div class="alert alert-success">
				<span class="glyphicon glyphicon-info-sign"></span>
						<center><p style="color: black">You may login Now if you ready have Account</p></center>
								</div>
							</div>
								<?php
			}
			?>


						<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="uname" class="form-control" placeholder="Username" value="<?php echo $uname; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $unameError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;  login</button>
            </div>

            <div class="form-group">
            	<hr />
            </div>

            <div class="form-group">
							<button type="button" name="button" class="btn"><a href="register.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Sign Up</a></button>
            </div>

        </div>

    </form>
    </div>

</div>
</body>
</html>
<?php ob_end_flush(); ?>
