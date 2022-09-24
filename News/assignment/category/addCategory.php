<?php
//for the use of session
session_start()
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the required files
include '../header.php';
include '../access/validation.php';

//check if the user is logged in
if (isset($_SESSION['adminLogin'])) {

  ?>

  <!-- html for adding category -->
  <!-- <main class="addCategory"> -->

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
  <!-- </main> -->

  <?php
  //check if the add category is clicked
  if (isset($_POST['add'])) {
    //get the data from category field
    $newCategory = strtoupper(validateFields($_POST['category']));

    //check if category is added
    if(addCategory($newCategory)){
      //redirect back
      redirect('adminCategories.php');
    }
    //if category is not added, display corresponding message
    else{
      echo "Category could not be added";
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
//including footer for the page
include '../footer.php';
?>
