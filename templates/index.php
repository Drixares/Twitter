<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Liste de recettes</h1>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="addUser.php">Add User</a></li>
    <li></li>
  </ul>

  <form action="formulaire.php" method="post">
    <label for="recipe__name">Name</label>
    <input type="text" id="recipe__name" name="recipe__name">
    <label for="recipe__desc">Description</label>
    <textarea type="text" id="recipe__desc" name="recipe__desc" cols="30" rows="10"></textarea>
    <button type="submit">Publier</button>
  </form>

  <form action="database/database.php" method="post">
    <input type="hidden" name="form" value="logout">
    <button type="submit">Logout</button>
  </form>

</body>
</html>