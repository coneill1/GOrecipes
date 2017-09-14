<?php
    session_start();

	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/db_connection.php");
	require_once("../includes/functions.php");
	require_once("../includes/auth_functions.php");
	
	global $errors;
    $redirect = '../Public/login.php';

	if(!isset($_POST['submit'])) {
		$errors[] = "Must login first";
		redirect_to($redirect);
	} else {
		$username = $_POST['user'];
		
		if($password = '') {
			$errors[] = "Password cannot be blank";
		}
		
		if(empty($errors)) {
			$user = find_user_by_username($username);
			$login_error_msg = "Login was unsuccessful";
            
			if(is_array($user)) {
				if(password_verify($_POST['pw'], $user['hashed_password'])) {
                    log_in_user($user);
                    redirect_to('index.php');
				} else {
					$errors[] = $login_error_msg;
                    $redirect.='?user=' . $user['hashed_password'];
					redirect_to($redirect);
				}
			}else {
				
				//user not found
				$errors[] = $login_error_msg;
				redirect_to($redirect);
			}
            
		}
		
	}
    include("../includes/layouts/footer.php");
?>