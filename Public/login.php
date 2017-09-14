<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/db_queries/db_users_queries.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	
	global $errors;
	if(!empty($errors)) {
        $output = display_errors($errors);  
    }

    //<?php if(!empty($errors)) echo $output; else echo 'No Errors';
	
	
?>
				<div class="page_content ml-3 mt-3">
					<form action="../users/process_login.php" id="login" method="post">
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input id="uname" name="user" type="text">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password:</label> 
                            <input id="pass" name="pw" type="password">
                        </div>
				        <button type="submit" id="passSubmit" name="submit">Sumbit</button>
					 </form>
				</div>

<?php include("../includes/layouts/footer.php"); ?>