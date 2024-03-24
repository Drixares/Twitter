<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "createTweet") {
  if ($_POST['tweetContent'] != '') {

    $data = [
      'id' => uniqid(),
      'author' => $_SESSION['user']['id'],
      'content' => $_POST['tweetContent'],
    ];

    $requeteTweet = $database->prepare("INSERT INTO tweets (tweet_id, user_id, content) VALUES (:id, :author, :content)");
    $requeteTweet->execute($data);
  }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['form'] == "deleteTweet") {
  $data = [
    'id' => $_POST['tweetId'],
  ];

  $requeteTweet = $database->prepare("DELETE FROM tweets WHERE tweet_id = :id");
  $requeteTweet->execute($data);
} 

?>