<?php
    session_start();

    require_once("../includes/db_connection.php");
    require_once("../includes/functions.php");
    require_once("../includes/auth_functions.php");

    if(!isset($_SESSION['valid_user']) && !isset($_SESSION['public'])) {
        start_public_session();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Recipes</title>
        <link href="../includes/layouts/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../includes/layouts/css/main_page_style.css" rel="stylesheet" type="text/css">
		<link href="../includes/layouts/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../includes/layouts/css/main.css" rel="stylesheet" type="text/css" />
         
    </head>
    <body>
        <!-- <?php
            $result = list_all_recipes();
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['name'];
            echo "</br>";
        }
            ?> -->
        <section id="main-page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-6 mt-5 mb-5">
                        <h1>GO RECIPES</h1>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <ul class="nav nav-tabs justify-content-center d-xs-flex flex-xs-column">
                            <li class="nav-item">
                                <a id="index-recipe-link" class="nav-link mr-md-5 mr-sm-4" href="index_of_recipes.php">Recipes</a>
                            </li>
                            <li class="nav-item">
                                <a id="index-ingred-link" class="nav-link mr-md-5 mr-sm-4" href="index_of_ingredients.php">Ingredients</a>
                            </li>
                            <li class="nav-item">
                                <a id="add-recipe-link" class="nav-link mr-md-5 mr-sm-4" href="add_recipe.php">Add a Recipe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link diabled" href="#">Search</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-content col-md-12 col-sm-12 mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-sm-4">
                                <img src="../includes/images/food5.jpg" class="img-thumbnail"> 
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <img src="../includes/images/food1.jpg" class="img-thumbnail">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <img src="../includes/images/food6.jpg" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section> <!-- main-page end -->
        
        <?php mysqli_free_result($result)?>
        
        <?php mysqli_close($connection)?>
        
        <script src="../includes/layouts/Javascript/jquery-3.2.1.js"></script>
        <script src="../includes/layouts/Javascript/tether.min.js"></script>
        <script src="../includes/layouts/Javascript/bootstrap.min.js" type="text/javascript"></script>
        <script src="../includes/layouts/Javascript/main_script.js" type="text/javascript"></script>
    </body>
    <footer class="footer">
        <div class="container text-center">
           <span>Copyright <?php echo date("Y"); ?>, GO Recipes</span>
        </div>
    </footer>
</html>
