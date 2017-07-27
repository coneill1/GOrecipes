<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');
	
	if(isset($_POST['submit'])) {
		$first = db_escape($_POST['first']);
		$last = db_escape($_POST['last']);
		$email = db_escape($_POST['email']);
		$username = db_escape($_POST['username']);
		$hashed_password = db_escape(password_hash($_POST['pw'], PASSWORD_BCRYPT, ['cost' => 10]));
		
		add_user($first, $last, $email, $username, $hashed_password);
	}
	
	
	$users = list_all_users();
?>

		<ul>
			<?php
				while($row = mysqli_fetch_assoc($users)) {
					$query = http_build_query($row);
					echo "<li><a href=\"show.php?{$query}\">{$row['first_name']} {$row['last_name']}</a></li>";
				}
			?>
		</ul>
	</div>
	
	<?php mysqli_free_result($users)?>
		
<?php include("../includes/layouts/footer.php"); ?>
