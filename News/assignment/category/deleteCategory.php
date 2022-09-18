<?php session_start() ?>

<?php
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {

  if (deleteCategory($_GET['id'])) {
    redirect('adminCategories.php');
  }
  else {
    echo "Category could not be deleted";
  }

}
else {
  redirect('../access/login.php');
}
?>
