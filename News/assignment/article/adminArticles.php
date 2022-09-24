<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the necessary files for the file
include '../header.php';
include 'articleTitleGenerator.php';
include '../access/validation.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {

  ?>

  <!-- html for displaying the articles -->
  <div class="articles">
    <h1>Articles</h1>

    <!-- buttons to display only if admin is Logged in -->
    <?php if (isset($_SESSION['adminLogin'])): ?>
      <div class="optionButton">
        <a href="addArticle.php"><button type="button">Add Article</button></a>
        <a href="../category/adminCategories.php"><button type="button">View Categories</button></a>
      </div>
    <?php endif; ?>
  </div>

  <?php
  //get the articles from the database
  $getAdminArticles = getAdminArticles();

  //display all the articles in a row until each row is fetched
  while ($adminArticles = $getAdminArticles -> fetch()) {
    //create an object of the class articleTitleGenerator
    $articleTitle = new articleTitleGenerator();

    //add values in the attributes of the class
    $articleTitle -> articleLink = "article.php?id=".$adminArticles[0];
    $articleTitle -> articleId = $adminArticles[0];
    $articleTitle -> articleTitle = $adminArticles[1];
    $articleTitle -> articleDate = $adminArticles[2];
    $articleTitle -> articleCategory = getCategoryName($adminArticles[3]);

    //if an image is selected, pass its name to the attribute
    if (strlen($adminArticles[4]) > 0) {
      $articleTitle -> articleImage = $adminArticles[4];
    }
    //if no image is selected, display a default image
    else {
      $articleTitle -> articleImage = 'news.jpg';
    }
    //display the articles with the help of html in the class
    echo $articleTitle -> generateArticleTitle();
  }


  ?>

  <?php
}
//of the admin is not logged in
else {
  if(!isset($_SESSION['adminLogin'])){
    //redirect back to login
    redirect("../access/login.php");
  }
}
//including footer for the page
include '../footer.php';
?>
