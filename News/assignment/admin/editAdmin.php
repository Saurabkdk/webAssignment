<?php
//for use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//include required files
include '../access/validation.php';
include '../header.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {

  //get the admin details from database
  $adminEmail = getAdminDetails($_GET['id']) -> fetch();
  ?>

  <!-- html for editing an admin -->
  <!-- <main class="login"> -->

  <h2 class="addAdminText">Add Admin</h2>

  <form action="editAdmin.php?id=<?php echo $_GET['id'] ?>" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $adminEmail[0] ?>"><br>
    <input type="submit" name="submit" value="Edit Admin">
  </form>

  <!-- </main> -->

  <?php

  //check if the submit button is clicked
  if (isset($_POST['submit'])) {
    //get the email from the form
    $adminEmail = validateFields($_POST['email']);

    //check if the email field is empty
    if (empty($adminEmail)) {
      //if empty, display corresponding message
      echo "Insert Email";
    }
    //if the field is filled up correctly
    else {

      //check if the email is inserted correctly
      if(filter_var($adminEmail, FILTER_VALIDATE_EMAIL)){
        //if the admin is updated in database
        if(editAdmin($_GET['id'], $adminEmail)){
          //redirect back
          redirect('manageAdmins.php');
        }
        //if not updated, display corresponding message
        else {
          echo "Admin could not be updated";
        }
      }
      //if the email inserted is not in correct format, display message
      else {
        echo "Enter valid email";
      }
    }

  }

  ?>
  <?php
}
//if the user is not logged in
else {
  //redirect to login page
  redirect('../access/login.php');
}
//including footer for the page
include '../footer.php';
?>
