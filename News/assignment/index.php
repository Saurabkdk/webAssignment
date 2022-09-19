<?php
session_start();
?>

<?php
include './dbController/dbController.php';
include './article/articleTitleGenerator.php';
include './access/validation.php';
 ?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Latest Articles</a></li>
				<li><a href="#">Select Category</a>
          <ul>
						<?php
		        $getCategory = getCategory();
		        while($categoryList = $getCategory -> fetch()){
		          echo '<li><a class="articleLink" href="./article/categoryArticles.php?id='. $categoryList[1] .'">'. $categoryList[0] .'</a></li>';
		        }
		        ?>
					</ul>
				</li>
				<?php
				if(isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])){
					echo '<li><a class="articleLink" href="./access/logout.php">Logout</a></li>';
				}
				else {
					echo '<li><a class="articleLink" href="./access/login.php">Login</a></li>';
				}
				 ?>
			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />
		<main class="container">
			<!-- Delete the <nav> element if the sidebar is not required -->
			<!-- <nav>
				<ul>
					<li><a href="#">Sidebar</a></li>
					<li><a href="#">This can</a></li>
					<li><a href="#">Be removed</a></li>
					<li><a href="#">When not needed</a></li>
				</ul>
			</nav>

			<article>
				<h2>A Page Heading</h2>
				<p>Text goes in paragraphs</p>

				<ul>
					<li>This is a list</li>
					<li>With multiple</li>
					<li>List items</li>
				</ul>


				<form>
					<p>Forms are styled like so:</p>

					<label>Field 1</label> <input type="text" />
					<label>Field 2</label> <input type="text" />
					<label>Textarea</label> <textarea></textarea>

					<input type="submit" name="submit" value="Submit" />
				</form>
			</article> -->
			<div class="articles">
		  <h1>Articles</h1>
		  <?php if (isset($_SESSION['adminLogin'])): ?>
		    <div class="optionButton">
		    <a href="addArticle.php"><button type="button">Add Article</button></a>
		    <a href="../category/adminCategories.php"><button type="button">View Categories</button></a>
		    </div>
		  <?php endif; ?>
		  </div>

		 <?php
		 $getAdminArticles = getAdminArticles();


		 while ($adminArticles = $getAdminArticles -> fetch()) {
		   $articleTitle = new articleTitleGenerator();

			 $articleTitle -> articleLink = "./article/article.php?id=".$adminArticles[0];
		   $articleTitle -> articleId = $adminArticles[0];
		   $articleTitle -> articleTitle = $adminArticles[1];
		   $articleTitle -> articleDate = $adminArticles[2];
		   $articleTitle -> articleCategory = getCategoryName($adminArticles[3]);
		   if (strlen($adminArticles[4]) > 0) {
		     $articleTitle -> articleImage = $adminArticles[4];
		   }
		   else {
		     $articleTitle -> articleImage = 'news.jpg';
		   }
		   echo $articleTitle -> generateArticleTitle();
		 }


		  ?>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
