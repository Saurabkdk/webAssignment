<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the required files
include '../header.php';
include '../access/validation.php';
?>

<?php
//get the commenter name
$commenter = getUserName($_GET['id']);
?>

<!-- html to show the commenter -->
<div class="articles">
  <h2 style="margin: 2% 0 0 8%;">Comments : <?php echo $commenter ?></h2>
</div>

<?php
//get the comments of the user
$getUserComments = getUserComments($_GET['id']);
//get all the comments of article
while($userComments = $getUserComments -> fetch()){
  $getOneArticle = getOneArticle($userComments[1]);

  $oneArticle = $getOneArticle -> fetch();

  ?>

  <!-- display the comments of the user along with the article -->
  <div class="titleView">
    <div class="text">
      <a href="#"><div class="title">
        <h2><?php echo $oneArticle[0] ?></h2>
      </div></a>
      <div class="commentUser">
        <p><?php echo $commenter ?></p>
        <p><?php echo $userComments[0] ?></p>
      </div>
    </div>
    <div class="image">
      <?php
      if (strlen($oneArticle[4]) > 0) {
        echo '<img src = "../public/images/articles/'. $oneArticle[4] .'" alt = "'. $oneArticle[4] .'" width = "500px" height = "300px">';
      }
      else {
        echo '<img src = "../public/images/articles/news.jpg" alt = "news" width = "500px" height = "300px">';
      }
      ?>

    </div>

  </div>

  <?php
}
//including footer for the page
include '../footer.php';
?>
