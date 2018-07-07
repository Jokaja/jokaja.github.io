<?php
require_once 'dbconnect.php';

if(isset($_POST['submit'])){
	$commodity = $_POST['commodity'];
	$from = $_POST['frm'];
	$destination = $_POST['destination'];
	$quantity = $_POST['quantity'];
	$rname = $_POST['rname'];
	$rphone = $_POST['rphone'];

	if (!isset($_SESSION["intVar"]) ){
	      $_SESSION["intVar"] = 1;
	} else {
	      $_SESSION["intVar"]++;
	}

}
?>

<script type="text/javascript">
	function check(){
	 if(document.getElementById('commodity' || 'from' || 'destination' || 'quantity' || 'rname' || 'rphone').value==""){
				alert('please fill all fields');
				return false;
			}
			else {
				return true;
}
	}
</script>



<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="../style.css">

<div class="container">
  <div class="col-md-8">
  <div class="panel-group">
    <div class="formy">
    <div class="panel orange">
      <div class="panel-heading">
				<center><h2>
					<div class="header">
						<div class="card-header">
						<b>
							<h2 style="color:black;">
										<?php

									$cc = $_SESSION['user'];

									if ($result = $mysqli->query("SELECT * FROM orders WHERE id='$cc'")) {

											/* determine number of rows result set */
											$row_cnt = $result->num_rows;
										printf("You made %d Orders ready\n", $row_cnt);

											/* close result set */
											$result->close();
									}
									 ?>
							</h2>
						</b>
					</div>
						</div>
				</h2></center>
			</div>
			<div class="formy">
      <div class="panel-body">
					<p>Dear <b><?php echo $userRow['uname'] ?></b> you may leave comment about our services below.
					We Hope your comments will make us improve in making you Enyoy
					All that you need.<br>				<?php echo $ses; ?>
					<b>CTC we deliver them Better</b></p><hr>
							<form class="form control" action="?p=payment" method="post" onsubmit="return check();">
	            <div class="row">
	              <div class="col-md-4 col-md-offset-1">
	                <label for="">Commodity : </label>
	              </div>
	                <div class="col-md-5">
	                  <select name="commodity" id="commodity">
	                    <option value="">select</option>
	                    <option value="100">Timber</option>
	                    <option value="150">Crops</option>
	                    <option value="300">Livestoke</option>
	                    <option value="400">Oil</option>
	                    <option value="125">Dry foods</option>
	                    <option value="175">Furniture</option>
	                    <option value="450">Gas</option>
	                    <option value="500">Spacial Orders</option>
	                  </select>
	                </div>
	                </div>

	                <div class="row">
	                  <div class="col-md-4 col-md-offset-1">
	                    <label for="">From :</label>
	                  </div>
	                    <div class="col-md-5">
	                      <select name="from" id="from">
													<option value="">select</option>
													<option value="Dar-es-salam">Dar-es-salam</option>
													<option value="Morogoro">Morogoro</option>
													<option value="Dodoma">Dodoma</option>
													<option value="Singida">Singida</option>
													<option value="Tabora">Tabora</option>
													<option value="kahama">kahama</option>
													<option value="Bukoba">Bukoba</option>
													<option value="Mwanza">Mwanza</option>
													<option value="Arusha">Arusha</option>
													<option value="Tanga">Tanga</option>
													<option value="Kilimanjaro">Kilimanjaro</option>
													<option value="Mbeya">Mbeya</option>
	                      </select>
	                    </div>
	                    </div>

	                    <div class="row">
	                      <div class="col-md-4 col-md-offset-1">
	                        <label for="">Destination :</label>
	                      </div>
	                        <div class="col-md-5">
	                          <select name="destination" id="destination">
	                          <option value="">select</option>
	                          <option value="Dar-es-salam">Dar-es-salam</option>
	                          <option value="Morogoro">Morogoro</option>
	                          <option value="Dodoma">Dodoma</option>
	                          <option value="Singida">Singida</option>
	                          <option value="Tabora">Tabora</option>
	                          <option value="kahama">Kahama</option>
	                          <option value="Bukoba">Bukoba</option>
	                          <option value="Mwanza">Mwanza</option>
	                          <option value="Arusha">Arusha</option>
	                          <option value="Tanga">Tanga</option>
	                          <option value="Kilimanjaro">Kilimanjaro</option>
	                          <option value="Mbeya">Mbeya</option>
	                        </select>
	                        </div>
	                        </div>


	                        <div class="row">
	                          <div class="col-md-4 col-md-offset-1">
	                            <label for="">Quantity :</label>
	                          </div>
	                            <div class="col-md-5">
	                              <select name="quantity" id="quantity">
	                              <option value="0">Select Tons</option>
	                              <option value="1">Less than 1.0 Ton</option>
	                              <option value="2">1.0 to 2.5 Ton</option>
	                              <option value="2.5">2.6 to 3.0 Tons</option>
	                              <option value="3">3.1 to 3.5 Tons</option>
	                              <option value="4">3.6 to 5.0 Tons</option>
	                            </select>
	                            </div>
	                            </div>

	                            <label for=""><h3 class=""><u>Reciver details</u></h3></label>
	                            <div class="row">
	                              <div class="col-md-4 col-md-offset-1">
	                                <label for="">Name: </label>
	                              </div>
	                              <div class="col-md-5">
	                                <input type="text" name="rname" id="rname" placeholder="Name">
	                              </div>
	                            </div>

	                            <div class="row">
	                              <div class="col-md-4 col-md-offset-1">
	                                <label for="">Phone: </label>
	                              </div>
	                              <div class="col-md-5">
	                                <input type="text" name="rphone" id="rphone" placeholder="eg: 0764791031">
																	<span class="text-danger"><?php echo $rphoneError; ?></span>
	                              </div>
	                            </div>
	                          <div class="col-md-10">
	                            <div class="nav navbar-right">
	                                <button type="submit" name="submit" id="submit" class="orderbtn btn btn-success glyphicon glyphicon-send"></button>
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
