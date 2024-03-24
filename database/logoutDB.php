<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "logout") {
  session_destroy();
  header('Location: ../index.php');
  exit;
}

?>