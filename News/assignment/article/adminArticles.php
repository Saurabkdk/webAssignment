<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include 'articleTitleGenerator.php';
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {

 ?>

 <div class="articles">
 <h1>Articles</h1>
 <div class="optionButton">
 <a href="addArticle.php"><button type="button">Add Article</button></a>
 <a href="../category/adminCategories.php"><button type="button">View Categories</button></a>
 <!-- <div class="options">
 <a href="#">Add Article</a>
 <a href="#">View Categories</a>
 </div> -->
 </div>
 </div>

<?php
$getAdminArticles = getAdminArticles();


while ($adminArticles = $getAdminArticles -> fetch()) {
  $articleTitle = new articleTitleGenerator();

  $articleTitle -> articleId = $adminArticles[0];
  $articleTitle -> articleTitle = $adminArticles[1];
  $articleTitle -> articleDate = $adminArticles[2];
  $articleTitle -> articleCategory = getCategoryName($adminArticles[3]);
  if (strlen($adminArticles[4]) > 0) {
    $articleTitle -> articleImage = $adminArticles[4];
  }
  else {
    $articleTitle -> articleImage = 'news.jpg';
  }
  echo $articleTitle -> generateArticleTitle();
}


 ?>

 <?php
}
else {
  if(!isset($_SESSION['adminLogin'])){
    redirect("../access/login.php");
  }
}
include '../footer.php';
  ?>
