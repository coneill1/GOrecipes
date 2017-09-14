<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');
	
    if(isset($_GET['error_msg'])) {
        $error = $_GET['error_msg'];
    } else if(isset($_POST['submit'])) {
		$first = db_escape($_POST['first']);
		$last = db_escape($_POST['last']);
		$email = db_escape($_POST['email']);
		$username = db_escape($_POST['username']);
		$hashed_password = password_hash($_POST['pw'], PASSWORD_DEFAULT);
		
		add_user($first, $last, $email, $username, $hashed_password);
	}
	
	
	$users = list_all_users();
?>
    <div class="col-6 align-self-center">
        <h3>Users</h3>    
    </div>
    <div class="col-md-12 col-sm-12 mt-3">
        <ul class="col-md-4 col-sm-4 text-left">
            <?php
                while($row = mysqli_fetch_assoc($users)) {
                    echo "<li><a href=\"show.php?username={$row['username']}\">{$row['first_name']} {$row['last_name']}</a></li>";
                }
            ?>
        </ul>
	</div>
	
<?php 
    unset($_POST['submit']);
    mysqli_free_result($users);
    include("../includes/layouts/footer.php");
?>
