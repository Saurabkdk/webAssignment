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
  try {
  $getCategory = $dbConnection -> prepare('SELECT name FROM category');
    $getCategory -> execute();
    return $getCategory;
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
}

function getCategoryId($category){
  global $dbConnection;
  try {
    $getCategoryId = $dbConnection -> prepare('SELECT category_id FROM category WHERE name = :name');
    $categoryName = [
      'name' => $category
    ];
    $getCategoryId -> execute($categoryName);
    $getId = $getCategoryId -> fetch();
    return $categoryId = $getId[0];
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }

}

function addArticle($articleDetails){
  global $dbConnection;
  try {
    $addArticle = $dbConnection -> prepare('INSERT INTO article VALUES (null, :articleTitle, :articleContent, :articleCategory, :articlePublishDate, :imageName)');
    $articleValues = [
      'articleTitle' => $articleDetails[0],
      'articleContent' => $articleDetails[1],
      'articleCategory' => getCategoryId($articleDetails[2]),
      'articlePublishDate' => $articleDetails[3],
      'imageName' => $articleDetails[4]
    ];
    if($addArticle -> execute($articleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function insertAdmin($email, $password)
{
  global $dbConnection;
  $adminInsert = $dbConnection -> prepare('INSERT INTO administrators VALUES (null, :adminEmail, :adminPassword)');
  $adminInsertValues = [
    'adminEmail' => $email,
    'adminPassword' => password_hash($password, PASSWORD_DEFAULT)
  ];
  if ($adminInsert -> execute($adminInsertValues)) {
    return true;
  }
  return false;
}

?>
