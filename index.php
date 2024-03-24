<?php 

session_start();
if (isset($_SESSION['user'])) {
  header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
  <script src="https://kit.fontawesome.com/d3a9f97c9c.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="leftBox">
      <div class="leftBox__logoBox">
        <img src="ressources/logo.svg" alt="logo">
      </div>
    </div>
    <div class="rightBox">
      <div class="rightBox__content">
        <div class="rightBox__content__titleBox">
          <h1 class="title">Ça se passe maintenant</h1>
        </div>
        <div class="rightBox__content__sBox">
          <h2>Inscrivez-vous.</h2>
          <div class="rightBox__content__sBox__btnBox">
            <div class="signupBtn1"><img src="ressources/google.png" class="minLogo">S'inscrire avec Google</div>
            <div class="signupBtn1"><img src="ressources/apple.svg" class="minLogo">S'inscrire avec Apple</div>
            <div class="orLine">
              <div></div>
              <span>ou</span>
              <div></div>
            </div>
            <div class="createAccountBox">
              <div class="signupBtn" id="signupBtn">Créer un compte</div>
              <p>En vous inscrivant, vous acceptez les Conditions d'utilisation et la Politique de confidentialité, notamment l'Utilisation des cookies.</p>
            </div>
          </div>
        </div>

        <div class="rightBox__content__lBox">
          <h3>Vous avez déjà un compte ?</h3>
          <div class="loginBtn" id="loginBtn">Se connecter</div>
        </div>
      </div>
    </div>
  </div>

  <div class="formBox" id="signupForm">
    <div class="formTop">
      <div class="closeForm">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="logoForm">
        <img src="ressources/logo.svg" alt="logo">
      </div>
    </div>
    <form action="database/formDB.php" method="post">
      <input type="hidden" name="form" value="signup">
      <div class="formContent">
        <h2>Créer votre compte</h2>
        <div class="formInputBox">
          <input type="text" name="formName" id="formName" class="input" required autocomplete="off">
          <label for="formName" class="formLabel">Nom</label>
        </div>
        <div class="formInputBox">
          <input type="email" name="formEmail" id="formEmail" class="input" required autocomplete="off">
          <label for="formEmail" class="formLabel">Email</label>
        </div>
        <div class="formInputBox">
          <input type="password" name="formPassword" id="formPassword" class="input" required autocomplete="off">
          <label for="formPassword" class="formLabel">Mot de passe</label>
        </div>
      </div>
      <button type="submit" class="formBtn">S'inscrire</button>
    </form>
  </div>

  <div class="formBox" id="loginForm">
    <div class="formTop">
      <div class="closeForm">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="logoForm">
        <img src="ressources/logo.svg" alt="logo">
      </div>
    </div>
    <form action="database/formDB.php" method="post">
      <input type="hidden" name="form" value="login">
      <div class="formContent">
        <h2>Se connecter</h2>
        <div class="formInputBox">
          <input type="email" name="formEmail" id="formEmail" class="input" required autocomplete="off">
          <label for="formEmail" class="formLabel">Email</label>
        </div>
        <div class="formInputBox">
          <input type="password" name="formPassword" id="formPassword" class="input" required autocomplete="off">
          <label for="formPassword" class="formLabel">Mot de passe</label>
        </div>
      </div>
      <button type="submit" class="formBtn">Se connecter</button>
    </form>
  </div>

  <script src="js/formulaire.js"></script>
</body>
</html>