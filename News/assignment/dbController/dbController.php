<?php


include 'dbConnection.php';
$dbConnect = new ConnectionDb();
$dbConnection = $dbConnect -> dbConnection();

function loginAdmin($emailAdmin, $passwordAdmin){
  global $dbConnection;
  $loginCheck = $dbConnection -> prepare('SELECT email, password FROM administrators WHERE email = :email');
  $loginCheckValue =[
    'email' => $emailAdmin
  ];
  $loginCheck -> execute($loginCheckValue);
  if ($getAdmin = $loginCheck -> fetch()) {
    if (password_verify($passwordAdmin, $getAdmin[1])) {
      return true;
    }
    else {
      echo '<script>alert("Password did not match")</script>';
    }
  } else {
    echo '<script>alert("Admin doesn\'t exist")</script>';
  }
}

function getCategory(){
  global $dbConnection;
  $getCategory = $dbConnection -> prepare('SELECT name FROM category');
  try {
    $getCategory -> execute();
    return $getCategory;
  } catch (\Exception $e) {
    $e -> getMessage();
  }

}

function insertAdmin($email, $password)
{
  global $dbConnection;
  $adminInsert = $dbConnection -> prepare('INSERT INTO administrators VALUES (null, :email, :password)');
  $adminInsertValues = [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
  ];
  if ($adminInsert -> execute($adminInsertValues)) {
    return true;
  }
  return false;
}

?>
