<?php 
	
	function log_in_user($user) {
		session_regenerate_id();
		$_SESSION['user_id'] = $user['id'];
		$_SESSION['last_login'] = time();
		$_SESSION['username'] = $user['username'];
        $_SESSION['valid_user'] = 'eemaushee_seelu';
		return true;
	}

    function start_public_session() {
        session_regenerate_id();
        $_SESSION['public'] = 'pooblika';
    }
	
	
?>
