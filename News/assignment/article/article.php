<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])) {

  if ($oneArticle = getOneArticle($_GET['id']) -> fetch()) {
    $oneArticleTitle = $oneArticle[0];
    $oneArticlePublishDate = $oneArticle[1];
    $oneArticleCategory = getCategoryName($oneArticle[2]);
    $oneArticleContent = $oneArticle[3];
    $oneArticleImage = $oneArticle[4];
  ?>

  <div class="articleView">
    <div class="articleTitle">
      <h1><?php echo $oneArticleTitle ?><h1>
      </div>
      <div class="articleDateCategory">
        <div class="articleDate">
          <em><?php echo $oneArticlePublishDate ?></em>
        </div>
        <div class="articleCategory">
          <p><?php echo $oneArticleCategory ?></p>
        </div>
      </div>
      <?php
      if (strlen($oneArticleImage) > 0) {
        echo '<div class="articleImage">';
          echo '<img src="../public/images/articles/'. $oneArticleImage .'" alt="" width="50%" height="400px">';
        echo '</div>';
      }
       ?>
      <div class="articleContent">
        <?php echo $oneArticleContent ?>
      </div>
      <div class="articleEditDelete">
        <p><a href="#">Edit</a></p>
        <p><a href="#">Delete</a></p>
      </div>

    </div>

    <?php
  }
  }
  include '../footer.php';
  ?>
