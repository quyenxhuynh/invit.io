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
			<div class='msg-side'>
				<div class='msg-name'>John Doe</div>
				<div class='msg-preview'>hello</div>
			</div>

			<div class='hl'></div>
		</div>
		<div class='vl'></div>
		<div class='current-msg'>
			<div class='header-row'>
				<img src="./upload/default.jpg" alt="profile picture" class="profile-pic" width=100px>
				<h4 class='m-2'>John Doe</h4>
			</div>
			<div class='hl'></div>
			<div class='msgs'>
				<div class='prev-msgs'>
					<div class='to-msg'>hj!</div>
					<div class='from-msg'>hello!</div>
				</div>
				<div class='new-msg'>
					<form action="">
						<input size='1' type="text" name="" class='new-msg-content' placeholder="Message">
						<button class='new-msg-btn'>Send</button>
					</form>
				</div>

			</div>

		</div>
	</div>

	<?php include('js.html') ?>
</body>

</html>