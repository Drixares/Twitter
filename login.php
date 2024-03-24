<?php 
  session_start();
  if ($_SESSION['user']) {
    header('Location: index.php');
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X / Login</title>
</head>
<body>

  <form action="database/database.php" method="post">
    <input type="hidden" name="form" value="login">

    <label for="formEmail">Email : </label>
    <input type="email" id="formEmail" name="formEmail">
    <label for="formPassword">Password : </label>
    <input type="password" id="formPassword" name="formPassword">

    <button type="submit">Login</button>
  </form>

</body>
</html>