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

if (isset($_POST['sign-in'])) {
	$sql = "SELECT password FROM User WHERE username = '$_POST[username]'";
	$rs = mysqli_query($con, $sql);
	if (!$rs) {
		echo mysqli_error($con);
	}
	if (mysqli_num_rows($rs) < 1) {
		$error = "Username doesn't exist";
	} else {
		$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);

		if(password_verify($_POST['password'], $row['password'])){
			$error =  "";
			$_SESSION['logged-in'] = $_POST['username'];
			header("Location: base.php");
		} else {
			$error = "The username or password do not match";
		}
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
		<small>Don't have an account? <a href="sign-up.php">Sign up!</a></small>
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