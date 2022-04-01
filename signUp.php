<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/signUpStyle.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/my-colors.css">
	<link rel="stylesheet" href="css/footer.css">
</head>

<body>
	<!-- Header -->
	<header>
		<nav class="navbar navbar-lightgrey bg-lightgrey">
			<div class="container">
				<div class="col-1">
					<a class="navbar-brand" href="#">
						<img src="media/mini-logo.png" alt="" width="" height="75" class="d-inline-block align-text-top">
					</a>
				</div>
				<div class="col-10 align-middle">
					<h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
				</div>
			</div>
		</nav>
	</header>
	<div class="wrapper">
		<div class="form">
			<div class="title">
				Sign Up
			</div>
			<?php
			if (isset($_SESSION['error'])) {
				echo '<div class="errors"><p>' . $_SESSION['error'] . '</p></div>';
				unset($_SESSION['error']);
			}
			?>
			<form method="post" action="signUp_process.php" onsubmit="validation(event);">
				<div class="input_wrap">
					<label for="input_text">User ID</label>
					<div class="input_field">
						<input type="text" placeholder="Only Numbers" class="input" id="input_text" name="emp_number" pattern="\d{1,10}" maxlength="10">
					</div>
				</div>
				<!---------------------------------------------------------->
				<div class="input_wrap">
					<label for="input_text2">First Name</label>
					<div class="input_field">
						<input type="text" placeholder="Only letters" class="input" id="input_text2" name="first_name" pattern="[a-zA-Z]+" maxlength="10">
					</div>
				</div>
				<!---------------------------------------------------------->
				<div class="input_wrap">
					<label for="input_text3">Last Name</label>
					<div class="input_field">
						<input type="text" placeholder="Only letters" class="input" id="input_text3" name="last_name" pattern="[a-zA-Z]+" maxlength="10">
					</div>
				</div>
				<!---------------------------------------------------------->
				<div class="input_wrap">
					<label for="input_text4">Job Title</label>
					<div class="input_field">
						<input type="text" placeholder="Only letters" class="input" id="input_text4" name="job_title" pattern="[a-zA-Z]+" maxlength="15">
					</div>
				</div>
				<!---------------------------------------------------------->
				<div class="input_wrap">
					<label for="input_password">Password</label>
					<div class="input_field">
						<input type="password" placeholder="letters or numbers or both" class="input" id="input_password" name="password">
					</div>
				</div>
				<!---------------------------------------------------------->
				<p><em>Note: All feilds must have (at least) 2 digits</em></p>
				<br>
				<div class="input_wrap">
					<span class="error_msg">Invalid Inputs!. Please try again</span>
					<button type="submit" id="login_btn" class="btn disabled" value="Login" disabled="true">Sgin
						Up</button>
				</div>
			</form>
		</div>
	</div>
	<footer>

		<!--Copy Rights-->
		<p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

	</footer>
	<script src="js/signUpScript.js"></script>

</body>

</html>