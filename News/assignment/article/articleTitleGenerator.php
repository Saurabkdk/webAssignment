<?php

/**
*
*/
//class to generate a view to display all the articles
class articleTitleGenerator
{
  //defining class attributes
  public $articleLink;
  public $articleId;
  public $articleTitle;
  public $articleDate;
  public $articleCategory;
  public $articleImage;

  //function to display a view to show the articles
  public function generateArticleTitle()
  {
    $articleFormat = '<div class="titleView">';
    $articleFormat = $articleFormat . '<div class = "text">';
    $articleFormat = $articleFormat . '<div class="title"><a class="articleLink" href = "'. $this->articleLink .'">';
    $articleFormat = $articleFormat . '<h2>'. $this->articleTitle .'</h2>';
    $articleFormat = $articleFormat . '</a></div>';
    $articleFormat = $articleFormat . '<div class = "dateCategory">';
    $articleFormat = $articleFormat . '<div class = "date">';
    $articleFormat = $articleFormat . '<h4>'. $this->articleDate .'</h4>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '<div class = "category">';
    $articleFormat = $articleFormat . '<h4>'. $this->articleCategory .'</h4>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '<div class = "editDelete">';
    $articleFormat = $articleFormat . '<p><a id="read" class="articleLink" href="'. $this->articleLink .'">Read complete article...</a></p>';

    //check if the admin is logged in
    if (isset($_SESSION['adminLogin'])) {

      $articleFormat = $articleFormat . '<div class = "edit">';
      $articleFormat = $articleFormat . '<p><a id="edit" href="editArticle.php?id='. $this->articleId .'">Edit</a></p>';
      $articleFormat = $articleFormat . '</div>';
      $articleFormat = $articleFormat . '<div class = "delete">';
      $articleFormat = $articleFormat . '<p><a id="delete" href="deleteArticle.php?id='. $this->articleId .'">Delete</a></p>';
      $articleFormat = $articleFormat . '</div>';

    }

    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '<div class = "image">';
    $articleFormat = $articleFormat . '<img src = "../public/images/articles/'. $this->articleImage .'" alt = "'. $this->articleImage .'" width = "500px" height = "310px">';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '</div>';

    //return the final view
    return $articleFormat;
  }
}


?>
