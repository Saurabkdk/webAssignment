<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {

  ?>

  <main class="addArticle">

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
        $getCategory = getCategory();
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
      <a href="adminArticles.php">div<button class="formCancel" type="button">Cancel</button></a>
    </form>
  </main>

  <?php

  if (isset($_POST['add'])) {

    $imageName = $_FILES['uploadImage']['name'];
    $tempImgName = $_FILES['uploadImage']['tmp_name'];
    $store = "../public/images/articles/";

    $titleArticle = validateFields($_POST['title']);
    $contentArticle = validateFields($_POST['content']);
    $categoryArticle = $_POST['category'];
    $publishDateArticle = date("d M Y");

    $articleDetails = [$titleArticle, $contentArticle, $categoryArticle, $publishDateArticle, $imageName];

    if (empty($titleArticle)) {
      echo "<h2>Insert the title of the article</h2>";
    }
    else if(empty($contentArticle)){
      echo "<h2>Insert the content of the article</h2>";
    }
    else if (empty($categoryArticle)) {
      echo "<h2>Insert the category of the article<h2>";
    }
    else{

      if (isset($_FILES['uploadImage'])) {
        move_uploaded_file($tempImgName, $store.$imageName);
      }

      $addArticle = addArticle($articleDetails);

      if($addArticle){
        echo "Article Added";
      }
      else {
        echo "Article could not be added";
      }
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
