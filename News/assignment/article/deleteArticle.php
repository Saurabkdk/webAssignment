<?php
session_start();

include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {
  if (deleteArticle($_GET['id'])) {
    redirect('adminArticles.php');
  }
  else {
    echo "Article could not be deleted";
  }
}
else {
  redirect('../access/login.php');
}

 ?>
