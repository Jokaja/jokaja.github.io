<?php
	$error = false;

	if ( isset($_POST['submit']) ) {

		// clean user inputs to prevent sql injections
		$fname = trim($_POST['fname']);
		$fname = strip_tags($fname);
		$fname = htmlspecialchars($fname);

		$lname = trim($_POST['lname']);
		$lname = strip_tags($lname);
		$lname = htmlspecialchars($lname);

		$uname = trim($_POST['uname']);
		$uname = strip_tags($uname);
		$uname = htmlspecialchars($uname);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$phone = trim($_POST['phone']);
		$phone = strip_tags($phone);
		$phone = htmlspecialchars($phone);

		$address = trim($_POST['address']);
		$address = strip_tags($address);
		$address = htmlspecialchars($address);

		$location = trim($_POST['location']);
		$location = strip_tags($location);
		$location = htmlspecialchars($location);

		$nationality = trim($_POST['nationality']);
		$nationality = strip_tags($nationality);
		$nationality = htmlspecialchars($nationality);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		// basic names validation
		if (empty($fname)) {
			$error = true;
			$fnameError = "Please enter your First name.";
		} else if (strlen($fname) < 3) {
			$error = true;
			$fnameError = "Name must have atleast 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
			$error = true;
			$fnameError = "Name must contain alphabets and space.";
		}

		if (empty($lname)) {
			$error = true;
			$lnameError = "Please enter your last name.";
		} else if (strlen($lname) < 3) {
			$error = true;
			$lnameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
			$error = true;
			$lnameError = "Name must contain alphabets and space.";
		}

		if (empty($uname)) {
			$error = true;
			$unameError = "Please enter your Username.";
		} else if (strlen($uname) < 3) {
			$error = true;
			$unameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$uname)) {
			$error = true;
			$unameError = "Name must contain alphabets and space.";
		}

		if (empty($phone)) {
			$error = true;
			$phoneError = "Please enter your phone number.";
		} else if (strlen($phone) < 10) {
			$error = true;
			$phoneError = "Phone numbers contains Altist 10 numbers";
		} else if (!preg_match("/^[0-9]+$/",$phone)) {
			$error = true;
			$phoneError = "phone number Contains Alphabets";
		}

		if (empty($location)) {
			$error = true;
			$locationError = "Please enter your Region.";
		} else if (strlen($location) < 3) {
			$error = true;
			$locationError = "No such Region In Tanzania";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$location)) {
			$error = true;
			$locationError = "Name must contain alphabets and space.";
		}

		if (empty($nationality)) {
			$error = true;
			$nationalityError = "Please enter your nationality.";
		} else if (strlen($nationality) < 3) {
			$error = true;
			$nationalityError = "We can not be sure of you.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$nationality)) {
			$error = true;
			$nationalityError = "Name must contain alphabets";
		}else if ($nationality != "Tanzania") {
			$error = true;
			$nationalityError = "You are to far to Enjoy our Servises";
		}

		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = ("SELECT email FROM users WHERE email='$email'");
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}

		// password encrypt using SHA256();
		$pass = hash('sha256', $pass);

		// if there's no error, continue to signup
		if( !$error ) {

			$query = "INSERT INTO users(fname,lname,uname,email,phone,address,location,nationality,role,pass) VALUES('$fname','$lname','$uname','$email','$phone','$address','$location','$nationality','Admin','$pass')";
			$res = mysqli_query($conn, $query);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($fname);
				unset($lname);
				unset($uname);
				unset($email);
				unset($phone);
				unset($address);
				unset($location);
				unset($nationality);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}

		}


	}
?>

<div class="col-md-9">
  <div class="panel">
    <div class="panel-heading">
		<center>	<?php
	if ( isset($errMSG) ) {

	?>
	<div class="form-group">
				<div class="alert alert-danger">
	<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
					</div>
				</div>
					<?php
	}
	?>
      <h2 style="color:black;">Add Administrator</h2></center>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
          <form class="" action="" method="post">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
              <input type="text" name="fname" class="form-control" placeholder="First Name" maxlength="50" value="<?php echo $fname ?>" />
              </span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
              <input type="text" name="lname" class="form-control" placeholder="Last Name" maxlength="50" value="<?php echo $lname ?>" />
              </span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
              <input type="text" name="uname" class="form-control" placeholder="Username" maxlength="50" value="<?php echo $uname ?>" />
                </div>
                </span>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
              <input type="email" name="email" class="form-control" placeholder="Email" maxlength="40" value="<?php echo $email ?>" />
              </span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
              <input type="text" name="phone" class="form-control" placeholder="Phone: eg. 0764791031" maxlength="50" value="<?php echo $phone ?>" />
              </span>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
              <input type="text" name="address" class="form-control" placeholder="Address: eg. P.O.Box 43" maxlength="50" value="<?php echo $address ?>" />
              </span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
              <input type="text" name="location" class="form-control" placeholder="Location in Tanzania" maxlength="50" value="<?php echo $location ?>" />
                </span>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
              <input type="text" name="nationality" class="form-control" placeholder="Your Nation" maxlength="50" value="<?php echo $nationality ?>" />
                </span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
              <input type="password" name="pass" class="form-control" placeholder="Password" maxlength="15" value=""/>
                </span>
                </div>
            </div>
            <div class="input-group-addon">
              <div class="form-group">
                <div style="float: right;">
                  <button type="submit" class="btn btn-warning glyphicon glyphicon-plus" name="submit">&nbsp;Add Administrator</button>
                </div>
              </div>
            </div>
        </div>
          </form>
        </tbody>
      </table>
    </div>
  </div>
</div>
