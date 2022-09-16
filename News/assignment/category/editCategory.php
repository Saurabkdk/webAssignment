<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {

$categoryName =  getCategoryName($_GET['id']);
$categoryId = $_GET['id'];
 ?>

 <main class="addCategory">

 <h2 class="categoryText">Add Category</h2>

 <form class="" action="editCategory.php?id=<?php echo $categoryId ?>" method="post">

   <label for="category">Category</label>
   <input type="text" name="category" value="<?php echo $categoryName ?>" required><br>

   <input type="submit" name="submit" value="Edit Category">
   <br>
   <a href="adminCategories.php"><button class="formCancel" type="button">Cancel</button></a>
 </form>
 </main>

 <?php
if(isset($_POST['submit'])){
  $categoryDetails = [strtoupper($_POST['category']), $categoryId];
  if (editCategory($categoryDetails)) {
    redirect('adminCategories.php');
  }
  else {
    echo "Category could not updated";
  }
}
  ?>

 <?php
}
else {
  redirect('../access/login.php');
}
include '../footer.php';
  ?>
