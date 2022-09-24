<?php
session_start();
?>

<?php
include './dbController/dbController.php';
include './article/articleTitleGenerator.php';
include './access/validation.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>
  <title>Northampton News - Home</title>
</head>
<body>
  <header>
    <section>
      <h1>Northampton News</h1>
    </section>
  </header>
  <nav>
    <ul>
      <li><a href="index.php">Latest Articles</a></li>
      <li><a href="#">Select Category</a>
        <ul>
          <?php

          //get all the categories from the database
          $getCategory = getCategory();

          //displaying all the categories
          while($categoryList = $getCategory -> fetch()){
            echo '<li><a class="articleLink" href="./article/categoryArticles.php?id='. $categoryList[1] .'">'. $categoryList[0] .'</a></li>';
          }
          ?>
        </ul>
      </li>
      <?php
      //check if admin is logged in
      if(isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])){
        //if either of admin or user logged in, option to logout
        echo '<li><a href="./access/logout.php">Logout</a></li>';
      }
      //if no one is logged in, options to login and register
      else {
        echo '<li><a href="./access/login.php">Login</a></li>';
        echo '<li><a href="./access/register.php">Register</a></li>';
      }
      ?>
    </ul>
  </nav>
  <img src="images/banners/randombanner.php" />
  <main>
    <!-- <nav>
    <ul>
    <li><a href="#">Sidebar</a></li>
    <li><a href="#">This can</a></li>
    <li><a href="#">Be removed</a></li>
    <li><a href="#">When not needed</a></li>
  </ul>
</nav> -->

<!-- html for displaying the articles -->
<div class="articles">
  <h1>Articles</h1>
  <?php
  //if admin is logged in, show options for adding article and viewing categories
  if (isset($_SESSION['adminLogin'])): ?>
  <div class="optionButton">
    <a href="addArticle.php"><button type="button">Add Article</button></a>
    <a href="../category/adminCategories.php"><button type="button">View Categories</button></a>
  </div>
<?php endif; ?>
</div>

<?php
//get all the articles from the database
$getAdminArticles = getAdminArticles();

//fetch all the rows from the table
while ($adminArticles = $getAdminArticles -> fetch()) {
  //creating an object of a class
  $articleTitle = new articleTitleGenerator();

  //pass values to the class attributes
  $articleTitle -> articleLink = "./article/article.php?id=".$adminArticles[0];
  $articleTitle -> articleId = $adminArticles[0];
  $articleTitle -> articleTitle = $adminArticles[1];
  $articleTitle -> articleDate = $adminArticles[2];
  $articleTitle -> articleCategory = getCategoryName($adminArticles[3]);

  //if an image is selected, store in database
  if (strlen($adminArticles[4]) > 0) {
    $articleTitle -> articleImage = $adminArticles[4];
  }
  //if image not selected, store default image name
  else {
    $articleTitle -> articleImage = 'news.jpg';
  }
  //display the article view
  echo $articleTitle -> generateArticleTitle();
}


?>
</main>

<footer>
  &copy; Northampton News 2017
</footer>

</body>
</html>
