<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	//require_once("");
	
	global $errors;
	
	$output = display_errors($errors);
	echo $output;
	
?>

				<div class="page_content">
					<form action="../users/admin.php" id="login" method="post">
							Username: <input id="uname" name="user" type="text"></input> <br>
							Password: <input id="pass" name="pw" type="text"></input> <br>
							<button type="submit" id="passSubmit" name="submit">Sumbit</button>
					 </form>
				</div>

<?php include("../includes/layouts/footer.php"); ?>