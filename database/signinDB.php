<?php

use function password_hash;

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == 'createUser') {
  if ($_POST['formPassword'] != '' && $_POST['formName'] != '' && $_POST['formEmail'] != '') {

    $data = [
      'id' => uniqid(),
      'name' => $_POST['formName'],
      'email' => $_POST['formEmail'],
      'password' => password_hash($_POST['formPassword'], PASSWORD_DEFAULT),
    ];


    // Prepare a SQL statement to insert user data into the 'users' table
    $requeteUser = $database->prepare("INSERT INTO users (id, name, email, password) VALUES (:id, :name, :email, :password)");

    if ($requeteUser->execute($data)) {
      
      $_SESSION['user'] = $data['id'];
      header('Location: ../index.php');

    } else {
      echo "An error has occured.";
    }

  } else {
    echo 'Incomplete form'; // Incomplete form
  }
}

?>