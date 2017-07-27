<?php 
	
	function list_all_users() {
		global $connection;
		
		$query = 'SELECT * FROM users';
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	
	function add_user($first, $last, $email, $username, $pw) {
		global $connection;
		
		
		$query = 'INSERT INTO users (first_name, last_name, email, username, hashed_password';
		$query .= ') VALUES( ';
		$query .= "'{$first}', '{$last}', '{$email}', '{$username}', '{$pw}'";
		$query .= ");";
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
	}
	
	function find_user_by_username($username) {
		
		global $connection;
		
		$sql = "SELECT * FROM users ";
		$sql .= "WHERE username='" . db_escape($username) . "' ";
		$sql .= "LIMIT 1";
		
		$result = mysqli_query($connection, $sql);
		confirm_query($result);
		
		$user = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		
		return $user;
	}
	
	
	function valid_login($username, $password) {
		global $connection_users;
		
		$query = "SELECT id FROM users WHERE username = '{$username}'";
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
