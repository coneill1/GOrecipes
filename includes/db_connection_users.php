<?php 
	define("DB_SERVER", "localhost");
	define("DB_USER", "coneill");
	define("DB_PASS", "chris");
	define("DB_NAME_USERS", "users");
	
	$connection_users = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME_USERS);
	
	//test if connection occurred.
	if(mysqli_connect_errno()) {
		die("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
				);
	}
?>
