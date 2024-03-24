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
</body>
</html>