<?php 

session_start();
use function password_hash;
use function password_verify;

try {
  // Create a new PDO instance to connect to the MySQL database
  $database = new PDO('mysql:host=localhost;dbname=Twitter', 'root', 'root');
} catch (PDOException $e) {
  // If an exception occurs, display the error message and terminate the script
  die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "login") {
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

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "logout") {
  session_destroy();
  header('Location: ../index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "deleteUser") {
  $data = [
    'id' => $_SESSION['user']['id'],
  ];

  $requeteUser = $database->prepare("DELETE FROM users WHERE id = :id");
  $requeteUser->execute($data);

  session_destroy();
  header('Location: ../index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == 'signup') {
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

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "createTweet") {
  if ($_POST['tweetContent'] != '') {
    $data = [
      'tweet_id' => uniqid(),
      'user_id' => $_SESSION['user'],
      'content' => $_POST['tweetContent'],
    ];

    $requeteTweet = $database->prepare("INSERT INTO tweets (tweet_id, user_id, content) VALUES (:tweet_id, :user_id, :content)");
    $requeteTweet->execute($data);
    header('Location: ../home.php');
  }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "deleteTweet") {
  $data = [
    'id' => $_POST['tweetId'],
  ];

  $requeteTweet = $database->prepare("DELETE FROM tweets WHERE tweet_id = :id");
  $requeteTweet->execute($data);
  header('Location: ../home.php');
} 

if ($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['form'] == "search") {
  
  if ($_GET['searchBox__input'] == '') {
    $searchTweets = getTweets($database);
    header('Location: ../explorer.php');
  } else {
    header('Location: ../explorer.php?searchResults=' . $_GET['searchBox__input']);
  }
}


function getTweets($database) {
  $requeteTweets = $database->prepare("SELECT * FROM tweets ORDER BY date DESC");
  $requeteTweets->execute();
  return $requeteTweets->fetchAll(PDO::FETCH_ASSOC);
}

function getUser($database, $id) {
  $data = [
    'id' => $id,
  ];

  $requeteUser = $database->prepare("SELECT * FROM users WHERE id = :id");
  $requeteUser->execute($data);
  return $requeteUser->fetch(PDO::FETCH_ASSOC);
}

function getCurrentUser($database, $id) {
  $data = [
    'id' => $id,
  ];

  $requeteUser = $database->prepare("SELECT * FROM users WHERE id = :id");
  $requeteUser->execute($data);
  return $requeteUser->fetch(PDO::FETCH_ASSOC);
}

function search($database, $search) {
  $data = [
    'search' => "%".$search."%",
  ];

  $requeteSearch = $database->prepare("SELECT * FROM tweets WHERE content LIKE :search");
  $requeteSearch->execute($data);
  return $requeteSearch->fetchAll(PDO::FETCH_ASSOC);
}

?>