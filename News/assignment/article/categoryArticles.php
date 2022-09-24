<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//include the required files for the file
include '../header.php';
include 'articleTitleGenerator.php';
include '../access/validation.php';


?>

<!-- html to display the articles -->
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
//get all the articles of the specified category
$categoryArticles = getCategoryArticle($_GET['id']);

//while all the rows are being fetched, perform the following actions
while ($adminArticles = $categoryArticles -> fetch()) {
  //creating an object of a class
  $articleTitle = new articleTitleGenerator();

  //adding values to the class attributes
  $articleTitle -> articleLink = "article.php?id=".$adminArticles[0];
  $articleTitle -> articleId = $adminArticles[0];
  $articleTitle -> articleTitle = $adminArticles[1];
  $articleTitle -> articleDate = $adminArticles[2];
  $articleTitle -> articleCategory = getCategoryName($_GET['id']);

  //if there is a image pass the name of the image
  if (strlen($adminArticles[3]) > 0) {
    $articleTitle -> articleImage = $adminArticles[3];
  }
  //if there is no image, pass a default name
  else {
    $articleTitle -> articleImage = 'news.jpg';
  }
  //display the html view
  echo $articleTitle -> generateArticleTitle();
}


?>

<?php

//including footer for the page
include '../footer.php';
?>
