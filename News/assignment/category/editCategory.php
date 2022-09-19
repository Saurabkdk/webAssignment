<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../access/validation.php';

if (isset($_SESSION['adminLogin'])) {

$categoryName =  getCategoryName($_GET['id']);
$categoryId = $_GET['id'];
 ?>

 <main class="addCategory">

 <h2 class="categoryText">Edit Category</h2>

 <form class="" action="editCategory.php?id=<?php echo $categoryId ?>" method="post">

   <label for="category">Category</label>
   <input type="text" name="category" value="<?php echo $categoryName ?>" required><br>

   <input type="submit" name="edit" value="Edit Category">
   <br>
   <a href="adminCategories.php"><button class="formCancel" type="button">Cancel</button></a>
 </form>
 </main>

 <?php
if(isset($_POST['edit'])){
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
