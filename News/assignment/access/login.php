<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include 'validation.php';
include '../dbController/dbController.php';
include '../header.php';
?>

<main class="login">
<h2 class="loginText">Login</h2>
<form class="" action="login.php" method="post">
  <label for="email">Email</label>
  <input type="email" name="email" required><br>
  <label for="password">Password</label>
  <input type="password" name="password" required><br>
  <input type="submit" name="submit">
</form>
</main>

<?php

if (isset($_POST['submit'])) {
  $emailLogin = validateFields($_POST['email']);
  $passwordLogin = validateFields($_POST['password']);

  if (empty($emailLogin)) {
    echo "Insert email";
  }
  elseif (empty($passwordLogin)) {
    echo "Insert password";
  }
  else {
    $_SESSION['adminLogin'] = loginAdmin($emailLogin, $passwordLogin);
    if($_SESSION['adminLogin']){
      echo '<script> location.replace("../article/addArticle.php"); </script>';
    }
  }

}

?>
<?php
include '../footer.php';
?>
