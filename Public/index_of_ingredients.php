<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
?>

	
	<div class="page_content">
		<h2>Ingredients</h2>
		<ul>
			<?php 
				$ingredients = list_all_ingredients();
				while($row = mysqli_fetch_assoc($ingredients)) {
					$query = http_build_query($row);
					echo "<li><a href=\"index_of_recipes.php?{$query}\">{$row['ingred_name']}</a></li>";
				}
			?>
		</ul>
	</div>
	
	<?php mysqli_free_result($ingredients)?>
		
<?php include("../includes/layouts/footer.php"); ?>
