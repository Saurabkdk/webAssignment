<?php
//for the use of session
session_start();
?>

<!-- linking the css -->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
//include the required files for the
include '../access/validation.php';
include '../header.php';

//check if the admin is logged in
if (isset($_SESSION['adminLogin'])) {
  ?>

  <!-- html for admin list -->
  <div class="categoryList">
    <div class="categoryHead">
      <h1>Administrators</h1>
      <div>
        <a href="addAdmin.php"><button type="button">Add Admin</button></a>
      </div>
    </div>
    <ul>

      <?php
      //get all the admins from the database
      $adminList = getAdmins();

      //display data until the rows are fetched
      while ($admin = $adminList -> fetch()) {
        echo '<li><div class="categoryName">';
        echo '<div>'. $admin[1] .'</div>';
        echo '<div>';
        //display edit delete options for admin except for own
        if (!($admin[0] == $_SESSION['adminLogin'])) {
          echo '<a href="editAdmin.php?id='. $admin[0] .'"><p>Edit</p></a>';
          echo '<a href="manageAdmins.php?deleteId='. $admin[0] .'"><p>Delete</p></a>';
        }
        //if the account of the admin logged in, display my account
        else {
          echo '<a href="#"><p>My Account</p></a>';
        }
        echo '</div>';
        echo '</div></li>';
      }
      ?>

    </ul>
  </div>

  <?php

  //check if delete is clicked
  if (isset($_GET['deleteId'])) {
    //check if the admin is deleted
    if(deleteAdmin($_GET['deleteId'])){
      //redirect back
      redirect('manageAdmins.php');
    }
    //if the admin is not deleted, display message
    else {
      echo "Admin could not be deleted";
    }
  }
  ?>

  <?php
}
//if admin is not logged in
else {
  //redirect to login page
  redirect('../access/login.php');
}
//including footer for the page
include '../footer.php';
?>
