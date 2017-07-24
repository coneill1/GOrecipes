<?php 
	
	function add_user($username, $pw, $admin) {
		global $connection_users;
		
		
		$query = 'INSERT INTO usernames (username, admin)';
		$query .= ' VALUES( ';
		$query .= "'{$username}', '{$admin}'";
		$query .= ");";
		
		$result = mysqli_query($connection_users, $query);
		//confirm_query($result);
		
		
		//add password to database
		//get user id
		$query = "SELECT id FROM usernames WHERE username = '{$username}'";
		$result = mysqli_query($connection_users, $query);
		confirm_query($result);
		$id = mysqli_fetch_array($result);
		$user_id = $id[0];
		
		$hash = password_hash($pw, PASSWORD_DEFAULT);
		
		$query = 'INSERT INTO passwords (hash, user_id)';
		$query .= ' VALUES( ';
		$query .= "'{$hash}', '{$user_id}'";
		$query .= ");";
		
		$result = mysqli_query($connection_users, $query);
		//confirm_query($result);
	}
	
	function confirm_query($result) {
		global $connection_users;
		
		if($result) {
			return true;
		}
		die("Database query failed." . mysqli_error($connection_users));
	}
	
	function valid_login($username, $password) {
		global $connection_users;
		
		$query = "SELECT id FROM usernames WHERE username = '{$username}'";
		$result = mysqli_query($connection_users, $query);
		confirm_query($result);
		$id = mysqli_fetch_array($result);
		$user_id = $id[0];
		
		echo "<script>alert('{$user_id}')</script>";
		
		$hash = password_hash($password, PASSWORD_DEFAULT);
		
		$query = "SELECT hash FROM passwords WHERE user_id = '{$user_id}';";
		$result = mysqli_query($connection_users, $query);
		confirm_query($result);
		
		$valid_hash = mysqli_fetch_array($result);
		
		echo "<script>alert('{$hash} == {$valid_hash[0]}')</script>";
		
		if($hash == $valid_hash[0]) {
			return true;
		} else {
			return false;
		}
	}
?>
