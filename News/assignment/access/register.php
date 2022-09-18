<?php session_start(); ?>

<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
include '../header.php';
include '../dbController/dbController.php';

 ?>

 <main class="register">

 <h2 class="loginText">Register</h2>

 <form class="" action="register.php" method="post">

   <label for="email">Email</label>
   <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
     echo $_POST['email'];
   } ?>" required><br>

   <label for="password">Password</label>
   <input type="password" name="password" required><br>

   <label for="name">Name</label>
   <input id="confirmUp" type="text" name="name" value="<?php if (isset($_POST['name'])) {
     echo $_POST['name'];
   } ?>" required>

   <input id = "confirm" type="radio" name="confirm" value="confirm" required>Confirm registration</input><br>

   <input type="submit" name="submit" value="Register">
 </form>
 </main>

 <?php
 if (isset($_POST['submit'])) {
   $userEmail = strtoupper($_POST['email']);
   if (strlen($_POST['password']) < 8) {
     echo "Password must be at least 8 characters long";
   }else {
     $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
   }
   $userName = strtoupper($_POST['name']);
   if (empty($userEmail)) {
     echo "Insert email";
   }
   elseif (empty($userPassword)) {
     echo "Insert password";
   }
   elseif (empty($userName)) {
     echo "Insert name";
   }
   elseif (empty($_POST['confirm'])) {
     echo "Confirm registration";
   }
   else {
     $userDetails = [$userEmail, $userPassword, $userName];
     if(insertUser($userDetails)){
       redirect('login.php');
     }
     else {
       echo "User can not be registered";
     }
   }
 }
  ?>

 <?php
include '../footer.php';
  ?>
