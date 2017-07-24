<?php 
	include("../includes/layouts/header.php");
	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
	
	if(!isset($_POST['submit'])) {
		echo "redirecting...";
	}
?>
<div class="page_content">
	<?php
	//get all the form data
		$recipe_name = $_POST['recipe_name'];
		$instructions = $_POST['instructions'];
		
		$ingredients = [];
		$amts = [];
		$size = sizeof($_POST);
		$ingredients_data = array_keys($_POST);
		for($i = 1; $i < $size-2; $i++) {
				
				$key = $ingredients_data[$i];
				
				//skip empty form entries
				if($_POST[$key] == "") {
					continue;
				}
				
				if($i % 2 != 0) {
					$ingredients[] = $_POST[$key];
				} else {
					$amts[] = $_POST[$key];
				}
		}
		
		add_recipe($recipe_name, $ingredients, $amts, $instructions);
	?>
		
	Recipe Added!
	Name: <?php echo $recipe_name?> <br>
	Ingredients: <br><?php for($i = 0; $i < sizeof($ingredients); $i++) {
		echo $i+1 . ": {$ingredients[$i]} - {$amts[$i]}<br>";
	}?>
	Instructions: <?php echo $instructions?> <br>
</div>

<!--<?php mysqli_free_result($result)?>-->
		
<?php include("../includes/layouts/footer.php"); ?>