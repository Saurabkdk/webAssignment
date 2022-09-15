<?php

function validateFields($fieldValue){
  $fieldValue = trim($fieldValue);
  $fieldValue = stripcslashes($fieldValue);
  $fieldValue = htmlspecialchars($fieldValue);
  return $fieldValue;
}

 ?>
