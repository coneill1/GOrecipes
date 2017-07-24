<?php 
	require_once("../includes/db_connection.php");
	require_once("../includes/functions.php");
?>

<!DOCTYPE html PUBLIC >

<html lang="en">
	<head>
		<title>Recipes</title>
	</head>
	<body>
		<?php 
			$result = list_all_recipes();
			while($row = mysqli_fetch_assoc($result)) {
				echo $row['name'];
				echo "</br>";
			}
		?>
		
		<form>
			<select name="test">
				<option value="add ingredient">Add ingredient</option>
				<option value="add recipe">Add recipe</option>
			</select>
		</form>
		
		<?php mysqli_free_result($result)?>
		
		<?php mysqli_close($connection)?>
		
	</body>
</html>
