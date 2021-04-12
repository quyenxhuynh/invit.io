<?php
session_start();
if (isset($_SESSION['logged_in'])) {
	header('Location: base.php');
}

include_once("./config.php");

if (isset($_POST['sign-up'])) {
	$sql = "SELECT email FROM User WHERE email = ?";
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$rs = $stmt->get_result();
	if (!$rs) {
		echo mysqli_error($con);
	}
	if (mysqli_num_rows($rs) > 0) {
		$error = "Email taken!";
	}
	else{ 

	$sql = "SELECT username FROM User WHERE username = ?";
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$rs = $stmt->get_result();
	if (!$rs) {
		echo mysqli_error($con);
	}

	
	if (mysqli_num_rows($rs) > 0) {
		$error = "Username taken!";
	} 
	else {
		if (strlen($_POST['password1']) < 8) {
			$error = "Password must be at least 8 characters long.";
		} else if ($_POST['password1'] != $_POST['password2']) {
			$error = "Passwords don't match.";
		}

		if (empty($error)) {
			$hashed = password_hash($_POST['password1'], PASSWORD_DEFAULT);

			$sql = "INSERT INTO User (username, password, email)
			VALUES
			(?, ?, ?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('sss', $_POST['username'], $hashed, $_POST['email']);
			if ($stmt->execute()) {
				$error = "";
				$_SESSION['logged_in'] = $_POST['username'];
				header("Location: base.php");
			}
			else {
				$error = mysqli_error($con);
			}
		}
	}
	mysqli_close($con);
}
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
		<?php if (isset($error) && (!empty($error))) {
			echo '<div class="alert alert-danger" role="alert">' .
				$error .
				'</div>';
		}
		?>
		<h2>Create a New Account</h2>
		<br>
		<form onsubmit="return cookies()" method="post">
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

			<button name="sign-up" id="sign-up" class="btn-blue-muted float-right px-4" onsubmit="return cookies()" type="submit">Sign Up</button>
		</form>
	</div>

	<?php include('js.html') ?>
	<script>
		function cookies(){
			var user = document.getElementById("username");
			document.cookie = "username=" + user.value;
		}
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