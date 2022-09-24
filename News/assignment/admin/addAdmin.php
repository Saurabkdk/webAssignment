<?php
//for use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

//include the required files for this file
include '../access/validation.php';
include '../header.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {

  ?>

  <!-- html for adding an admin -->
  <!-- <main class="login"> -->

  <h2 class="addAdminText">Add Admin</h2>

  <form action="addAdmin.php" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
      echo $_POST['email'];
    } ?>"><br>
    <label for="password">Password</label>
    <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Add admin">
    <br>
    <a class="" href="manageAdmins.php"><button class="formCancel" type="button">Cancel</button></a>
  </form>

  <!-- </main> -->

  <?php

  //if the submit button is clicked, perform the following actions
  if (isset($_POST['submit'])) {
    //get the fields and validate it
    $adminEmail = validateFields($_POST['email']);
    $password = $_POST['password'];

    //check if the email field is empty
    if (empty($adminEmail)) {
      //display corresponding message
      echo "Insert Email";
    }
    //check if the password field is empty
    elseif (empty($_POST['password'])) {
      //display corresponding message
      echo "Insert password";
    }
    //check if the password length is less than 8
    elseif (strlen($password) < 8) {
      //display corresponding message
      echo "Password must be at least 8 characters";
    }
    //of all the fields are filled up correctly, perform following actions
    else {

      //check if the email is inserted in correct format
      if(filter_var($adminEmail, FILTER_VALIDATE_EMAIL)){
        //check if the admin table is empty
        if (checkAdminsExist()) {
          //check if the email inserted already exists
          if (checkUserEmail($adminEmail) || checkAdminEmail($adminEmail)) {
            //if it exists, display corresponding message
            echo "Email already exists";
          }
          //if the email does not exist already
          else{
            //check if the admin inserted into the database
            if(insertAdmin(strtoupper($adminEmail), password_hash($password, PASSWORD_DEFAULT))){
              //redirect to another page
              redirect('manageAdmins.php');
            }
            //if not inserted into database, display corresponding message
            else {
              echo "Admin not inserted";
            }
          }
        }
        //if the table is empty
        else {
          if (checkUserEmail($adminEmail) || checkAdminEmail($adminEmail)) {
            echo "Email already exists";
          }
          else {
            //insert the data into database
            if(insertAdmin(strtoupper($adminEmail), password_hash($password, PASSWORD_DEFAULT))){
              //redirect to another page
              redirect('manageAdmins.php');
            }
            else {
              //if not inserted, show corresponding message
              echo "Admin not inserted";
            }
          }
        }
      }
      //if the email is not of valid type, show corresponding message
      else {
        echo "Enter valid email";
      }
    }

  }

  ?>
  <?php
}
//if the admin is not logged in
else {
  //redirect to valid page
  redirect('../access/login.php');
}
//including footer for the page
include '../footer.php';
?>
