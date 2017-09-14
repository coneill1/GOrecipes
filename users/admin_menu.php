<?php 
    session_start();
    if(!isset($_SESSION['valid_user']) || $_SESSION['valid_user'] != 'eemaushee_seelu') {
        redirect_to('../Public/login.php');
    }
?>
	<div class="col-md-12 col-sm-12 admin_menu">
		<h2 class="mt-5">Admin</h2>
        <p>Welcome to the admin page.<br>You can now add or edit any recipe.</p>
		<ul class="nav nav-tabs justify-content-center">
			<li class="nav-item">
                <a class="nav-link" href="index.php">List of users</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="new.php">Create new user</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="edit_user.php">Edit a user</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="delete_user.php">delete a user</a>
            </li>
		</ul>
    </div>
