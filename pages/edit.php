<?php
  require("../dbconnect.php");
  $id = $_GET = ['id'];

  if(isset($_POST['done'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $nationality = $_POST['nationality'];
    $pass = $_POST['pass'];
    $edit = mysqli_query("UPDATE `users` SET `fname`='$fname',`lname`='$lname',`uname`='$uname',`email`='$email',`phone`='$phone',`address`='$address',`location`='$location',`nationality`='$nationality',`pass`='$pass' WHERE id = '$id'");

    if(!$edit){
      echo mysqli_errror();
    }else{
      header("location: users.php");
    }
  }


 ?>

<link rel="stylesheet" href="../assets/bootstrap.css">
<link rel="stylesheet" href="../assets/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">

 <form method="post">
   <div class="col-md-12">
       <div class="form-group">
           <h3 class="heads">Edit</h3>
         </div>

         <center>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"></span>
             <input type="text" name="fname" class="form-control" placeholder="FirstName" maxlength="50" />
             <input type="text" name="lname" class="form-control" placeholder="LastName" maxlength="50"/>
             <input type="text" name="uname" class="form-control" placeholder="Username" maxlength="50"/><br>
             <input type="email" name="email" class="form-control" placeholder="Email" maxlength="40" />
             <input type="text" name="phone" class="form-control" placeholder="Phone" maxlength="50" />
             <input type="text" name="address" class="form-control" placeholder="Address" maxlength="50"/><br>
             <input type="text" name="location" class="form-control" placeholder="Home" maxlength="50"/>
             <input type="text" name="nationality" class="form-control" placeholder="Nationality" maxlength="50"/>
             <input type="text" name="pass" class="form-control" placeholder="Password" maxlength="15" />
               </div>
           </div>
           <div class="form-group">
             <button type="submit" class="btn btn-block btn-warning" name="">Edit</button>
           </div>
         </center>



         <div class="form-group">
           <hr />
         </div>

     </div>

 </form>
