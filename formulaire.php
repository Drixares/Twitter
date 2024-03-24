<?php
require 'recipes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recipe__name']) && isset($_POST['recipe__desc'])) {
  $recettes[] = [
    "Nom" => $_POST['recipe__name'],
    "Description" => $_POST['recipe__desc']
  ];

  echo '<pre>';
  print_r($recettes);
  echo '</pre>';

}

?>