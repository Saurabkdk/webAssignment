<?php
//for use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

//including the required files
include '../header.php';
include '../access/validation.php';

?>

<!-- html for signing up of user -->
<!-- <main class="register"> -->

<h2 class="loginText">Register</h2>

<form class="" action="register.php" method="post">

  <label for="email">Email</label>
  <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
  } ?>" required><br>

  <label for="password">Password</label>
  <input type="password" name="password" required><br>

  <label for="name">Name</label>
  <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
  } ?>" required>

  <label for="confirm" class="confirm">Comfirm</label>
  <input type="radio" name="confirm" value="confirm" required style="width:2%;"></input><br>

  <input type="submit" name="submit" value="Register">
</form>
<!-- </main> -->

<?php

//if the submit button is clicked, perform the following actions
if (isset($_POST['submit'])) {

  //get the email from form, uppercase and validate it
  $userEmail = strtoupper(validateFields($_POST['email']));

  //if the password length is less than 8, show respective error
  if (strlen($_POST['password']) < 8) {
    echo "Password must be at least 8 characters long";
  }
  //if not hash the password from the form
  else {
    $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }

  //get the name from form, uppercase and validate it
  $userName = strtoupper($_POST['name']);

  //check if email is entered
  if (empty($userEmail)) {
    echo "Insert email";
  }
  //check if correct input for password
  elseif (empty($userPassword)) {
    echo "Insert password";
  }
  //check if name is inserted
  elseif (empty($userName)) {
    echo "Insert name";
  }
  //check if the radio button is checked
  elseif (empty($_POST['confirm'])) {
    echo "Confirm registration";
  }
  //if all the field are filled correctly, perform following actions
  else {
    //check if the email inserted is in correct format
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {

      //storing all the form data in an array
      $userDetails = [$userEmail, $userPassword, $userName];

      //check if the table for user is empty
      if(checkUsersExist()){
        //check if the inserted email exists in table
        if (checkUserEmail($userEmail) || checkAdminEmail($userEmail)) {
          //display error if email already exists
          echo "Email already exists";
        }
        // if email does not exist
        else {
          //check if user data is inserted
          if(insertUser($userDetails)){
            //redirect to login
            redirect('login.php');
          }
          else {
            //if cannot be added to table, display message
            echo "User can not be registered";
          }
        }
      }
      //if the table is empty
      else {
        //check if user is inserted into the table
        if (checkUserEmail($userEmail) || checkAdminEmail($userEmail)) {
          echo "Email already exists";
        }
        else {
          if(insertUser($userDetails)){
            redirect('login.php');
          }
          //if not inserted, display message
          else {
            echo "User can not be registered";
          }
        }
      }
    }
  }
}
?>

<?php
//including footer for the page
include '../footer.php';
?>
