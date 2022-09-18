<?php

include 'dbConnection.php';
include '../access/validation.php';

$dbConnect = new ConnectionDb();
$dbConnection = $dbConnect -> dbConnection();

function loginAdmin($emailAdmin, $passwordAdmin){
  global $dbConnection;
  $loginCheck = $dbConnection -> prepare('SELECT email, password, admin_id FROM administrators WHERE email = :email');
  $loginCheckValue =[
    'email' => $emailAdmin
  ];
  $loginCheck -> execute($loginCheckValue);
  if ($getAdmin = $loginCheck -> fetch()) {
    if (password_verify($passwordAdmin, $getAdmin[1])) {
      return $getAdmin[2];
    }
    else {
      echo '<script>alert("Password did not match")</script>';
    }
  }
  return false;
}

function loginUser($emailUser, $passwordUser){
  global $dbConnection;
  $loginCheck = $dbConnection -> prepare('SELECT email, password, user_id FROM users WHERE email = :email');
  $loginCheckValue =[
    'email' => $emailUser
  ];
  $loginCheck -> execute($loginCheckValue);
  if ($getUser = $loginCheck -> fetch()) {
    if (password_verify($passwordUser, $getUser[1])) {
      return $getUser[2];
    }
    else {
      echo '<script>alert("Password did not match")</script>';
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

function editArticle($articleDetails){
  global $dbConnection;
  try {
    $editArticle = $dbConnection -> prepare('UPDATE article SET title = :title, content = :content, categoryId = :categoryId, image = :image WHERE article_id = :articleId');
    $editArticleValues = [
      'title' => $articleDetails[0],
      'content' => $articleDetails[1],
      'categoryId' => $articleDetails[2],
      'image' => $articleDetails[3],
      'articleId' => $articleDetails[4]
    ];
    if($editArticle -> execute($editArticleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function deleteArticle($articleId){
  global $dbConnection;
  try {
    $deleteArticle = $dbConnection -> prepare('DELETE FROM article WHERE article_id = :articleId');
    $deleteArticleValues = [
      'articleId' => $articleId
    ];
    if($deleteArticle -> execute($deleteArticleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function insertUser($userDetails){
  global $dbConnection;
  try {
    $insertUser = $dbConnection -> prepare('INSERT INTO users VALUES (null, :email, :password, :name)');
    $insertUserValues = [
      'email' => "$userDetails[0]",
      'password' => $userDetails[1],
      'name' => $userDetails[2]
    ];
    if($insertUser -> execute($insertUserValues)){
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function addComment($commentDetails){
  global $dbConnection;
  try {
    if (checkExists($commentDetails[1], $commentDetails[2])) {
      $addComment = $dbConnection -> prepare('UPDATE comment SET comment = :comment WHERE user_id = :userId AND article_id = :articleId');
      $addCommentValues = [
        'comment' => $commentDetails[0],
        'userId' => $commentDetails[1],
        'articleId' => $commentDetails[2]
      ];
      if ($addComment -> execute($addCommentValues)) {
        return true;
      }
    }
    else {
      $addComment = $dbConnection -> prepare('INSERT INTO comment VALUES (null, :comment, :userId, :articleId, :likePost)');
      $addCommentValues = [
        'comment' => $commentDetails[0],
        'userId' => $commentDetails[1],
        'articleId' => $commentDetails[2],
        'likePost' => 0
      ];
      if ($addComment -> execute($addCommentValues)) {
        return true;
      }
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function addLike($likeDetails){
  global $dbConnection;
  try {
    if (checkExists($likeDetails[1], $likeDetails[2])) {
      $addLike = $dbConnection -> prepare('UPDATE comment SET likePost = :likePost WHERE user_id = :userId AND article_id = :articleId');
      $addLikeValues = [
        'likePost' => $likeDetails[0],
        'userId' => $likeDetails[1],
        'articleId' => $likeDetails[2]
      ];
      if ($addLike -> execute($addLikeValues)) {
        return true;
      }
    }
    else {
      $addLike = $dbConnection -> prepare('INSERT INTO comment VALUES (null, null, :userId, :articleId, :likePost)');
      $addLikeValues = [
        'userId' => $likeDetails[1],
        'articleId' => $likeDetails[2],
        'likePost' => $likeDetails[0]
      ];
      if ($addLike -> execute($addLikeValues)) {
        return true;
      }
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function checkExists($userId, $articleId){
  global $dbConnection;
  try {
    $checkExists = $dbConnection -> prepare('SELECT comment_id FROM comment WHERE user_id = :userId AND article_id = :articleId');
    $checkExistsValue = [
      'userId' => $userId,
      'articleId' => $articleId
    ];
    $checkExists -> execute($checkExistsValue);
    $recordCount = 0;
    if ($record = $checkExists -> fetch()) {
      $recordCount = $record[0];
    }
    if ($recordCount > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

function getUserId($emailUser){
  global $dbConnection;
  try {
    $getUserId = $dbConnection -> prepare('SELECT user_id FROM users WHERE email = :emailUser');
    $getUserIdValue = [
      'emailUser' => $emailUser
    ];
    $getUserId -> execute($getUserIdValue);
    $userId = $getUserId -> fetch();
    return $userId[0];
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
    'adminPassword' => $password
  ];
  if ($adminInsert -> execute($adminInsertValues)) {
    return true;
  }
  return false;
}

?>
