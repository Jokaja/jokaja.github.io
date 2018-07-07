
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
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
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
<?php
if(isset($_POST['submit'])){
  $fnm = $_POST['fname'];
  $lnm = $_POST['lname'];
  $phn = $_POST['phone'];
  $lc = $_POST['license'];
  $t_no = $_POST['t_no'];
  $hom = $_POST['location'];

  $query = "INSERT INTO drivers(fname,lname,phone,license,t_no,location) VALUES('$fnm','$lnm','$phn','$lc','$t_no','$hom')";
  $res = mysqli_query($conn, $query);

  if ($res) {
    $errTyp = "success";
    $errMSG = "You Added ".$fnm." As Driver";
    echo $errMSG ;
  } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
    echo $errMSG;
  }
}
?>
<script type="text/javascript">
  function check(){
   if(document.getElementById('fname').value==""){
        alert('You forgot First Name');
        document.getElementById('fname').focus();
        return false;
      }else if (document.getElementById('lname').value=="") {
        alert('You forgot Last Name');
        document.getElementById('lname').focus();
        return false;
      }else if (document.getElementById('phone').value=="") {
        alert('Phone Number required');
        document.getElementById('phone').focus();
        return false;
      }else if (document.getElementById('license').value=="") {
        alert('We Need License leval');
        document.getElementById('licence').focus();
        return false;
      }else if (document.getElementById('t_no').value=="") {
        alert('Please Assign the Driver truck number');
        document.getElementById('t_no').focus();
        return false;
      }else if (document.getElementById('location').value=="") {
        alert('What is the Location of the Driver?');
        document.getElementById('location').focus();
        return false;
      }else {
        return true;
}
  }
</script>

<!-- Trigger/Open The Modal -->

<b><button id="myBtn" class="btn btn-warning glyphicon glyphicon-plus">&nbsp;Add</button></b>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="">
    <div class="modal-body">
			<div class="modal-content">
				<div class="">
					<div class="card-body">
						<table class="table table-bordered">
			  <tbody>
			    </style>
          <form class="form-control" action="" method="post" onsubmit="return check();">

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name"/></span>

                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"/></span>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone number"/></span>

                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
              <input type="location" name="location" id="location" class="form-control" placeholder="Location"/></span>
                </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>
              <input type="text" name="license" id="license" class="form-control" placeholder="License: C or D" /></span>

                <span class="input-group-addon"><span class="glyphicon glyphicon-road"></span>
              <input type="text" name="t_no" id="t_no" class="form-control" placeholder="Truck number" /></span>
                </div>
            </div>
            <div class="input-group-addon">
              <div class="form-group">
                <div style="float: right;">
                  <button type="submit" class="btn btn-warning glyphicon glyphicon-plus" name="submit">&nbsp;Add driver</button>
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
