<?php session_start() ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../dbController/dbController.php';

if (isset($_SESSION['adminLogin'])) {

  $getOneArticle = getOneArticle($_GET['id']) -> fetch();
  ?>

  <main class="addArticle">

    <h2 class="loginText">Edit Article</h2>

    <form class="" action="editArticle.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">

      <label for="title">Title</label>
      <input type="text" name="title" value="<?php echo $getOneArticle[0] ?>" required><br>

      <label for="content">Content</label>
      <textarea class="textarea" name="content" rows="10" cols="100" required><?php echo $getOneArticle[3] ?></textarea>

      <label for="category">category</label>
      <select name="category">
        <?php
        $getCategory = getCategory();
        while($categoryList = $getCategory -> fetch()){
          echo '<option value="'. $categoryList[0]. '"';
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
  </main>

  <?php
  if (isset($_POST['edit'])) {
    $editArticleTitle = $_POST['title'];
    $editArticleContent = $_POST['content'];
    $editArticleCategory = getCategoryId($_POST['category']);
    if (isset($_POST['uploadImage'])) {
      $editArticleImage = $_POST['uploadImage'];
    }
    else {
      $editArticleImage = $getOneArticle[4];
    }
    $articleDetails = [$editArticleTitle, $editArticleContent, $editArticleCategory, $editArticleImage, $_GET['id']];
    if (editArticle($articleDetails)) {
      redirect('adminArticles.php');
    } else {
      echo "Article could not be updated";
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
