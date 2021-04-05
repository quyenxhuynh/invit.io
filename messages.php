<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
	header('Location: sign-in.php');
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include("styles.html") ?>
	<link rel="stylesheet" href="css/messages.css">

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="border">
		<div class='sidebar'>
			dshf
		</div>
		<div class='current-msg'>
			<div class='header-row'>
				<img src="./upload/default.jpg" alt="profile picture" class="profile-pic" width=100px>
				<h4 class='m-2'>John Doe</h4>
			</div>
			<hr>
		</div>
	</div>

	<?php include('js.html') ?>
</body>

</html>