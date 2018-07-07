<div class="">
  <div class="col-md-5">
    <div class="bod">

      <table class="table tbc">
        <div class="table-header">
          <center><h2><b><?php echo $userRow['uname']?>'s Profile Information</h2></b></center>
        </div>
        <tr>
          <td class="tdr"><b>User Name:</b></td><td class="tdl"><?php echo $userRow['uname']?></td></tr>
        <tr>
          <td class="tdr"><b>Full Name:</b></td><td class="tdl"><?php echo $userRow['fname']?>&nbsp;&nbsp;<?php echo $userRow['lname']?></td>
        </tr>
        <tr>
          <td class="tdr"><b>Phone:</b></td><td class="tdl"><?php echo $userRow['phone']?></td>
        </tr>
        <tr>
          <td class="tdr"><b>Email:</b></td><td class="tdl"><?php echo $userRow['email']?></td>
        </tr>
        <tr>
          <td class="tdr"><b>Location:</b></td><td class="tdl"><?php echo $userRow['location']?></td>
        </tr>
        <tr>
          <td class="tdr"><b>Nationality:</b></td><td  class="tdl"><?php echo $userRow['nationality'] ?></td>
        </tr>
      </table>

    <button type="button" name="button" id="myBtnz" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-edit">&nbsp;Edit</span></button>
    </div>
      </div>
  <?php require('view.php'); ?>

  <div class="col-md-4">
    <div class="bod">
      <div class="header">
        <center><h2>Editing Profile</h2></center>
      </div><hr>
      <p>Dear customer you can update your personals but you won’t be able to change your email. <br>If there is any change to your email you can concert an administrator for help about farther information.<br> That can be simple done by leaving the comment with specific information. You can start comment to Administrator by Writing Admin.</p>
      <hr><br>
      <p>Also Contact us with some of our contacts provides in the <a href="?p=about"><code>about us</code></a> page</p>
    </div>
      </div>

</div>
