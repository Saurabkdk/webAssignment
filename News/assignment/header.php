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
				<?php
				if (isset($_SESSION['adminLogin'])) {
					echo '<li><a href="../article/adminArticles.php">Latest Articles</a></li>';
				}
				else {
					echo '<li><a href="../index.php">Latest Articles</a></li>';
				}
				 ?>
				<li><a href="#">Select Category</a>
					<ul>
						<li><a class="articleLink" href="#">Category 1</a></li>
						<li><a class="articleLink" href="#">Category 2</a></li>
						<li><a class="articleLink" href="#">Category 3</a></li>
					</ul>
				</li>
				<?php
				if(isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])){
					echo '<li><a class="articleLink" href="../access/logout.php">Logout</a></li>';
				}
				else {
					echo '<li><a class="articleLink" href="../access/login.php">Login</a></li>';
					echo '<li><a class="articleLink" href="../access/register.php">Register</a></li>';
				}
				 ?>
			</ul>
		</nav>
		<img src="../images/banners/randombanner.php" />
		<main class="container">
