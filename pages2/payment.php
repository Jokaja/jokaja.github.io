
</style>
  <script src="assets/jquery-1.11.3-jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

<div class="container">
  <div class="col-md-9">
  <div class="panel-group">
    <div class="formz">
    <div class="panel panel-info">
      <div class="progress">
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
            <marquee><b>40% complete</b></marquee>
          </div>
        </div>
      </div>
      <div class="panel-heading"><?php require('pages2/process.php');?></div>
      <div class="panel-body">
        <div class="">
          <h2>We recieved your Order</h2>
          <p style="color:black">Finish Payments</p>
          <form class="form-group" action="payment.php" method="post">
            <input type="button" class="btn btn-success" name="payment" value="Mobile payment" class="button" id="myBtn">
            <div class="btn">
              <a href="../home.php"><button type="button" name="button" class="btn btn-danger">Cancel</button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php require('pin.php') ?>
