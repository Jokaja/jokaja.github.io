<?php
if(isset($_POST['change'])){
  $newpassword = trim($_POST['newpassword']);
  $newpassword = strip_tags($newpassword);
  $newpassword = htmlspecialchars($newpassword);

  $cpassword = trim($_POST['cpassword']);
  $cpassword = strip_tags($cpassword);
  $cpassword = htmlspecialchars($cpassword);

  $oldpassword = trim($_POST['oldpassword']);
  $oldpassword = strip_tags($oldpassword);
  $oldpassword = htmlspecialchars($oldpassword);


  if (empty($newpassword)){
    $error = true;
    $errTyp = 'danger';
    $newpasswordError = "Enter New password.";
  } else if(strlen($newpassword) < 6) {
    $error = true;
    $newpasswordError = "Password must have atleast 6 characters.";
  }

  if (empty($cpassword)) {
    $error = true;
    $errTyp = 'danger';
    $cpasswordError = "Please Confirm password.";
  }else if(strlen($cpassword) < 6) {
    $error = true;
    $cpasswordError = "Password must have atleast 6 characters.";
  }else if ($newpassword != $cpassword) {
    $error = true;
    $errTyp = 'danger';
    $cpasswordError = "Passwords Do not Match";
  }

  if (empty($oldpassword)) {
    $error = true;
    $errTyp = 'danger';
    $oldpasswordError = "Enter Old password.";
  }

  // password encrypt using SHA256();
  $newpassword = hash('sha256', $newpassword);

if ((hash('sha256',$oldpassword)) != ($userRow['pass'])) {
  $error = true;
  $oldpasswordError = "wrong Password";
}
  if (!$error) {
    $query = "UPDATE users SET pass = ('".$newpassword."') WHERE id=".$_SESSION['user'];
    $res = mysqli_query($conn, $query);

    if ($res) {
      $errTyp = "success";
      $errMSG = "Password Changed";
      unset($newpassword);
      unset($oldpassword);
      unset($cpassword);
    } else {
      $errTyp = "danger";
      $errMSG = "Something went wrong, try again later...";
    }
  }
}
 ?>

<div class="passe">
  <div class="container">
    <div class="col-md-6">
      <div class="panel-group">
        <div class="formy">
        <div class="panel orange">
          <div class="panel-heading">
            <center>
              <div class="header">
                <div class="card-header">
                <b>
                  <?php
                 if ( isset($res) ) {

                 ?>
                    <h3><div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                      <h2><?php echo $errMSG; ?></h2></div></h3>
                      <?php
                 }

                 if (!$errMSG) {
                   ?>
                   <div class="panel panel-heading">
                     <h3><div class="alert alert-info">
                       <h2 style="color:black;">Change password.</h2>
                     </div></h3>
                   </div>
                   <?php
                 }
                 ?>
                </b>
              </div>
                </div>
            </h2></center>
          </div>
          <div class="formy">
          <div class="panel-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon orange"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="oldpassword" class="form-control" placeholder="Old password" maxlength="50" value="" />
                  </div>
                  <span class="text-danger"><?php echo $oldpasswordError; ?></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon orange"><span class="glyphicon glyphicon-edit"></span></span>
                <input type="password" name="newpassword" class="form-control" placeholder="New Password" maxlength="50" value="" />
                  </div>
                  <span class="text-danger"><?php echo $newpasswordError; ?></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon orange"><span class="glyphicon glyphicon-check"></span></span>
                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" maxlength="50" value="" />
                  </div>
                  <span class="text-danger"><?php echo $cpasswordError; ?></span>
              </div>

              <div class="" style="float:right;">
                <button type="submit" name="change" class="btn btn-success glyphicon glyphicon-ok"></button>
              </div>
            </form>
              </div>
              </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
