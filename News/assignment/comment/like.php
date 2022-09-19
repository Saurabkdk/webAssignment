<?php
session_start();

include '../dbController/dbController.php';
include '../access/validation.php';

if (isset($_SESSION['userLogin'])) {
  if (checkLike($_SESSION['userLogin'], $_GET['id'])) {
    $likeDetails = [0, $_SESSION['userLogin'], $_GET['id']];
  }
  else {
    $likeDetails = [1, $_SESSION['userLogin'], $_GET['id']];
  }
  addLike($likeDetails);
}

redirect('../article/article.php?id='. $_GET['id'] .'');

 ?>
