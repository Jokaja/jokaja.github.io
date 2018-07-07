<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<?php
require_once '../dbconnect.php';

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
	  $errMSG = "Successfully Finish the payments";
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

<div class="formz">
  <div class="col-md-7">
  <div class="panel-group">
		<div class="header">
			<div class="card-header">
			<h2 style="color:black;">Add Driver</h2>
		</div>
			</div>

			<div class="panel-body">
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
										    </div>
											</div>
									  </div>
									</div>

									</div>
