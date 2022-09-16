<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

include '../dbController/dbController.php';
include '../header.php';

if (isset($_SESSION['adminLogin'])) {
	redirect('../article/adminArticles.php');
}
elseif (isset($_SESSION['userLogin'])) {
	redirect('../index.php');
}
else {

?>

<main class="login">

<h2 class="loginText">Login</h2>

<form class="" action="login.php" method="post">

  <label for="email">Email</label>
  <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
  } ?>" required><br>

  <label for="password">Password</label>
  <input type="password" name="password" required><br>

  <input type="submit" name="submit" value="Login">
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

    if(loginAdmin($emailLogin, $passwordLogin)){
      $_SESSION['adminLogin'] = loginAdmin($emailLogin, $passwordLogin);
      redirect("../article/adminArticles.php");
    }
    else{
      redirect("Account does not exist");
    }
  }

}

?>
<?php
}
include '../footer.php';
?>
