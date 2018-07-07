<?php


if(isset($_POST['but_upload'])){

 $name = $_FILES['file']['name'];
 $target_dir = "profile/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){

  // Convert to base64
  $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  // Insert record
  $query = "UPDATE users SET profile = ('".$image."') WHERE id =".$num;
  $res = mysqli_query($conn,$query);

  if ($res) {
    header("Location: ?p=adhome");
  }else {
    $errMSG = "Something went wrong, try again later...";
  }
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 }

}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file'/>
  <button type="submit" name='but_upload'  class="btn btn-warning" style="float:right; color:black;">
    <span class="glyphicon glyphicon-camera">Upload</span>
  </button>
</form>
