<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../access/validation.php';

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

      <?php if (isset($_SESSION['adminLogin'])): ?>
        <div class="articleEditDelete">
          <p><a href="editArticle.php?id=<?php echo $_GET['id'] ?>">Edit</a></p>
          <p><a href="deleteArticle.php?id=<?php echo $_GET['id'] ?>">Delete</a></p>
        </div>
      <?php endif; ?>

      <div class="likeComment">

        <div class="addComment">
          <form class="" action="article.php?id=<?php echo $_GET['id']; ?>" method="post">
            <textarea name="commentText" rows="8" cols="100" placeholder="Add a comment..." required></textarea>
            <input style="margin : 1% 0; width: 100px;" type="submit" name="comment" value="Comment">
          </form>
        </div>
        <div class="like">
          <p><a href="../comment/like.php?id=<?php echo $_GET['id']; ?>"><?php if (isset($_SESSION['userLogin']) && !checkLike($_SESSION['userLogin'], $_GET['id'])) {
            echo "Like";
          }
          elseif (isset($_SESSION['adminLogin'])) {
            echo "Like count : ";
          }
          else {
            echo "Unlike";
          } ?></a></p>
          <p><?php echo countLike($_GET['id']); ?></p>
        </div>

      </div>

      <h3 style="padding:1% 0 0 2%;">Comments</h3>

      <div class="userComments">
        <?php
        if ($getComments = getComments($_GET['id']) -> fetch()) {
          echo '<a href="../comment/userComments.php?id='. $getComments[2] .'"><p>'. getUserName($getComments[2]) .'</p></a>';
          echo '<p class="comment">'. $getComments[1] .'</p>';
        }
         ?>
      </div>

    </div>

    <?php
    if (isset($_POST['comment'])) {
      $commentDetails = [validateFields($_POST['commentText']), $_SESSION['userLogin'], $_GET['id']];
      if (addComment($commentDetails)) {
        $articleId = $_GET['id'];
        redirect('article.php?id='. $articleId .'');
      }
      else {
        echo "Comment could not be added";
      }
    }
     ?>

    <?php
  }
  else {
    redirect('../access/login.php');
  }
  }
  include '../footer.php';
  ?>
