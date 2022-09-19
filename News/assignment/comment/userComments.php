<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../access/validation.php';
 ?>

 <?php
 $commenter = getUserName($_GET['id']);
  ?>

 <div class="articles">
   <h2>Comments : <?php echo $commenter ?></h2>
 </div>

 <?php
 $getUserComments = getUserComments($_GET['id']);
 while($userComments = $getUserComments -> fetch()){
   $getOneArticle = getOneArticle($userComments[1]);

   $oneArticle = $getOneArticle -> fetch();

  ?>

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
include '../footer.php';
  ?>
