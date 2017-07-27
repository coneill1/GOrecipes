<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/db_connection.php");
	require_once("../includes/functions.php");
	require_once("../includes/auth_functions.php");
	
	global $errors;
	
	if(!isset($_POST['submit'])) {
		$errors[] = "Must login first";
		redirect_to('../Public/login.php');
	} else {
		$username = $_POST['user'];
		$password = $_POST['pw'];
		
		if($password = '') {
			$errors[] = "Password cannot be blank";
		}
		
		if(empty($errors)) {
			$user = find_user_by_username($username);
			$login_error_msg = "Login was unsuccessful";
			
			
			if($user) {
				if(password_verify($password, $user['hashed_password'])) {
					//password matches
				} else {
					$errors[] = $login_error_msg;
					redirect_to('../Public/login.php');
				}
			}else {
				
				//user not found
				$errors[] = $login_error_msg;
				redirect_to('../Public/login.php');
			}
		}
		
	}
?>

				<div class="page_content">
					<h2>Admin</h2>
					<p>Welcome to the admin page.</br>You can now add or edit any recipe.</p>
				</div>

<?php include("../includes/layouts/footer.php"); ?>