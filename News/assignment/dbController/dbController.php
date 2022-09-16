<?php

include 'dbConnection.php';
include '../access/validation.php';

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
      redirect("Password did not match");
    }
  }
  return false;
}

function getCategory(){
  global $dbConnection;
  try {
  $getCategory = $dbConnection -> prepare('SELECT name, category_id FROM category');
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
    $categoryId = $getCategoryId -> fetch();
    return $categoryId[0];
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
}

function getCategoryName($categoryId){
  global $dbConnection;
  try {
    $getCategoryName = $dbConnection -> prepare('SELECT name FROM category WHERE category_id = :id');
    $articleCategoryId = [
      'id' => $categoryId
    ];
    $getCategoryName -> execute($articleCategoryId);
    $categoryName = $getCategoryName -> fetch();
    return $categoryName[0];
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
}

function getAdminArticles(){
  global $dbConnection;
  try {
    $getAdminArticles = $dbConnection -> prepare('SELECT article_id, title, publishDate, categoryId, image FROM article ORDER BY article_id DESC');
    $getAdminArticles -> execute();
    return $getAdminArticles;
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

function addCategory($newCategory){
  global $dbConnection;
  try {
    $addCategory = $dbConnection -> prepare('INSERT INTO category VALUES (null, :categoryName)');
    $categoryValues = [
      'categoryName' => $newCategory
    ];
    if ($addCategory -> execute($categoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function editCategory($categoryDetails){
  global $dbConnection;
  try {
    $editCategory = $dbConnection -> prepare('UPDATE category SET name = :categoryName WHERE category_id = :categoryId');
    $editCategoryValues = [
      'categoryName' => $categoryDetails[0],
      'categoryId' => $categoryDetails[1]
    ];
    if ($editCategory -> execute($editCategoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function deleteCategory($categoryId){
  global $dbConnection;
  try {
    $deleteCategory = $dbConnection -> prepare('DELETE FROM category WHERE category_id = :category_id');
    $deleteCategoryValues = [
      'category_id' => $categoryId
    ];
    if ($deleteCategory -> execute($deleteCategoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
return false;
}

function getOneArticle($articleId){
  global $dbConnection;
  try {
    $getOneArticle = $dbConnection -> prepare('SELECT title, publishDate, categoryId, content, image FROM article WHERE article_id = :id');
    $getOneArticleValue = [
      'id' => $articleId
    ];
    $getOneArticle -> execute($getOneArticleValue);
    return $getOneArticle;
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
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
