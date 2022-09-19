<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

include '../header.php';
include '../access/validation.php';

if (isset($_SESSION['adminLogin'])) {

 ?>

<div class="categoryList">
  <div class="categoryHead">
    <h1>Categories</h1>
    <div>
      <a href="addCategory.php"><button type="button">Add Category</button></a>
    </div>
  </div>
<ul>
  <?php
  $categoryList = getCategory();
  while ($category = $categoryList -> fetch()) {
    echo '<li><div class="categoryName">';
    echo '<div>'. $category[0] .'</div>';
    echo '<div>';
    echo '<a href="editCategory.php?id='. $category[1] .'"><p>Edit</p></a>';
    echo '<a href="deleteCategory.php?id='. $category[1] .'"><p>Delete</p></a>';
    echo '</div>';
    echo '</div></li>';
  }
   ?>
</ul>
</div>

 <?php
}
else {
  redirect('../access/login.php');
}
include '../footer.php';
?>
