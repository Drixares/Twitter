<?php 

session_start();

try {
  // Create a new PDO instance to connect to the MySQL database
  $database = new PDO('mysql:host=localhost;dbname=Twitter', 'root', 'root');
} catch (PDOException $e) {
  // If an exception occurs, display the error message and terminate the script
  die('Erreur : ' . $e->getMessage());
}

require 'logoutDB.php';
require 'loginDB.php';
require 'signinDB.php';
require 'signout.php';
require 'tweets.php';

?>