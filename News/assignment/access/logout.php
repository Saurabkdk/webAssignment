<?php
//for use of session
session_start();

//including required files
include 'validation.php';

//if the session variable of admin is set, unset to logout
if (isset($_SESSION['adminLogin'])) {
  unset($_SESSION['adminLogin']);
  //redirect back to login
  redirect('login.php');
}

//if the session variable of user is set, unset to logout
else if (isset($_SESSION['userLogin'])) {
  unset($_SESSION['userLogin']);
  //redirect back to login
  redirect('login.php');
}

//if no session variable, redirect again to login
else {
  redirect('login.php');
}
?>
