<?php

session_start();
if (isset($_SESSION['logged_in'])) {
	header('Location: base.php');
}

include_once('auth-functions.php');
if (isset($_POST['sign-in'])) {
	$error = login($_POST['username'], $_POST['password']);
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include("styles.html") ?>

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="container">
		<?php 
		if (isset($error) && !empty($error)) {
			echo '<div class="alert alert-danger" role="alert">' . 
				$error . 
				'</div>';
		}
		?>
		<h2>Sign in</h2>
		<br>
		<form method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input id="username" name="username" class="form-control" type="text" placeholder="johndoe" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input id="password" name="password" class="form-control" type="password" placeholder="********" required>
				</div>
			</div>
			<button name="sign-in" class="btn-blue-muted float-right px-4" type="submit">Sign In</button>
		</form>
		<small>Don't have an account? <a href="/invit.io/sign-up.php" class="highlighted-link">Sign up!</a></small>
	</div>

	<?php include('js.html') ?>
	<script>
		var user = document.getElementById("username");
		user.onkeyup = function () {
			if (user.value.length > 150) {
				user.setCustomValidity("Username too long!")
			} 
			else {
				user.setCustomValidity("");
			}
		}
	</script>
</body>

</html>