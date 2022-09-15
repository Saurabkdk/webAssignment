<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
if ($_SESSION['adminLogin']) {

include '../header.php';
include 'articleTitleGenerator.php';
include '../dbController/dbController.php';
 ?>

 <div>
   <h1>Articles</h1>
 </div>

<?php
$getAdminArticles = getAdminArticles();

while ($adminArticles = $getAdminArticles -> fetch()) {
  $articleTitle = new articleTitleGenerator();

  $articleTitle -> articleTitle = $adminArticles[1];
  $articleTitle -> articleDate = $adminArticles[2];
  $articleTitle -> articleCategory = getCategoryName($adminArticles[3]);
  if (strlen($adminArticles[4]) >0) {
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
include '../footer.php';
  ?>
