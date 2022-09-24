<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//including the required files
include '../header.php';
include '../access/validation.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {

  ?>

  <!-- html form for adding article -->
  <!-- <main class="addArticle"> -->

  <h2 class="loginText">Add Article</h2>

  <form class="" action="addArticle.php" method="post" enctype="multipart/form-data">

    <label for="title">Title</label>
    <input type="text" name="title" value="<?php if (isset($_POST['title'])) {
      echo $_POST['title'];
    } ?>" required><br>

    <label for="content">Content</label>
    <textarea class="textarea" name="content" rows="10" cols="100" required><?php if (isset($_POST['content'])) {
      echo $_POST['content'];
    } ?></textarea>

    <label for="category">category</label>
    <select name="category" required>
      <option value="">Select Category</option>
      <?php

      //get all the categories from the database
      $getCategory = getCategory();

      //fetch all the categories and display
      while($categoryList = $getCategory -> fetch()){
        echo '<option value="'. $categoryList[0]. '">' . $categoryList[0] . '</option>';
      }
      ?>
    </select><br>
    <br>

    <label for="uploadImage">Upload Image</label>
    <input type="file" name="uploadImage"><br>
    <input type="submit" name="add" value="Add Article">
    <br>
    <a href="adminArticles.php"><button class="formCancel" type="button">Cancel</button></a>
  </form>
  <!-- </main> -->

  <?php
  //check if the add button is clicked
  if (isset($_POST['add'])) {

    //get the name of the image selected
    $imageName = $_FILES['uploadImage']['name'];                //codes from line 65, 66 and 68 was researched from a website
    $tempImgName = $_FILES['uploadImage']['tmp_name'];          //https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
    //path to store the image
    $store = "../public/images/articles/";

    //get all the data from the fields and validate ones necessary
    $titleArticle = validateFields($_POST['title']);
    $contentArticle = validateFields($_POST['content']);
    $categoryArticle = $_POST['category'];
    $publishDateArticle = date("d M Y");

    //store all the fields data in an array
    $articleDetails = [$titleArticle, $contentArticle, $categoryArticle, $publishDateArticle, $imageName];

    //check if the title field is empty
    if (empty($titleArticle)) {
      echo "<h2>Insert the title of the article</h2>";
    }
    //check if the content field is empty
    else if(empty($contentArticle)){
      echo "<h2>Insert the content of the article</h2>";
    }
    //check if the category field is empty
    else if (empty($categoryArticle)) {
      echo "<h2>Insert the category of the article<h2>";
    }
    //if all the fields are inserted, perform the following actions
    else{

      //if an image is selected
      if (isset($_FILES['uploadImage'])) {
        //store the image in the given path                   //line 97 code was researched from a website
        move_uploaded_file($tempImgName, $store.$imageName);  //https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
      }

      //database function for inserting the data into the database
      $addArticle = addArticle($articleDetails);

      //if the data is inserted into the database
      if($addArticle){
        //redirect to another page
        redirect('adminArticles.php');
      }
      //if data is not inserted, display message
      else {
        echo "Article could not be added";
      }
    }
  }
  ?>

  <?php
}
//if the admin is not logged in. redirect back to login page
else {
  redirect('../access/login.php');
}
//including the footer for the page
include '../footer.php';
?>


<!-- Code in lines 65, 66, 68, 97
Harvard Referencing:
GeeksforGeeks. (2020). How to Upload Image into Database and Display it using PHP ? [online] Available at: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/. -->
