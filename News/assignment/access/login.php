<?php
//for use of session
session_start();
?>

<!--linking the css-->
<link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>"/>

<?php

//including the files required in this file
include '../header.php';
include 'validation.php';

//if the admin is already logged in redirect accordingly
if (isset($_SESSION['adminLogin'])) {
	redirect('../article/adminArticles.php');
}

//if the user is already logged in redirect accordingly
elseif (isset($_SESSION['userLogin'])) {
	redirect('../index.php');
}

//if no one is logged in already show login page
else {

	?>
	<!-- html for login -->
	<!-- <main class="login"> -->

	<h2 class="loginText">Login</h2>

	<form class="" action="login.php" method="post">

		<label for="email">Email</label>
		<input type="email" name="email" value="<?php if (isset($_POST['email'])) {
			echo $_POST['email'];
		} ?>" required><br>

		<label for="password">Password</label>
		<input type="password" name="password" required><br>

		<input type="submit" name="submit" value="Login">
	</form>
	<!-- </main> -->

	<?php

	//if the submit button is clicked perform following actions
	if (isset($_POST['submit'])) {

		//get values from the form and validate
		$emailLogin = validateFields($_POST['email']);
		$passwordLogin = $_POST['password'];

		//check if the email field is empty
		if (empty($emailLogin)) {
			echo "Insert email";
		}

		//check if the password field is empty
		elseif (empty($passwordLogin)) {
			echo "Insert password";
		}

		//if all the fields are filled up perform following actions
		else {

			//check if user is to logged in
			if(loginUser($emailLogin, $passwordLogin)){
				//if user is logged in, set a respective session variable
				$_SESSION['userLogin'] = getUserId($emailLogin);
				//redirect to another page
				redirect("../index.php");
			}

			//check if admin is to be logged in
			elseif (loginAdmin($emailLogin, $passwordLogin)) {
				//if admin is logged in, set a respective session variable
				$_SESSION['adminLogin'] = getAdminId($emailLogin);
				//redirect to another page
				redirect("../article/adminArticles.php");
			}

			else {
				echo '<script>alert("Email or password did not match")</script>';
			}

		}

	}

	?>
	<?php
}
//including footer for the page
include '../footer.php';
?>
