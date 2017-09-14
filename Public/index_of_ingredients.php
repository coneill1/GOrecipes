<?php
    session_start();

	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
    require_once("../includes/auth_functions.php");

    if(!isset($_SESSION['valid_user']) && !isset($_SESSION['public'])) {
        redirect_to('main_page.php');
    }
?>

		<h2>Ingredients</h2>
		<ul class="text-left">
			<?php 
				$ingredients = list_all_ingredients();
				while($row = mysqli_fetch_assoc($ingredients)) {
					$query = http_build_query($row);
					echo "<li><a href=\"index_of_recipes.php?{$query}\">{$row['ingred_name']}</a></li>";
				}
			?>
		</ul>
	
<?php mysqli_free_result($ingredients)?>
