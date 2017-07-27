<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');
	
	$users = list_all_users();
?>

		<form action='index.php' method='post'>
			First Name: <input type="text" name="first" placeholder="first"></input>
			Last Name: <input type="text" name="last" placeholder="last"></input>
			Email: <input type="email" name="email" placeholder="email"></input>
			Username: <input type="text" name="username" placeholder="username"></input>
			Passsword: <input type="password" name="pw" placeholder="password"></input>
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
	
	<?php mysqli_free_result($users)?>
		
<?php include("../includes/layouts/footer.php"); ?>
