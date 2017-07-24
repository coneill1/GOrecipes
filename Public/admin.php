<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/db_connection_users.php");
	
	if(!isset($_POST['submit'])) {
		echo "redirecting...";
		header('Location: ./login.php');
	} else {
		$username = $_POST['user'];
		$password = $_POST['pw'];
		
		$valid = valid_login($username, $password, 0);
		if(!$valid) {
			//header('Location: ./login.php?error=1');
		}
	}
?>

				<div class="page_content">
					<h2>Admin</h2>
					<p>Welcome to the admin page.</br>You can now add or edit any recipe.</p>
					
					<?php echo $username; echo "\n"; echo $password ?>
				</div>

<?php include("../includes/layouts/footer.php"); ?>