<!-- BASE TEMPLATE TO C/P TO NEW PAGES -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include("styles.html") ?>

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.html') ?>

	<?php 
	if (isset($error)) {
		echo '<div class="alert alert-warning" role="alert">' . 
			$error . 
			'</div>';
	}
	?>

	<div class="container">
		<h2>Create a New Account</h2>
		<p>
		<form action="sign-in-action.php" method="post">
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
			<button class="btn-blue-muted float-right px-4" type="submit">Sign In</button>
		</form>
		</p>
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