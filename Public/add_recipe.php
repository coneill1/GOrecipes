<?php
    session_start();

	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
    require_once("../includes/auth_functions.php");

    if(!isset($_SESSION['valid_user']) && !isset($_SESSION['public'])) {
        redirect_to('main_page.php');
    }
	
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
				<button type="button" id="add_button">Add Ingredient</button>
				<div id="ingredients"></div>
				<div id="instructions">
					Directions:<br/>
					<textarea name="instructions" rows="10" cols="30"></textarea>
				</div>
				<button id="submitBtn" type="submit" name="submit">Submit</button>
			</form>
        
	<!--<?php mysqli_free_result($result)?>-->
