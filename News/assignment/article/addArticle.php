<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
if ($_SESSION['adminLogin']) {
  include '../header.php';
  include '../dbController/dbController.php';
  ?>

<main class="addArticle">
  <h2 class="loginText">Add Article</h2>
  <form class="" action="addArticle.php" method="post">
    <label for="title">Title</label>
    <input type="text" name="title"><br>
    <label for="content">Content</label>
    <textarea class="textarea" name="content" rows="10" cols="100"></textarea>
    <label for="category">category</label>
    <select name="category">
      <?php
      $getCategory = getCategory();
      while($categoryList = $getCategory -> fetch()){
        echo '<option value="$categoryList[0]">' . $categoryList[0] . '</option>';
      }
      ?>
    </select><br>
    <input type="submit" name="submit">
  </form>
</main>

<?php
}
include '../footer.php';
?>
