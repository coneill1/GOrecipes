<?php 
	include("../includes/layouts/header.php");
    require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');

    if(isset($_GET['username'])) {
        $user = find_user_by_username($_GET['username']);
        $name = $user['first_name'] . " " . $user['last_name'];
        $email = $user['email'];
        $username = $user['username'];
        $hash = $user['hashed_password'];
    }
?>

<div class="page_content">
    Name: <?php echo $name ?> <br>
    Username: <?php echo $username ?> <br>
    Email: <?php echo $email ?> <br>
</div>
	
		
<?php include("../includes/layouts/footer.php"); ?>