<?php

//including the required database connection file
include 'dbConnection.php';

//creating an object of the class in dbConnection.php
$dbConnect = new ConnectionDb();
//get the connection in a variable for convenience
$dbConnection = $dbConnect -> dbConnection();

//function to check login for admin
function loginAdmin($emailAdmin, $passwordAdmin){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $loginCheck = $dbConnection -> prepare('SELECT email, password, admin_id FROM administrators WHERE email = :email');
    //value required in the query
    $loginCheckValue =[
      'email' => $emailAdmin
    ];
    //execution of the query
    $loginCheck -> execute($loginCheckValue);
    //fetch the data from the database table
    if ($getAdmin = $loginCheck -> fetch()) {
      //verify password
      if (password_verify($passwordAdmin, $getAdmin[1])) {
        return $getAdmin[2];
      }
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to check login for user
function loginUser($emailUser, $passwordUser){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $loginCheck = $dbConnection -> prepare('SELECT email, password, user_id FROM users WHERE email = :email');
    //value required in the query
    $loginCheckValue =[
      'email' => $emailUser
    ];
    //execution of the query
    $loginCheck -> execute($loginCheckValue);
    //fetch the data from the database table
    if ($getUser = $loginCheck -> fetch()) {
      //verify password
      if (password_verify($passwordUser, $getUser[1])) {
        return $getUser[2];
      }
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to get all the categories
function getCategory(){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getCategory = $dbConnection -> prepare('SELECT name, category_id FROM category');
    //execution of the query
    $getCategory -> execute();
    return $getCategory;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to id of a particular category
function getCategoryId($category){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getCategoryId = $dbConnection -> prepare('SELECT category_id FROM category WHERE name = :name');
    //value required in the query
    $categoryName = [
      'name' => $category
    ];
    //execution of the query
    $getCategoryId -> execute($categoryName);
    //fetch the data from the database table
    $categoryId = $getCategoryId -> fetch();
    return $categoryId[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get name of a particular category
function getCategoryName($categoryId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getCategoryName = $dbConnection -> prepare('SELECT name FROM category WHERE category_id = :id');
    //value required in the query
    $articleCategoryId = [
      'id' => $categoryId
    ];
    //execution of the query
    $getCategoryName -> execute($articleCategoryId);
    //fetch the data from the database table
    $categoryName = $getCategoryName -> fetch();
    return $categoryName[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get all the articles
function getAdminArticles(){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getAdminArticles = $dbConnection -> prepare('SELECT article_id, title, publishDate, categoryId, image FROM article ORDER BY article_id DESC');
    //execution of the query
    $getAdminArticles -> execute();
    return $getAdminArticles;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to add an article
function addArticle($articleDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $addArticle = $dbConnection -> prepare('INSERT INTO article VALUES (null, :articleTitle, :articleContent, :articleCategory, :articlePublishDate, :imageName)');
    //value required in the query
    $articleValues = [
      'articleTitle' => $articleDetails[0],
      'articleContent' => $articleDetails[1],
      'articleCategory' => getCategoryId($articleDetails[2]),
      'articlePublishDate' => $articleDetails[3],
      'imageName' => $articleDetails[4]
    ];
    //execution of the query
    if($addArticle -> execute($articleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to add a new category
function addCategory($newCategory){
  //getting the database connection
  global $dbConnection;

  try {
    $getCategory = getCategory();
    while ($category = $getCategory -> fetch()) {
      if ($category[0] == strtoupper($newCategory)) {
        echo "A category of such name already exists";
        echo "<br>";
        return false;
      }
    }
    //preparing the query to be executed
    $addCategory = $dbConnection -> prepare('INSERT INTO category VALUES (null, :categoryName)');
    //value required in the query
    $categoryValues = [
      'categoryName' => $newCategory
    ];
    //execution of the query
    if ($addCategory -> execute($categoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to edit a category
function editCategory($categoryDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $editCategory = $dbConnection -> prepare('UPDATE category SET name = :categoryName WHERE category_id = :categoryId');
    //value required in the query
    $editCategoryValues = [
      'categoryName' => $categoryDetails[0],
      'categoryId' => $categoryDetails[1]
    ];
    //execution of the query
    if ($editCategory -> execute($editCategoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to delete all articles of specific category
function deleteCategoryArticle($categoryId){
  //getting the database connection
  global $dbConnection;

  try {
    $getArticleId = getCategoryArticle($categoryId);
    while ($articleId = $getArticleId -> fetch()) {
      deleteCommentArticle($articleId[0]);
    }
    //preparing the query to be executed
    $deleteCategoryArticle = $dbConnection -> prepare('DELETE FROM article WHERE categoryId = :category_id');
    //value required in the query
    $deleteCategoryArticleValues = [
      'category_id' => $categoryId
    ];
    //execution of the query
    $deleteCategoryArticle -> execute($deleteCategoryArticleValues);
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to delete a category
function deleteCategory($categoryId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $deleteCategory = $dbConnection -> prepare('DELETE FROM category WHERE category_id = :category_id');
    //delete all articles related to the category
    deleteCategoryArticle($categoryId);
    //value required in the query
    $deleteCategoryValues = [
      'category_id' => $categoryId
    ];
    //execution of the query
    if ($deleteCategory -> execute($deleteCategoryValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to get one particular article
function getOneArticle($articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getOneArticle = $dbConnection -> prepare('SELECT title, publishDate, categoryId, content, image FROM article WHERE article_id = :id');
    //value required in the query
    $getOneArticleValue = [
      'id' => $articleId
    ];
    //execution of the query
    $getOneArticle -> execute($getOneArticleValue);
    return $getOneArticle;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to edit an article
function editArticle($articleDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $editArticle = $dbConnection -> prepare('UPDATE article SET title = :title, content = :content, categoryId = :categoryId, image = :image WHERE article_id = :articleId');
    //value required in the query
    $editArticleValues = [
      'title' => $articleDetails[0],
      'content' => $articleDetails[1],
      'categoryId' => $articleDetails[2],
      'image' => $articleDetails[3],
      'articleId' => $articleDetails[4]
    ];
    //execution of the query
    if($editArticle -> execute($editArticleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to to delete an article
function deleteArticle($articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $deleteArticle = $dbConnection -> prepare('DELETE FROM article WHERE article_id = :articleId');
    //value required in the query
    $deleteArticleValues = [
      'articleId' => $articleId
    ];
    //deleting the comments in the article
    deleteCommentArticle($articleId);
    //execution of the query
    if($deleteArticle -> execute($deleteArticleValues)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to insert a user
function insertUser($userDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $insertUser = $dbConnection -> prepare('INSERT INTO users VALUES (null, :email, :password, :name)');
    //value required in the query
    $insertUserValues = [
      'email' => "$userDetails[0]",
      'password' => $userDetails[1],
      'name' => $userDetails[2]
    ];
    //execution of the query
    if($insertUser -> execute($insertUserValues)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to add a comment
function addComment($commentDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //check if the data is there
    if (checkExists($commentDetails[1], $commentDetails[2])) {
      //preparing the query to be executed
      $addComment = $dbConnection -> prepare('UPDATE comment SET comment = :comment, comment_date = :commentDate WHERE user_id = :userId AND article_id = :articleId');
      //value required in the query
      $addCommentValues = [
        'comment' => $commentDetails[0],
        'userId' => $commentDetails[1],
        'articleId' => $commentDetails[2],
        'commentDate' => $commentDetails[3],
      ];
      //execution of the query
      if ($addComment -> execute($addCommentValues)) {
        return true;
      }
    }
    else {
      //preparing the query to be executed
      $addComment = $dbConnection -> prepare('INSERT INTO comment VALUES (null, :comment, :userId, :articleId, :likePost, null, :commentDate)');
      //value required in the query
      $addCommentValues = [
        'comment' => $commentDetails[0],
        'userId' => $commentDetails[1],
        'articleId' => $commentDetails[2],
        'likePost' => 0,
        'commentDate' => $commentDetails[3]
      ];
      //execution of the query
      if ($addComment -> execute($addCommentValues)) {
        return true;
      }
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to like and unlike the post
function addLike($likeDetails){
  //getting the database connection
  global $dbConnection;

  try {
    //check if the data is there
    if (checkExists($likeDetails[1], $likeDetails[2])) {
      //preparing the query to be executed
      $addLike = $dbConnection -> prepare('UPDATE comment SET likePost = :likePost WHERE user_id = :userId AND article_id = :articleId');
      //value required in the query
      $addLikeValues = [
        'likePost' => $likeDetails[0],
        'userId' => $likeDetails[1],
        'articleId' => $likeDetails[2]
      ];
      //execution of the query
      if ($addLike -> execute($addLikeValues)) {
        return true;
      }
    }
    else {
      //preparing the query to be executed
      $addLike = $dbConnection -> prepare('INSERT INTO comment VALUES (null, null, :userId, :articleId, :likePost, null, null)');
      //value required in the query
      $addLikeValues = [
        'userId' => $likeDetails[1],
        'articleId' => $likeDetails[2],
        'likePost' => $likeDetails[0],
      ];
      //execution of the query
      if ($addLike -> execute($addLikeValues)) {
        return true;
      }
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

function addCommentAdmin($commentDetailsAdmin){
  global $dbConnection;
  try {
    $addCommentAdmin = $dbConnection -> prepare('INSERT INTO comment VALUES (null, :commentContent, null, :articleId, :likePost, :adminId, :commentDate)');
    $addCommentAdminValues = [
      'commentContent' => $commentDetailsAdmin[0],
      'articleId' => $commentDetailsAdmin[1],
      'likePost' => 0,
      'adminId' => $commentDetailsAdmin[2],
      'commentDate' => $commentDetailsAdmin[3]
    ];
    if ($addCommentAdmin -> execute($addCommentAdminValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    echo $exception -> getMessage();
  }
  return false;
}

//function to check if an article exists
function checkExists($userId, $articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $checkExists = $dbConnection -> prepare('SELECT comment_id FROM comment WHERE user_id = :userId AND article_id = :articleId');
    //value required in the query
    $checkExistsValue = [
      'userId' => $userId,
      'articleId' => $articleId
    ];
    //execution of the query
    $checkExists -> execute($checkExistsValue);
    $recordCount = 0;
    //fetch the data from the database table
    if ($record = $checkExists -> fetch()) {
      $recordCount = $record[0];
    }
    if ($recordCount > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    ///display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to get id of a particular user
function getUserId($emailUser){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getUserId = $dbConnection -> prepare('SELECT user_id FROM users WHERE email = :emailUser');
    //value required in the query
    $getUserIdValue = [
      'emailUser' => $emailUser
    ];
    //execution of the query
    $getUserId -> execute($getUserIdValue);
    //fetch the data from the database table
    $userId = $getUserId -> fetch();
    return $userId[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if a email already exists
function checkUserEmail($emailUser){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getUserId = $dbConnection -> prepare('SELECT user_id FROM users WHERE email = :emailUser');
    //value required in the query
    $getUserIdValue = [
      'emailUser' => $emailUser
    ];
    //execution of the query
    $getUserId -> execute($getUserIdValue);
    //fetch the data from the database table
    if ($getUserId -> rowCount() > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if users exist
function checkUsersExist(){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $checkUsersExists = $dbConnection -> prepare('SELECT user_id FROM users');
    //execution of the query
    $checkUsersExists -> execute();
    if ($checkUsersExists -> rowCount() > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if admins exist
function checkAdminsExist(){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $checkAdminsExist = $dbConnection -> prepare('SELECT admin_id FROM administrators');
    //execution of the query
    $checkAdminsExist -> execute();
    if ($checkAdminsExist -> rowCount() > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to get all the comments of an article
function getComments($articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getComments = $dbConnection -> prepare('SELECT comment_id, comment, user_id, admin_id, comment_date FROM comment WHERE article_id = :articleId');
    //value required in the query
    $getCommentsValue = [
      'articleId' => $articleId
    ];
    //execution of the query
    $getComments -> execute($getCommentsValue);
    return $getComments;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get name of a particular user
function getUserName($userId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getUserName = $dbConnection -> prepare('SELECT name FROM users WHERE user_id = :userId');
    //value required in the query
    $getUserNameValue = [
      'userId' => $userId
    ];
    //execution of the query
    $getUserName -> execute($getUserNameValue);
    //fetch the data from the database table
    $getUser = $getUserName -> fetch();
    return $getUser[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if a post is liked
function checkLike($userId, $articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //get the comment id
    if ($commentId = checkExists($userId, $articleId)) {
      //preparing the query to be executed
      $checkLike = $dbConnection -> prepare('SELECT likePost FROM comment WHERE article_id = :articleId AND user_id = :userId');
      //value required in the query
      $checkLikeValue = [
        'articleId' => $articleId,
        'userId' => $userId
      ];
      //execution of the query
      $checkLike -> execute($checkLikeValue);
      //fetch the data from the database table
      if ($likeValue = $checkLike -> fetch()) {
        if ($likeValue[0] == 1) {
          return true;
        }
      }
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to count the number of likes in a post
function countLike($articleId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $countLike = $dbConnection -> prepare('SELECT COUNT(comment_id) FROM comment WHERE article_id = :articleId AND likePost = :likePost');
    //value required in the query
    $countLikeValues = [
      'articleId' => $articleId,
      'likePost' => 1
    ];
    //execution of the query
    $countLike -> execute($countLikeValues);
    //fetch the data from the database table
    $likeCount = $countLike -> fetch();
    return $likeCount[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get articles of a particular category
function getCategoryArticle($categoryId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getCategoryArticle = $dbConnection -> prepare('SELECT article_id, title, publishDate, image FROM article WHERE categoryId = :categoryId');
    //value required in the query
    $getCategoryArticleValue = [
      "categoryId" => $categoryId
    ];
    //execution of the query
    $getCategoryArticle -> execute($getCategoryArticleValue);
    return $getCategoryArticle;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get all the comments of a particular user
function getUserComments($userId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getUserComments = $dbConnection -> prepare('SELECT comment, article_id FROM comment WHERE user_id = :userId');
    //value required in the query
    $getUserCommentsValue = [
      'userId' => $userId
    ];
    //execution of the query
    $getUserComments -> execute($getUserCommentsValue);
    return $getUserComments;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to insert an admin
function insertAdmin($email, $password)
{
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $adminInsert = $dbConnection -> prepare('INSERT INTO administrators VALUES (null, :adminEmail, :adminPassword)');
    //value required in the query
    $adminInsertValues = [
      'adminEmail' => $email,
      'adminPassword' => $password
    ];
    //execution of the query
    if ($adminInsert -> execute($adminInsertValues)) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to get all the admins
function getAdmins(){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getAdmin = $dbConnection -> prepare('SELECT admin_id, email FROM administrators');
    //execution of the query
    $getAdmin -> execute();
    return $getAdmin;
  } catch (\Exception $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to get details of a particular admin
function getAdminDetails($adminId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $getAdminDetails = $dbConnection -> prepare('SELECT email FROM administrators WHERE admin_id =:adminId');
    //value required in the query
    $getAdminDetailsValue = [
      'adminId' => $adminId
    ];
    //execution of the query
    $getAdminDetails -> execute($getAdminDetailsValue);
    return $getAdminDetails;
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if an admin exists
function checkAdminExist($email){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $checkAdminExist = $dbConnection -> prepare('SELECT admin_id FROM administrators WHERE email = :email');
    //value required in the query
    $checkAdminExistValue = [
      'email' => $email
    ];
    //execution of the query
    $checkAdminExist -> execute($checkAdminExistValue);
    if ($checkAdminExist -> rowCount() > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to edit an admin
function editAdmin($adminId, $adminEmail){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $editAdmin = $dbConnection -> prepare('UPDATE administrators SET email = :adminEmail WHERE admin_id = :adminId');
    //value required in the query
    $editAdminValue = [
      'adminEmail' => $adminEmail,
      'adminId' => $adminId
    ];
    //execution of the query
    if($editAdmin -> execute($editAdminValue)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

//function to delete an admin
function deleteAdmin($adminId){
  //getting the database connection
  global $dbConnection;

  try {
    //preparing the query to be executed
    $deleteAdministrator = $dbConnection -> prepare('DELETE FROM administrators WHERE admin_id = :adminId');
    //value required in the query
    $deleteAdministratorValue = [
      'adminId' => $adminId
    ];
    //delete the comments of the admin
    deleteCommentAdmin($adminId);
    //execution of the query
    if($deleteAdministrator -> execute($deleteAdministratorValue)){
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

function deleteCommentAdmin($adminId){
  //getting the database connection
  global $dbConnection;
  try {
    //preparing the query to be executed
    $deleteCommentAdmin = $dbConnection ->prepare('DELETE FROM comment WHERE admin_id = :adminId');
    //value required in the query
    $deleteCommentAdminValue = [
      'adminId' => $adminId
    ];
    //execution of the query
    $deleteCommentAdmin -> execute($deleteCommentAdminValue);
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
}

function deleteCommentArticle($articleId){
  //getting the database connection
  global $dbConnection;
  try {
    //preparing the query to be executed
    $deleteCommentArticle = $dbConnection ->prepare('DELETE FROM comment WHERE article_id = :articleId');
    //value required in the query
    $deleteCommentArticleValue = [
      'articleId' => $articleId
    ];
    //execution of the query
    $deleteCommentArticle -> execute($deleteCommentArticleValue);
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
}

function getAdminId($adminEmail){
  //preparing the query to be executed
  global $dbConnection;
  try {
    //preparing the query to be executed
    $getAdminId = $dbConnection -> prepare('SELECT admin_id FROM administrators WHERE email = :adminEmail');
    //value required in the query
    $getAdminIdValue = [
      'adminEmail' => $adminEmail
    ];
    //execution of the query
    $getAdminId -> execute($getAdminIdValue);
    //fetch the data from the database table
    $adminId = $getAdminId -> fetch();
    return $adminId[0];
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  //ending the PDO connection
  $dbConnection = null;
}

//function to check if admin email already exists
function checkAdminEmail($adminEmail){
  //preparing the query to be executed
  global $dbConnection;
  try {
    //preparing the query to be executed
    $getAdminId = $dbConnection -> prepare('SELECT admin_id FROM administrators WHERE email = :adminEmail');
    //value required in the query
    $getAdminIdValue = [
      'adminEmail' => $adminEmail
    ];
    //execution of the query
    $getAdminId -> execute($getAdminIdValue);
    //fetch the data from the database table
    if ($getAdminId -> rowCount() > 0) {
      return true;
    }
  } catch (PDOException $exception) {
    //display the exception message
    echo $exception -> getMessage();
  }
  return false;
  //ending the PDO connection
  $dbConnection = null;
}

?>
