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

<link rel="stylesheet" href="assets/css/bootstrap.css">
<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


<style>
body {font-family: Arial, Helvetica, sans-serif;
text-align:center;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
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

.modal-header {
    padding: 2px 16px;
    background-color: silver;
    color: black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: silver;
    color: black;
}
</style>
<script type="text/javascript">
  function check(){
if(document.getElementById('no').value=="<?php echo $userRow['phone']?>"){
alert("Valid Phone number");
    return true;
    }else if (document.getElementById('no').value=="") {
      alert("please enter PhoneNumber");
      document.getElementById('no').focus();
      return false;
    }
    else {
      alert("Invalid PhoneNumber");
      document.getElementById('no').focus();
      return false;
    }
  }
</script>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">
				<marquee><b>50% complete</b></marquee>
			</div>
		</div>
    <div class="modal-header">
      <span class="close">&times;</span>
      <p style="color:black;">Payments in <b><?php echo $userRow['location']?></b></p>
    </div>
    <div class="modal-body">
        <form class="" action="pages2/confirm.php" method="post" class="form form-group" onsubmit="return check();">
					<h4>Dear <b>&nbsp;<?php echo $userRow['uname']?>&nbsp;</b>, Your Full name is </b>&nbsp;&nbsp; <b><?php echo $userRow['fname']?>&nbsp;&nbsp;<?php echo $userRow['lname']?></b> &nbsp;&nbsp;</h4>
					<h3 style="color:black;">Please enter the phone number to confirm</h3>
	        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span><input type="text" name="number" id="no" value="" placeholder="Phone Number"></span>
					<input type="submit" name="submit" value="submit" class="btn btn-success">
        </form>
    </div>
    <div class="modal-footer">
			<h4>Please Finish Payments</h4>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

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

</body>
</html>
