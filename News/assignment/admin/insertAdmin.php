<!-- <?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../access/validation.php';
include '../header.php';
?>

<form class="" action="login.php" method="post">
  <label for="id">A</label><br>
  <input type="text" name="id"><br>
  <label for="email">Email</label><br>
  <input type="email" name="email"><br>
  <label for="password">Password</label><br>
  <input type="password" name="password"><br>
  <input type="submit" name="submit">
</form>

<?php

if (isset($_POST['submit'])) {
  $id = validateFields($_POST['id']);
  $password = validateFields($_POST['password']);

  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    if(insertAdmin($_POST['email'], $password)){
      echo "Admin Inserted";
    }
    else {
      echo "Admin not inserted";
    }
  }
  else {
    echo "Enter valid email";
  }

}

?>
<?php
include '../footer.php';
?> -->
