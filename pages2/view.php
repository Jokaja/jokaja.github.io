<style>
/* The Modal (background) */
.modalz {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 75px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    color: #fff;
}

/* Modal Content */
.modalz-content {
    position: relative;
    background-color: #030303;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modalz-header {
    padding: 2px 16px;
    background-color: #f55;
    color: white;
}

.modalz-body {padding: 2px 16px;}

.modalz-footer {
    padding: 2px 16px;
    background-color: #f55;
    color: white;
}
</style>


<script type="text/javascript">
  function check(){
    if (document.getElementById('pass').value=="") {
      alert('Please enter Password');
    }
  }
</script>

<?php
	if ( isset($_POST['update']) ) {
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

    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
		// basic names validation
		if (empty($fname)) {
			$error = true;
			$fnameError = "Please enter your First name.";
		} else if (strlen($fname) < 3) {
			$error = true;
			$fnameError = "Name must have atleat 3 characters.";
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
		}



    $num = $_SESSION['user'];
		if( !$error ) {


		$password = hash('sha256', $pass); // password hashing using SHA256
		//die($password);
		$res=mysqli_query($conn, "SELECT pass FROM users WHERE id=".$num);
		$row=mysqli_fetch_array($res);
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

    if( $count == 1 && ($row['pass']==$password) ) {

			$query = "UPDATE users SET fname='$fname', lname='$lname', uname='$uname',phone='$phone',address='$address',location='$location',nationality='$nationality' WHERE id=".$num;
			$res = mysqli_query($conn, $query);

			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully updated";
				unset($fname);
				unset($lname);
				unset($uname);
				unset($phone);
				unset($address);
				unset($location);
				unset($nationality);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}
    }else {
      $passError = "Incorrect password";
    }
		}


	}
?>

<!-- The Modal -->
<div id="myModal" class="modalz">

  <!-- Modal content -->
  <div class="modalz-content">
    <div class="modalz-header">
      <span class="close">&times;</span>
      <center><p>Edit Profile</p></center>
    </div>
    <div class="modalz-body">
        <form class="" enctype='multipart/form-data' action="" method="post" class="form form-group" autocomplete="on" onsubmit="return check();">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="fname" class="form-control" value="<?php echo $userRow['fname']?>"/>

                <span class="input-group-addon"></span>
              <input type="text" name="lname" class="form-control" value="<?php echo $userRow['lname']?>" />
              </div>
            </div>


              <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="uname" class="form-control" value="<?php echo $userRow['uname']?>" />
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
              <input type="text" name="phone" class="form-control" value="<?php echo $userRow['phone']?>"/>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              <input type="text" name="address" class="form-control" value="<?php echo $userRow['address']?>"/>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
              <input type="text" name="location" class="form-control" value="<?php echo $userRow['location']?>"/>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
              <input type="text" name="nationality" class="form-control" value="<?php echo $userRow['nationality']?>"/>
                </div>
            </div>
            <div class="form-group">
              <hr />
            </div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" id="pass" class="form-control" placeholder="Password" maxlength="15" value="<?php echo $pass ?>"/>
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>

            </div>
          <div class="form-group">
            <hr />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-warning" name="update">Edit</button>
          </div>
        </form>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtnz");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
