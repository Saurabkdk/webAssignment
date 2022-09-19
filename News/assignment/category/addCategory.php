<?php session_start() ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../access/validation.php';

if (isset($_SESSION['adminLogin'])) {

 ?>

 <main class="addCategory">

 <h2 class="categoryText">Add Category</h2>

 <form class="" action="addCategory.php" method="post">

   <label for="category">Category</label>
   <input type="text" name="category" value="<?php if (isset($_POST['category'])) {
     echo $_POST['category'];
   } ?>" required><br>

   <input type="submit" name="add" value="Add Category">
   <br>
   <a href="adminCategories.php"><button class="formCancel" type="button">Cancel</button></a>
 </form>
 </main>

 <?php
if (isset($_POST['add'])) {
$newCategory = strtoupper(validateFields($_POST['category']));

if(addCategory($newCategory)){
  redirect('adminCategories.php');
}
else{
  echo "Category could not be added";
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
