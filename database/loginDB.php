<?php

use function password_verify;

if ($_SERVER['REQUEST_METHOD'] = "POST" && $_POST['form'] == "login") {
  if ($_POST['formEmail'] != '' && $_POST['formPassword'] != '') {

    $data = [
      'email' => $_POST['formEmail'],
    ];

    $requeteUser = $database->prepare("SELECT * FROM users WHERE email = :email");
    $requeteUser->execute($data);
    $user = $requeteUser->fetch();

    if ($user && password_verify($_POST['formPassword'], $user['password'])) {
      $_SESSION['user'] = $user['id'];
      header('Location: ../index.php');
      exit;
    } else {
      echo "Email or password incorrect";
    }
  }
}

?>