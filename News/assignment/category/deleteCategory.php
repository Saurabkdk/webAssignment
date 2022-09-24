<?php
//for the use of session
session_start()
?>

<!--linking the css-->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the necessary files
include '../header.php';
include '../access/validation.php';

//check if admin is logged in
if (isset($_SESSION['adminLogin'])) {

  //get all the articles of that category
  if (isset($_GET['confirmDelete'])) {
    $categoryArticle = getCategoryArticle($_GET['confirmDelete']);
  }
  else {
    $categoryArticle = getCategoryArticle($_GET['id']);
  }

  //check if there are articles of that category
  if ($categoryArticle -> rowCount() > 0) {
    echo "<h3>All articles of this category will be deleted as well. Confirm delete?</h3>";
    if (isset($_GET['confirmDelete'])) {
      echo '<a href="deleteCategory.php?confirmDelete='. $_GET['confirmDelete'] .'"><p>Confirm delete<p></a>';
    }
    else {
      echo '<a href="deleteCategory.php?confirmDelete='. $_GET['id'] .'"><p>Confirm delete<p></a>';
    }

    if (isset($_GET['confirmDelete'])) {
      //check if the category is deleted
      if (deleteCategory($_GET['confirmDelete'])) {
        //redirect back
        redirect('adminCategories.php');
      }
      //if the category is not deleted, display corresponding message
      else {
        echo "Category could not be deleted";
      }
    }
  }
  else {

    //check if the category is deleted
    if (deleteCategory($_GET['id'])) {
      //redirect back
      redirect('adminCategories.php');
    }
    //if the category is not deleted, display corresponding message
    else {
      echo "Category could not be deleted";
    }
  }

}
//if admin is not logged in, redirect back to login
else {
  redirect('../access/login.php');
}
include '../footer.php';
?>
