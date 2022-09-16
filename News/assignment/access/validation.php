<?php

function validateFields($fieldValue){
  $fieldValue = trim($fieldValue);
  $fieldValue = stripcslashes($fieldValue);
  $fieldValue = htmlspecialchars($fieldValue);
  return $fieldValue;
}

function redirect($destination){
  echo '<script>location.replace("'. $destination .'")</script>';
}

 ?>
