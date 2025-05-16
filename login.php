<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="css/login.css" rel="stylesheet">
</head>
<body>

<?php
if (isset($_SESSION['error'])) {
    echo "<div class='error-message' style='color:red; text-align:center; margin:10px 0;'>" . htmlspecialchars($_SESSION['error']) . "</div>";
    unset($_SESSION['error']);
}
?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="logic/signup.php" method="POST">
			<h1>Create Account</h1>
			
			<input type="text" placeholder="Username" name="username" />
			<input type="email" placeholder="Email" name="email" />
			<input type="password" placeholder="Password" name="password"/>
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="logic/login.php" method="post">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="username" placeholder="Username" name="username" />
			<input type="password" placeholder="Password" name="password"/>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="js/login.js"></script>
<footer>
	
</footer>
</body>
</html>
