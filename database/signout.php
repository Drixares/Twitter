<?php

if ($_SERVER['REQUEST_METHOD'] = "POST" && $_POST['form'] == "deleteUser") {
  $data = [
    'id' => $_SESSION['user']['id'],
  ];

  $requeteUser = $database->prepare("DELETE FROM users WHERE id = :id");
  $requeteUser->execute($data);

  session_destroy();
  header('Location: ../index.php');
  exit;
}

?>