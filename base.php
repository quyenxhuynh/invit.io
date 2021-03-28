<?php session_start(); ?>

<!-- BASE TEMPLATE TO C/P TO NEW PAGES -->
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

	<?php
		
		if (isset($_SESSION['logged-in'])) {
			echo 'Welcome back, ' . $_SESSION['logged-in'];
		}
	?>

	<?php include('js.html') ?>
</body>

</html>