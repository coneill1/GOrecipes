<?php 
	include("../includes/layouts/header.php");
    require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');
    
    if(isset($_GET['username'])) {
        $username = $_GET['username'];
        delete_user($username);
        unset($_GET['username']);
        redirect_to('index.php');
    } else { ?>

        <div class="col-12">
            <h3>Delete User</h3>    
        </div>
<?php
        $users = list_all_users();
?>
        <div class="col-md-12 col-sm-12 mt-3">
            <ul class="col-md-4 col-sm-4 text-left">
            <?php
                while($row = mysqli_fetch_assoc($users)) {
                    echo "<li><a href=\"delete_user.php?username={$row['username']}\">{$row['first_name']} {$row['last_name']}</a></li>";
                }
            ?>
            </ul>
        </div>
<?php
    }
?>


		
<?php include("../includes/layouts/footer.php"); ?>