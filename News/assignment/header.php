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
			//if admin is logged in, redirect to adminArticles
			if (isset($_SESSION['adminLogin'])) {
				echo '<li><a href="../article/adminArticles.php">Latest Articles</a></li>';
			}
			//if not admin, redirect to index
			else {
				echo '<li><a href="../index.php">Latest Articles</a></li>';
			}
			?>
			<li><a href="#">Select Category</a>
				<ul>
					<?php
					//including file for the database function
					include '../dbController/dbController.php';

					//get all the categories from the database
					$getCategory = getCategory();

					//displaying all the categories
					while($categoryList = $getCategory -> fetch()){
						echo '<li><a class="articleLink" href="../article/categoryArticles.php?id='. $categoryList[1] .'">'. $categoryList[0] .'</a></li>';
					}
					?>
				</ul>
			</li>
			<?php
			//check if admin is logged in
			if (isset($_SESSION['adminLogin'])) {
				//display manage admins option in nav bar
				echo '<li><a href="../admin/manageAdmins.php">Manage Admins</a></li>';
			}
			//if either of admin or user logged in, option to logout
			if(isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])){
				echo '<li><a href="../access/logout.php">Logout</a></li>';
			}
			//if no one is logged in, options to login and register
			else {
				echo '<li><a href="../access/login.php">Login</a></li>';
				echo '<li><a href="../access/register.php">Register</a></li>';
			}
			?>
		</ul>
	</nav>
	<img src="../images/banners/randombanner.php" />
	<main>
