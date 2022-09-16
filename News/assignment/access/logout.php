<?php
session_start();

include 'validation.php';

if (isset($_SESSION['adminLogin'])) {
  unset($_SESSION['adminLogin']);
  redirect('login.php');
}
else if (isset($_SESSION['userLogin'])) {
  unset($_SESSION['userLogin']);
  redirect('login.php');
}
else {
  redirect('login.php');
}
 ?>
