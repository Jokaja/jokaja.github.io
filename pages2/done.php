<?php
session_start();
if (!isset($_SESSION["intVar"]) ){
      $_SESSION["intVar"] = 1;
} else {
      $_SESSION["intVar"]++;
}


if ($_SESSION["intVar"] == 1) {
	echo 'Sawa';
}elseif ($_SESSION["intVar"] == 2) {
	echo 'kawaida';
}else {
	unset($_SESSION["intVar"]);
}
 ?>
