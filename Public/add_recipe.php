<?php
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	include("../includes/layouts/header.php");
	
	$result = list_all_recipes(); 
	$recipes = [];
	while($recipe = mysqli_fetch_assoc($result)) {
		$recipes[] = $recipe['name'];
	}
	
	$ingred_result = list_all_ingredients();
	$ingredients = [];
	
	
	
	while($ingredient = mysqli_fetch_assoc($ingred_result)) {
		$ingredients[] = $ingredient['ingred_name'];
	}
	
	$amt_result = list_all_amounts();
	$amts = [];
	
	while($amt = mysqli_fetch_assoc($amt_result)) {
		$amts[] = $amt['amt'];
	}
	
	$js_ingreds = json_encode($ingredients);
	$js_amts = json_encode($amts);
?>
	
	<div class="page_content">
		<h2>Add Recipe</h2>
			<form action="process_new_recipe.php" method="post">
				Recipe Name: <input list="recipes" name="recipe_name" placeholder="recipe name">
				<datalist id="recipes">
					<?php 
						$result = list_all_recipes(); 
						while($recipe = mysqli_fetch_assoc($result)) {
					?>
						<option value="<?php echo $recipe["name"]; ?>">
					<?php	
						}
					?>
				</datalist>
				<button type="button" id="add_button" onclick='add_ingred_form(<?php echo $js_ingreds ?>, <?php echo $js_amts?>)'>Add Ingredient</button>
				<div id="ingredients"></div>
				<div id="instructions">
					Directions:<br/>
					<textarea name="instructions" rows="10" cols="30"></textarea>
				</div>
				<button id="submitBtn" type="submit" name="submit">Submit</button>
			</form>

	</div>
	<script src="../includes/layouts/Javascript/add_recipe_script.js"></script>
	<!--<?php mysqli_free_result($result)?>-->
		
<?php include("../includes/layouts/footer.php"); ?>
