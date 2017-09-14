<?php 
    session_start();

	require_once("../includes/functions.php");
	require_once("../includes/db_connection.php");
    require_once("../includes/auth_functions.php");

    if(!isset($_SESSION['valid_user']) && !isset($_SESSION['public'])) {
        redirect_to('main_page.php');
    }
	
		if(isset($_GET['id'])) {
				$recipe_id = $_GET['id'];
				$name = $_GET['name'];
				$instructions = $_GET['instructions'];
			}
		else {
			redirect_to("index_of_recipes.php");
		}
?>

	<h2><?php echo $name ?></h2>
	<h3>Ingredients</h3>
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
