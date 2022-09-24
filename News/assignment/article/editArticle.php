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

if (isset($_SESSION['adminLogin'])) {

  //get the details of the article to be edited
  $getOneArticle = getOneArticle($_GET['id']) -> fetch();
  ?>

  <!-- css to edit the article -->
  <!-- <main class="addArticle"> -->

  <h2 class="loginText">Edit Article</h2>

  <form class="" action="editArticle.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">

    <label for="title">Title</label>
    <input type="text" name="title" value="<?php echo $getOneArticle[0] ?>" required><br>

    <label for="content">Content</label>
    <textarea class="textarea" name="content" rows="10" cols="100" required><?php echo $getOneArticle[3] ?></textarea>

    <label for="category">category</label>
    <select name="category">
      <?php

      //get all the categories from the database
      $getCategory = getCategory();
      //list all the categories from the database
      while($categoryList = $getCategory -> fetch()){
        echo '<option value="'. $categoryList[0]. '"';
        //check which category was selected and display it
        if(getCategoryName($getOneArticle[2]) == $categoryList[0]) echo 'selected = "selected"';
        echo '>' . $categoryList[0] . '</option>';
      }
      ?>
    </select><br>
    <br>

    <label for="uploadImage">Upload Image</label>
    <input type="file" name="uploadImage"><br>
    <input type="submit" name="edit" value="Edit Article">
    <br>
    <a href="adminArticles.php"><button class="formCancel" type="button">Cancel</button></a>
  </form>
  <!-- </main> -->

  <?php
  //check if the edit button was checked
  if (isset($_POST['edit'])) {
    //if a image is selected, get the file name
    $imageName = $_FILES['uploadImage']['name'];            //codes from line 65, 66 and 68 was researched from a website
    $tempImgName = $_FILES['uploadImage']['tmp_name'];      //https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
    //path to store the image selected
    $store = "../public/images/articles/";

    //get the data from the fields of the form
    $editArticleTitle = $_POST['title'];
    $editArticleContent = $_POST['content'];
    //get the category id
    $editArticleCategory = getCategoryId($_POST['category']);
    //if an image is seleted
    //store the image name in database
    $editArticleImage = $imageName;

    //check if no image is selected
    if (empty($editArticleImage)) {
      //if image not selected, keep the same name in database
      $editArticleImage = $getOneArticle[4];
    }

    //storing all the data in a variable
    $articleDetails = [$editArticleTitle, $editArticleContent, $editArticleCategory, $editArticleImage, $_GET['id']];

    //check if an image is selected
    if (isset($_FILES['uploadImage'])) {
      //upload image into the folder of the given path        //line 97 code was researched from a website
      move_uploaded_file($tempImgName, $store.$imageName);    //https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/
    }
    //check if the title field is empty
    if (empty($editArticleTitle)) {
      echo "Insert Title";
    }
    //check if the content field is empty
    if (empty($editArticleContent)) {
      echo "Insert Content";
    }
    //if all the fields are filled up, perform the following actions
    else {
      // check the article is wdited
      if (editArticle($articleDetails)) {
        //redirect back
        redirect('adminArticles.php');
      }
      //if the article is not updated, diplay corresponding message
      else {
        echo "Article could not be updated";
      }
    }

  }
  ?>

  <?php
}
//if admin is not logged in, redirect back to login
else {
  redirect('../access/login.php');
}
//including footer for the page
include '../footer.php';
?>


<!-- Code in lines 62, 63, 65, 88
Harvard Referencing:
GeeksforGeeks. (2020). How to Upload Image into Database and Display it using PHP ? [online] Available at: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/. -->
