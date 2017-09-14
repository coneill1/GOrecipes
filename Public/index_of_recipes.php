<?php 
    session_start();

	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
    require_once("../includes/auth_functions.php");

    if(!isset($_SESSION['valid_user']) && !isset($_SESSION['public'])) {
        redirect_to('main_page.php');
    }
	
	if(isset($_GET['id'])) {
			$ingred_id = $_GET['id'];
			$recipes = list_recipes_with($ingred_id);
		}
		else {
			$recipes = list_all_recipes();
		}
?>
		<h2>Recipes</h2>
		<ul id="list-recipes" class="text-left">
			<?php
				while($row = mysqli_fetch_assoc($recipes)) {
					$query = http_build_query($row);
					echo "<li><a href=\"display_recipe.php?{$query}\">{$row['name']}</a></li>";
				}
			?>
		</ul>
	
	<?php mysqli_free_result($recipes)?>
