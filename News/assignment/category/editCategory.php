<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the necessary files
include '../header.php';
include '../access/validation.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {

  //get all the categories from the database
  $categoryName =  getCategoryName($_GET['id']);
  $categoryId = $_GET['id'];
  ?>

  <!-- html for editing category -->
  <!-- <main class="addCategory"> -->

  <h2 class="categoryText">Edit Category</h2>

  <form class="" action="editCategory.php?id=<?php echo $categoryId ?>" method="post">

    <label for="category">Category</label>
    <input type="text" name="category" value="<?php echo $categoryName ?>" required><br>

    <input type="submit" name="edit" value="Edit Category">
    <br>
    <a href="adminCategories.php"><button class="formCancel" type="button">Cancel</button></a>
  </form>
  <!-- </main> -->

  <?php

  //check if the edit button is selected
  if(isset($_POST['edit'])){
    $categoryDetails = [strtoupper($_POST['category']), $categoryId];
    //check if the category field is empty, display message
    if (empty($_POST['category'])) {
      echo "Insert Category";
    }
    //if field is filled up, perform the following actions
    else {
      //if the category is edited
      if (editCategory($categoryDetails)) {
        //redirect back
        redirect('adminCategories.php');
      }
      //if the category is not edited, display corresponding message
      else {
        echo "Category could not updated";
      }
    }
  }
  ?>

  <?php
}
//if admin is not logged in
else {
  //redirect back to login
  redirect('../access/login.php');
}
//including the footer for the page
include '../footer.php';
?>
