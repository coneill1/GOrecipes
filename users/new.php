<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include('admin_menu.php');
	
	$users = list_all_users();
?>

    <div class="col-12">
        <h3>New User</h3>    
    </div>
    <div class="col-md-12 col-sm-12 mt-3">
		<form action='index.php' method='post'>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="first-name">First Name</label>
                <div class="col-10">
                   <input type="text" class="form-control" id="first-name" name="first" placeholder="first"> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="last-name">Last Name</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="last-name" name="last" placeholder="last">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="new-email">Email</label>
                <div class="col-10">
                    <input type="email" class="form-control" id="new-email" name="email" placeholder="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="new-username">Username</label>
                <div class="col-10">
                   <input type="text" class="form-control" id="new-username" name="username" placeholder="username"> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="new-pass">First Name</label>
                <div class="col-10">
                   <input type="password" class="form-control" id="new-pass" name="pw" placeholder="password"> 
                </div>
            </div> 
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
	
	<?php mysqli_free_result($users)?>
		
<?php include("../includes/layouts/footer.php"); ?>
