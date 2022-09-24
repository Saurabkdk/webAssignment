<?php
//for the use of session
session_start();
?>
<!-- for the use of session -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the necessary files
include '../header.php';
include '../access/validation.php';

//get all the details of the article
if ($oneArticle = getOneArticle($_GET['id']) -> fetch()) {
  //store all the details in respective variables
  $oneArticleTitle = $oneArticle[0];
  $oneArticlePublishDate = $oneArticle[1];
  $oneArticleCategory = getCategoryName($oneArticle[2]);
  $oneArticleContent = $oneArticle[3];
  $oneArticleImage = $oneArticle[4];
  ?>

  <!-- html for viewing articles -->
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
      //if there is image for article, display it
      if (strlen($oneArticleImage) > 0) {
        echo '<div class="articleImage">';
        echo '<img src="../public/images/articles/'. $oneArticleImage .'" alt="" width="80%" height="500px">';
        echo '</div>';
      }
      ?>
      <div class="articleContent">
        <?php echo $oneArticleContent ?>
      </div>

      <?php
      //if admin is logged in, display the edit and delete options
      if (isset($_SESSION['adminLogin'])): ?>
      <div class="articleEditDelete">
        <p><a class="articleLink" href="editArticle.php?id=<?php echo $_GET['id'] ?>">Edit</a></p>
        <p><a class="articleLink" href="deleteArticle.php?id=<?php echo $_GET['id'] ?>">Delete</a></p>
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
        <p><a href="../comment/like.php?id=<?php echo $_GET['id']; ?>"><?php
        // if the post is not liked, show like option
        if (isset($_SESSION['userLogin']) && !checkLike($_SESSION['userLogin'], $_GET['id'])) {
          echo "Like";
        }
        //if admin is logged in show like count
        elseif (isset($_SESSION['adminLogin'])) {
          echo "Like count : ";
        }
        elseif (!isset($_SESSION['userLogin']) && !isset($_SESSION['adminLogin'])) {
          echo "Log in to like";
        }
        //if the post is like, show unlike option
        else {
          echo "Unlike";
        }
        ?>
      </a></p>
      <p><?php echo countLike($_GET['id']); ?></p>
    </div>

  </div>

  <h3 style="padding:1% 0 0 2%;">Comments</h3>

  <div class="userComments">
    <?php
    //check if either admin or user is logged in
    if (isset($_SESSION['userLogin']) || isset($_SESSION['adminLogin'])) {
      //if there is any comments on the post, display it
      $getCommentsArticle = getComments($_GET['id']);
      while ($getComments = $getCommentsArticle -> fetch()) {
        //check if the comment is of a user
        if ($getComments[2] > 0 && !empty($getComments[1])) {
          //if the name of the user is clicked, go to another page
          echo '<a href="../comment/userComments.php?id='. $getComments[2] .'"><p>'. getUserName($getComments[2]) .'</p></a>';
          echo '<p class="comment">'. $getComments[1] .'</p>';
          echo '<p class="commentDate">'. $getComments[4] .'</p>';
        }
        //if the comment is of an admin
        if($getComments[3] > 0 && !empty($getComments[1])) {
          echo '<p style="color: black;">ADMIN</p>';
          echo '<p class="comment">'. $getComments[1] .'</p>';
          echo '<p class="commentDate">'. $getComments[4] .'</p>';
        }
      }
    }
    //if no one is logged in, no comment shown and display corresponding message
    else {
      echo '<p>Log in to see the comments</p>';
    }
    ?>
  </div>

</div>

<?php
//if the comment button is clicked
if (isset($_POST['comment'])) {
  echo "<br>";
  $commentDate = date("d M Y");
  // check if admin is logged in
  if (isset($_SESSION['adminLogin'])) {
    $adminCheck = 1;
    $commentDetails = [validateFields($_POST['commentText']), $_GET['id'], $_SESSION['adminLogin'], $commentDate];
  }
  //if the user is logged in
  else {
    $adminCheck = 0;
    $commentDetails = [validateFields($_POST['commentText']), $_SESSION['userLogin'], $_GET['id'], $commentDate];
  }

  //check if the user is logged in
  if (isset($_SESSION['userLogin'])) {
    //check if the comment is added
    if (addComment($commentDetails)) {
      $articleId = $_GET['id'];
      //reload the page with comment
      redirect('article.php?id='. $articleId .'');
    }
  }
  //check if the admin is logged in
  elseif (isset($_SESSION['adminLogin'])) {
    //check if the comment is added
    if (addCommentAdmin($commentDetails)) {
      $articleId = $_GET['id'];
      //reload the page with comment
      redirect('article.php?id='. $articleId .'');
    }
  }
  //if comment is not added, display message
  else {
    echo "Comment could not be added";
    redirect('../access/login.php');
  }
}
?>

<?php
}
//including footer for the page
include '../footer.php';
?>
