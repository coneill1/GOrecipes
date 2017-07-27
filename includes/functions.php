<?php 
	function db_escape($string) {
		
		global $connection;
		
		return mysqli_real_escape_string($connection, $string);
	}
	
	function redirect_to($url) {
		header('Location: ' . $url);
	}
	
	function display_errors($errors=array()) {
		$output = '';
		if(!empty($errors)) {
			
			$output .= 'Please fix the following errors:';
			$output .= '<ul>';
			
			foreach($errors as $error) {
				$output .= '<li>' . $error . '</li>';
			}
			$output .= '</ul>';
		}
		
		return $output;
	}
	
	function list_all_recipes() {
		
		global $connection;
		
		//build database query
		$query = "SELECT * FROM my_recipes";
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	function list_recipes_with($ingred_id) {
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM my_recipes ";
		$query .= "INNER JOIN (SELECT recipe_id FROM ingredients_in_recipes WHERE ingred_id = {$ingred_id}) ir ";
		$query .= "ON ir.recipe_id = my_recipes.id";
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	function list_all_ingredients() {
		global $connection;
		
		$query = "SELECT * FROM ingredients";
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	function list_all_amounts() {
		global $connection;
		
		$query = "SELECT amt FROM ingredients_in_recipes";
		
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		return $result;
	}
	
	function confirm_query($query) {
		global $connection;
		
		if($query) {
			return true;
		}
		die("Database query failed." . mysqli_error($connection));
	}
	
	function get_ingredients($recipe_id) {
		
		global $connection;
		
		$query = "SELECT ingred_name, amt "; 
		$query .= "FROM ingredients ";
		$query .= "INNER JOIN (SELECT * FROM ingredients_in_recipes WHERE recipe_id = {$recipe_id}) ir ";
		$query .= "ON id = ir.ingred_id";
		
		$result = mysqli_query($connection, $query);
		return $result;
	}
	
	function add_ingredient($ingred_name, $amt, $recipe_id) {
		global $connection;
		
		//add the ingredient name to the ingredients table
		$query = "INSERT INTO ingredients (";
		$query .= "ingred_name";
		$query .= ") VALUES (";
		$query .= "'{$ingred_name}'";
		$query .= ") ";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		//get the last ingredient id added to the table
		$ingred_query = "SELECT id";
		$ingred_query .= " FROM ingredients";
		$ingred_query .= " ORDER BY id DESC";
		$ingred_query .= " LIMIT 1;";
		$result = mysqli_query($connection, $ingred_query);
		$ingred_id = mysqli_fetch_assoc($result);
		$ingred_count = $ingred_id['id'];
		
		//add the ingredient id, recipe_id, and the amount to the ingredients_in_recipes table
		$query = "INSERT INTO ingredients_in_recipes (";
		$query .= "ingred_id, recipe_id, amt";
		$query .= ") VALUES (";
		$query .= "'{$ingred_count}', '{$recipe_id}', '{$amt}'";
		$query .= "); ";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
	}
	
	function add_recipe($name, $ingredients, $amts, $instructions) {
		global $connection;
		
		$name = mysqli_real_escape_string($connection, $name);
		$instructions = mysqli_real_escape_string($connection, $instructions);
		
		//add the recipe name and the instructions to the my_recipes table
		$query = "INSERT INTO my_recipes (";
		$query .= " name, instructions";
		$query .= ") VALUES (";
		$query .= " '{$name}', '{$instructions}'";
		$query .= ") ";
		$result = mysqli_query($connection, $query);
		confirm_query($result);
		
		
		//get the last recipe id added to the table
		$recipe_id_query = "SELECT id";
		$recipe_id_query .= " FROM my_recipes";
		$recipe_id_query .= " ORDER BY id DESC";
		$recipe_id_query .= " LIMIT 1";
		$result = mysqli_query($connection, $recipe_id_query);
		$recipe_id = mysqli_fetch_assoc($result);
		$recipe_count = $recipe_id['id'];
		
		for($i = 0; $i < sizeof($ingredients); $i++) {
			$ingredient = mysqli_real_escape_string($connection, $ingredients[$i]);
			$amt = mysqli_real_escape_string($connection, $amts[$i]);
			add_ingredient($ingredient, $amt, $recipe_count);
		}
		
		return $result;
	}
?>
