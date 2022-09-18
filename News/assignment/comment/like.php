<?php
session_start();

include '../dbController/dbController.php';

if (isset($_SESSION['userLogin'])) {
  $likeDetails = [1, $_SESSION['userLogin'], $_GET['id']];
  addLike($likeDetails);
}

redirect('../article/article.php?id='. $_GET['id'] .'');

 ?>
