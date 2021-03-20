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

	<div class="container">
		<h2>Create a New Account</h2>
		<p>
		<form action="auth-action.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input id="username" name="username" class="form-control" type="text" placeholder="johndoe" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email Address</label>
				<div class="col-sm-10">
					<input id="email" name="email" class="form-control" type="text" placeholder="johndoe@company.co" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input id="password1" name="password1" class="form-control" type="password" placeholder="********" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Confirm Password</label>
				<div class="col-sm-10">
					<input id="password2" name="password2" class="form-control" type="password" placeholder="********" required>
				</div>
			</div>
            
			<button class="btn-blue-muted float-right px-4" type="submit">Sign Up</button>
		</form>
		</p>
	</div>

	<?php include('js.html') ?>
	<script>
		var user = document.getElementById("username");
		user.onkeyup = function () {
			if (user.value.length > 150) {
				user.setCustomValidity("Username too long!")
			} else {
				user.setCustomValidity("");
			}
		}

		var pw1 = document.getElementById("password1");
		var pw2 = document.getElementById("password2");

		pw2.onkeyup = function () {
			if(pw1.value != pw2.value) {
				pw2.setCustomValidity("Passwords do not match!")
			}
			else {
				pw2.setCustomValidity("");
			}
		}
	</script>
</body>

</html>