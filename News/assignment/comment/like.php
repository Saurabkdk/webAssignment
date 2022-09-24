<?php
//for the use of session
session_start();

//including the required files
include '../dbController/dbController.php';
include '../access/validation.php';

//check if user is logged in
if (isset($_SESSION['userLogin'])) {
  //check if the user has liked a article
  if (checkLike($_SESSION['userLogin'], $_GET['id'])) {
    //if liked, unlike the article
    $likeDetails = [0, $_SESSION['userLogin'], $_GET['id']];
  }
  //if the article is not liked, like it
  else {
    $likeDetails = [1, $_SESSION['userLogin'], $_GET['id']];
  }
  //perform the database function
  addLike($likeDetails);
}

//redirect back
redirect('../article/article.php?id='. $_GET['id'] .'');

?>
