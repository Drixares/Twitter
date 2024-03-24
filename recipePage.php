<?php 
  require 'recipes.php';
  $id = $_GET['id'];
  $recipe =  $recettes[$id - 1]

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php if($recipe) {showRecipe($recipe);} else { ?> 
    <h1>Recipe not found</h1>
  <?php } ?>
  
</body>
</html>