<?php
session_start();
if (isset($_SESSION['logged-in'])) {
	header('Location: base.php');
}

include_once("./config.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['sign-up'])) {
	$sql = "SELECT * FROM User WHERE username = '$_POST[username]'";
	$rs = mysqli_query($con, $sql);
	if (!$rs) {
		echo mysqli_error($con);
	}
	if (mysqli_num_rows($rs) > 0) {
		$error = "Username taken!";
	} else {
		if (strlen($_POST['password1']) < 8) {
			$error = "Password must be at least 8 characters long.";
		} else if ($_POST['password1'] != $_POST['password2']) {
			$error = "Passwords don't match.";
		}

		$hashed = password_hash($_POST['password1'], PASSWORD_DEFAULT);

		$sql = "INSERT INTO User (username, password, email)
		VALUES
		('$_POST[username]','$hashed','$_POST[email]')";

		$rs = mysqli_query($con, $sql);
		if (!$rs) {
			echo mysqli_error($con);
		}

		$error = "";
		$_SESSION['logged-in'] = $_POST['username'];
		// echo $_SESSION['logged-in'];
		header("Location: base.php");
		// echo '<div class="alert alert-success" role="alert">Account created successfully</div>';
	}
	mysqli_close($con);
	}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include("styles.html") ?>

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php'); ?>


	<div class="container">
		<?php if (isset($error)) {
			echo '<div class="alert alert-danger" role="alert">' .
				$error .
				'</div>';
			}
		?>
		<h2>Create a New Account</h2>
		<br>
		<form method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input id="username" name="username" class="form-control" type="text" placeholder="johndoe" required>
				</div>

			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Email Address</label>
				<div class="col-sm-10">
					<input id="email" name="email" class="form-control" type="email" placeholder="johndoe@company.co" required>
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

			<button name="sign-up" id="sign-up" class="btn-blue-muted float-right px-4" type="submit">Sign Up</button>
		</form>
	</div>

	<?php include('js.html') ?>
	<script>
		var user = document.getElementById("username");
		user.onkeyup = function() {
			if (user.value.length > 150) {
				user.setCustomValidity("Username too long!")
			} else {
				user.setCustomValidity("");
			}
		}

		var pw1 = document.getElementById("password1");
		var pw2 = document.getElementById("password2");

		pw2.onkeyup = function() {
			if (pw1.value != pw2.value) {
				<?php $error = "Passwords don't match"; ?>
			}
		}
	</script>
</body>

</html>