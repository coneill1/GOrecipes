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
?>
        <div id="edit_user_page">
            <div class="form-group row">
                <label class="col-2 col-form-label">Name:</label>
                <div class="col-10">
                    <a><?php echo $name ?></a>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Username:</label>
                <div class="col-10">
                    <a><?php echo $username ?></a>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Email:</label>
                <div class="col-10">
                    <a><?php echo $email ?></a>
                </div>
            </div>
        </div>
<?php
        unset($_GET['username']);
    } else { ?>

        <div class="col-12">
            <h3>Edit User</h3>    
        </div>
<?php
        $users = list_all_users();
?>
        <div class="col-md-12 col-sm-12 mt-3">
            <ul class="col-md-4 col-sm-4 text-left">
            <?php
                while($row = mysqli_fetch_assoc($users)) {
                    echo "<li><a href=\"edit_user.php?username={$row['username']}\">{$row['first_name']} {$row['last_name']}</a></li>";
                }
            ?>
            </ul>
        </div>
<?php
    }
?>

	
		
<?php include("../includes/layouts/footer.php"); ?>