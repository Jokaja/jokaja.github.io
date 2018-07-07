<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.

	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'transit');

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if ( !$conn ) {
		die("Connection failed : " . mysqli_connect_error());
	}


	$mysqli = new mysqli("localhost","root","","transit");
	if ($mysqli->connect_errno) {
		echo "Failed connect (".$mysqli->connect_errno.")".$mysqli->connect_errno;
	}
	?>
