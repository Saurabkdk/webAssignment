<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include 'articleTitleGenerator.php';
include '../access/validation.php';

if (isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])) {

 ?>

 <div class="articles">
 <h1>Articles</h1>
 <?php if (isset($_SESSION['adminLogin'])): ?>
   <div class="optionButton">
   <a href="addArticle.php"><button type="button">Add Article</button></a>
   <a href="../category/adminCategories.php"><button type="button">View Categories</button></a>
   </div>
 <?php endif; ?>
 </div>

<?php
$categoryArticles = getCategoryArticle($_GET['id']);


while ($adminArticles = $categoryArticles -> fetch()) {
  $articleTitle = new articleTitleGenerator();

  $articleTitle -> articleLink = "article.php?id=".$adminArticles[0];
  $articleTitle -> articleId = $adminArticles[0];
  $articleTitle -> articleTitle = $adminArticles[1];
  $articleTitle -> articleDate = $adminArticles[2];
  $articleTitle -> articleCategory = getCategoryName($_GET['id']);
  if (strlen($adminArticles[3]) > 0) {
    $articleTitle -> articleImage = $adminArticles[3];
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
