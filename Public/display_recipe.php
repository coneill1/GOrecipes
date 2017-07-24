<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	
		if(isset($_GET['id'])) {
				$recipe_id = $_GET['id'];
				$name = $_GET['name'];
				$instructions = $_GET['instructions'];
			}
		else {
			header("Location: \"index_of_recipes.php\"");
		}
?>

	<h1><?php echo $name ?></h1>
	<h2>Ingredients</h2>
		<ul>
			<?php
				$ingredients = get_ingredients($recipe_id);
					while($ingred = mysqli_fetch_assoc($ingredients)) {
						echo "<li>{$ingred['ingred_name']} - {$ingred['amt']}</li>";
					} 
			?>
		</ul>
	<h2>Instructions</h2>
		<p><?php echo $instructions?></p>
	
	<!--<?php mysqli_free_result($result)?>-->
		
<?php include("../includes/layouts/footer.php"); ?>
