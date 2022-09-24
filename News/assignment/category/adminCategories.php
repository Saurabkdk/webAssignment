<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

//including the required files for the file
include '../header.php';
include '../access/validation.php';

//check admin is logged in
if (isset($_SESSION['adminLogin'])) {

  ?>

  <!-- html for displaying the articles -->
  <div class="categoryList">
    <div class="categoryHead">
      <h1>Categories</h1>
      <div>
        <a href="addCategory.php"><button type="button">Add Category</button></a>
      </div>
    </div>
    <ul>

      <?php
      //get all the categories from the database
      $categoryList = getCategory();

      echo "<table>";
      echo "<tbody>";
      //list all the categories
      while ($category = $categoryList -> fetch()) {
        // echo '<li><div class="categoryName">';
        // echo '<div>'. $category[0] .'</div>';
        // echo '<div>';
        // echo '<a href="editCategory.php?id='. $category[1] .'"><p>Edit</p></a>';
        // echo '<a href="deleteCategory.php?id='. $category[1] .'"><p>Delete</p></a>';
        // echo '</div>';
        // echo '</div></li>';
        echo "<tr>";
        echo '<td>'. $category[0] .'<td>';
        echo '<td><a href="editCategory.php?id='. $category[1] .'">Edit</a><td>';
        echo '<td><a href="deleteCategory.php?id='. $category[1] .'">Delete</a><td>';
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      ?>
    </ul>
  </div>

  <?php
}
//if admin is not logged in redirect to login
else {
  redirect('../access/login.php');
}
//including footer for the page
include '../footer.php';
?>
