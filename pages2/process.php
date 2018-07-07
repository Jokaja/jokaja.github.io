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

$commodity = $_POST['commodity'];
$from = $_POST['from'];
$destination = $_POST['destination'];
$quantity = $_POST['quantity'];
$rname = $_POST['rname'];

$rphone = $_POST['rphone'];
$rphone = strip_tags($rphone);
$rphone = htmlspecialchars($rphone);

$error = false;

if (strlen($rphone) != 10) {
	$error = true;
	$rphoneError = "phone number less than 10";
	header('location: ?p=order');
}

#distance
$total = $quantity * $commodity;

$route = ('<h2>you are from ' .$from. ' to '.$destination. '.</h2>');

$near = ('<h2>Amount to Pay = ' .$total * 2000 .'#.</h2>');
$mid =  ('<h2>Amount to Pay = ' .$total * 3000 .'#.</h2>');
$far =  ('<h2>Amount to Pay = ' .$total * 4000 .'#.</h2>');
$mode = ('<h2>Amount to Pay = ' .$total * 3500 .'#.</h2>');


if($total == 0){
  echo "<h2>We wont manage to make that withought Money</h2>";
}else{

if($from == $destination){
  $Amount = $total;
  echo ("<h2>Amount to Pay : $Amount #<h2>");
}
#Dar-es-salam
elseif ($from == 'Dar-es-salam') {
  if ($destination == 'Bukoba' ||  $destination == 'Mwanza' || $destination == 'kahama') {
    $Amount = $far;
    echo $Amount;
  }elseif ($destination == 'Morogoro' || $destination == 'Tanga' || $destination == 'Dodoma') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Arusha' || $destination == 'Kilimanjaro') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Mbeya' || $destination == 'Singida' || $destination == 'Tabora') {
    $Amount = $mid;
    echo $Amount;
  }else {
    echo "We can not reach that location";
  }
}
#Morogoro
elseif ($from == 'Morogoro') {
  if ($destination == 'Dar-es-salam'|| $destination == 'Dodoma' || $destination == 'Tanga' || $destination == 'Mbeya') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Arusha' || $destination == 'Kilimanjaro' || $destination == 'Singida'|| $destination == 'Tabora') {
    $Amount = $mid;
    echo $Amount;
  } else {
    echo "We can not reach that location";
}
}
#Dodoma
elseif ($from == 'Dodoma') {
    if ($destination == 'Dar-es-salam'|| $destination == 'Tabora' || $destination == 'Tanga' || $destination == 'Mbeya') {
      $Amount = $near;
      echo $Amount;
    }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama') {
      $Amount = $mode;
      echo $Amount;
    }elseif ($destination == 'Arusha' || $destination == 'Kilimanjaro' || $destination == 'Singida'|| $destination == 'Tabora') {
      echo $mid;
    } else {
      echo "We can not reach that location";
    }
}
#Tanga
elseif ($from == 'Tanga') {
  if ($destination == 'Dar-es-salam'|| $destination == 'Morogoro' || $destination == 'Kilimanjaro') {
    echo $near;
  }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama') {
    echo $far;
  }elseif ($destination == 'Arusha' || $destination == 'Dodoma' || $destination == 'Mbeya') {
    echo $mid;
  }elseif ($destination == 'Singida' || $destination == 'Tabora') {
    echo $mode;
  } else {
    echo "We can not reach that location";
  }
}
#Mbeya
  elseif ($from == 'Mbeya') {
    if ($destination == 'Singida'|| $destination == 'Morogoro' || $destination == 'Dodoma') {
      $Amount = $near;
      echo $Amount;
    }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama'  || $destination == 'Arusha' || $destination == 'Kilimanjaro') {
      $Amount = $mode;
      echo $Amount;
    }elseif ($destination == 'Dar-es-salam' || $destination == 'Tanga' || $destination == 'Tabora') {
      $Amount = $mid;
      echo $Amount;
    } else {
      echo "We can not reach that location";
    }
  }
