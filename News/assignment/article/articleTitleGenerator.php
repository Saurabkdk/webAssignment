<?php

/**
 *
 */
class articleTitleGenerator
{
  public $articleId;
  public $articleTitle;
  public $articleDate;
  public $articleCategory;
  public $articleImage;

  public function generateArticleTitle()
  {
    $articleFormat = '<div class="titleView">';
    $articleFormat = $articleFormat . '<div class = "text">';
    $articleFormat = $articleFormat . '<div class="title"><a href = "article.php?id='. $this->articleId .'">';
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

    if (isset($_SESSION['adminLogin'])) {

    $articleFormat = $articleFormat . '<div class = "editDelete">';
    $articleFormat = $articleFormat . '<p><a id="read" href="article.php?id='. $this->articleId .'">Read complete article...</a></p>';
    $articleFormat = $articleFormat . '<div class = "edit">';
    $articleFormat = $articleFormat . '<p><a id="edit" href="editArticle.php?id='. $this->articleId .'">Edit</a></p>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '<div class = "delete">';
    $articleFormat = $articleFormat . '<p><a id="delete" href="deleteArticle.php?id='. $this->articleId .'">Delete</a></p>';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '</div>';

  }
  
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '<div class = "image">';
    $articleFormat = $articleFormat . '<img src = "../public/images/articles/'. $this->articleImage .'" alt = "Roger Federer" width = "500px" height = "300px">';
    $articleFormat = $articleFormat . '</div>';
    $articleFormat = $articleFormat . '</div>';

    return $articleFormat;
  }
}


 ?>
