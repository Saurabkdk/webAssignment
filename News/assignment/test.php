<!-- <link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php
// include 'header.php';
 ?>

<div class="articleView">
  <div class="articleTitle">
    <h1>Prince William and Prince Harry to stand vigil at Queen's coffin on Saturday<h1>
  </div>
  <div class="articleDateCategory">
    <div class="articleDate">
<em>12 Jun 2025</em>
    </div>
    <div class="articleCategory">
<p>Entertainment</p>
    </div>
    </div>
    <div class="articleImage">
<img src="./public/images/articles/rogerfederer.jpg" alt="" width="50%" height="400px">
    </div>
    <div class="articleContent">
      <p>
      London (CNN)The late Queen Elizabeth II's eight grandchildren will stand vigil beside her coffin in Westminster Hall on Saturday evening, a royal source told CNN.

      Prince William, the Prince of Wales, will stand at the head of the coffin, and Prince Harry, the Duke of Sussex, will stand at its foot for the 15-minute vigil, according to the source. At the King's request, both will be in uniform.

      The Queen's other grandchildren will be wearing morning coats and dark formal dress with decorations, the royal source said.
The source added that the Prince of Wales will be flanked by Zara Tindall and Peter Philips, who are the children of Princess Anne. The Duke of Sussex will be flanked by Princesses Beatrice and Eugenie, the daughters of Prince Andrew, alongside Prince Edward's children, Lady Louise Windsor and Viscount Severn.
The grandchildren, at the King's invitation, are very eager to pay their respects -- just as their parents are doing the previous evening, the source told CNN.
</p>
    </div>
    <div class="articleEditDelete">
<p><a href="#">Edit</a></p>
<p><a href="#">Delete</a></p>
    </div>

    <div class="likeComment">

      <div class="addComment">
        <form class="" action="index.html" method="post">
          <textarea name="commentText" rows="8" cols="100" required></textarea>
          <input style="margin : 1% 0; width: 100px;" type="submit" name="submit" value="Comment">
        </form>
      </div>
      <div class="like">
        <p>Like</p>
      </div>

    </div>

    <h3 style="padding:1% 0 0 2%;">Comments</h3>

    <div class="userComments">
      <p>User</p>
      <p class="comment">User Comment</p>
    </div>

</div>

 <?php //include 'footer.php' ?> -->

 <?php
 session_start();
 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<link rel="stylesheet" href="styles.css"/>
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
 						<li><a class="articleLink" href="#">Category 1</a></li>
 						<li><a class="articleLink" href="#">Category 2</a></li>
 						<li><a class="articleLink" href="#">Category 3</a></li>
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
 		<main>
 			<!-- Delete the <nav> element if the sidebar is not required -->
 			<nav>
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
 			</article>
 		</main>

 		<footer>
 			&copy; Northampton News 2017
 		</footer>

 	</body>
 </html>
