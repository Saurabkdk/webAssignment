<?php
//for the use of session
session_start();

//including the necessary files
include '../dbController/dbController.php';
include '../access/validation.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {
  //check if the article is deleted
  if (deleteArticle($_GET['id'])) {
    //redirect to login
    redirect('adminArticles.php');
  }
  //if not deleted, display corresponding message
  else {
    echo "Article could not be deleted";
  }
}
//if the admin is not logged in, redirect to login
else {
  redirect('../access/login.php');
}

?>
