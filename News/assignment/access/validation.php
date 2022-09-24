<?php
//function to validate the form fiels
function validateFields($fieldValue){
  //trim unnecessary spaces
  $fieldValue = trim($fieldValue);
  //strip any slashes inserted
  $fieldValue = stripcslashes($fieldValue);
  //handle the special characters
  $fieldValue = htmlspecialchars($fieldValue);
  return $fieldValue;
}

//fucntion to redirect to a page
function redirect($destination){
  //use of java script for redirection of pages                     //line of code 16 was researched from a website
  echo '<script>location.replace("'. $destination .'")</script>';   //https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
}

?>


<!-- code of line 16
Harvard Referencing
Stack Overflow. (n.d.). How to fix ‘Headers already sent’ error in PHP. [online] Available at: https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php [Accessed 23 Sep. 2022]. -->
