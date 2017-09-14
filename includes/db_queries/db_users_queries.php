<?php 
	
	function list_all_users() {
		global $connection;
		
		$query = 'SELECT * FROM users';
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	
	function add_user($first, $last, $email, $username, $hash) {
		global $connection;
		
		$query = 'INSERT INTO users (first_name, last_name, email, username, hashed_password';
		$query .= ') VALUES( ';
		$query .= "'{$first}', '{$last}', '{$email}', '{$username}', '{$hash}'";
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
	
	function update_user_first_name($username, $colLabel, $value) {
        
        global $connection;
        
        $sql = "UPDATE users ";
        $sql .= "SET {$colLabel}='{$value}' ";
        $sql .= "WHERE username='{$username}'";
        
        $result = mysqli_query($connection, $sql);
		confirm_query($result);
    }

    function delete_user($username) {
        global $connection;
        
        $sql = "DELETE FROM ";
        $sql .= "users ";
        $sql .= "WHERE username='{$username}' ";
        $sql .= "LIMIT 1";
        
        $result = mysqli_query($connection, $sql);
		confirm_query($result);
    }
?>