#Kilimanjaro
elseif ($from == 'Kilimanjaro') {
  if ($destination == 'Arusha'|| $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama'  || $destination == 'Mbeya' || $destination == 'Singida') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Dodoma' || $destination == 'Tabora') {
    $Amount = $mid;
    echo $Amount;
  } else {
    echo "We can not reach that location";
  }
}
#Arusha
elseif ($from == 'Arusha') {
  if ($destination == 'Tabora'|| $destination == 'Kilimanjaro' || $destination == 'Mwanza') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Bukoba'|| $destination == 'Singida' || $destination == 'Kahama'  || $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Mbeya' || $destination == 'Dodoma') {
    $Amount = $mid;
    echo $Amount;
  } else {
    echo "We can not reach that location";
  }
}
#Singida
elseif ($from == 'Singida') {
  if ($destination == 'Tabora'|| $destination == 'Dodoma' || $destination == 'Mbeya') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Kahama'  || $destination == 'Morogoro' || $destination == 'Arusha') {
    $Amount = $mid;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Kilimanjaro' || $destination == 'Tanga') {
    $Amount = $mode;
    echo $Amount;
  } else {
    echo "We can not reach that location";
  }
}
#Tabora
elseif ($from == 'Tabora') {
  if ($destination == 'kahama'|| $destination == 'Singida' || $destination == 'Arusha') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Bukoba'|| $destination == 'Mwanza' || $destination == 'Mbeya'  || $destination == 'Mbeya' || $destination == 'Kilimanjaro') {
    $Amount = $mid;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $mode;
    echo $Amount;
  } else {
    echo "We can not reach that location";
  }
}
#Kahama
elseif ($from == 'Kahama') {
  if ($destination == 'Bukoba' ||  $destination == 'Mwanza' || $destination == 'Tabora') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Arusha' || $destination == 'Singida') {
    $Amount = $mid;
    echo $Amount;
  }elseif ($destination == 'Dodoma' || $destination == 'Mbeya' || $destination == 'Kilimanjaro') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $far;
    echo $Amount;
  }else {
    echo "We can not reach that location";
  }
}
#Mwanza
elseif ($from == 'Mwanza') {
  if ($destination == 'Bukoba' || $destination == 'kahama' || $destination == 'Arusha') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Kilimanjaro' || $destination == 'Tabora') {
    $Amount = $mid;
    echo $Amount;
  }elseif ($destination == 'Dodoma' || $destination == 'Mbeya' || $destination == 'Singida') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $far;
    echo $Amount;
  }else {
    echo "We can not reach that location";
  }
}
#Bukoba
elseif ($from == 'Bukoba') {
  if ($destination == 'Mwanza' || $destination == 'kahama') {
    $Amount = $near;
    echo $Amount;
  }elseif ($destination == 'Kilimanjaro' || $destination == 'Tabora' || $destination == 'Arusha') {
    $Amount = $mid;
    echo $Amount;
  }elseif ($destination == 'Dodoma' || $destination == 'Mbeya' || $destination == 'Singida') {
    $Amount = $mode;
    echo $Amount;
  }elseif ($destination == 'Dar-es-salam' || $destination == 'Morogoro' || $destination == 'Tanga') {
    $Amount = $far;
    echo $Amount;
  }else {
    echo "We can not reach that location";
  }
}

  else {
  echo "Nothing";
}
}
?>
<?php

    if ($commodity == 100) {
      $com = 'timber';
    }elseif ($commodity == 150 ) {
      $com = 'Crops';
    }elseif ($commodity == 300 ) {
      $com = 'Livestoke';
    }elseif ($commodity == 400 ) {
      $com = 'Oil';
    }elseif ($commodity == 125 ) {
      $com = 'Dry foods';
    }elseif ($commodity == 175 ) {
      $com = 'Furniture';
    }elseif ($commodity == 450 ) {
      $com = 'Gas';
    }elseif ($commodity == 500 ) {
      $com = 'Spacial Orders';
    }

    if (!$error) {
			$id = $userRow['id'];
			$nm = $userRow['uname'];

	    $query = "INSERT INTO orders(id,cstm,com,frm,dest,qnty,rname,rphone) VALUES('$id','$nm','$com','$from','$destination','$quantity','$rname','$rphone')";
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
