<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	
	if(isset($_GET['id'])) {
			$ingred_id = $_GET['id'];
			$recipes = list_recipes_with($ingred_id);
		}
		else {
			$recipes = list_all_recipes();
		}
?>

	<div class="page_content">
		<h2>Recipes</h2>
		<ul>
			<?php
				while($row = mysqli_fetch_assoc($recipes)) {
					$query = http_build_query($row);
					echo "<li><a href=\"display_recipe.php?{$query}\">{$row['name']}</a></li>";
				}
			?>
		</ul>
	</div>
	
	<?php mysqli_free_result($recipes)?>
		
<?php include("../includes/layouts/footer.php"); ?>
