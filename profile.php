<?php session_start(); ?>

<!-- BASE TEMPLATE TO C/P TO NEW PAGES -->
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include("styles.html") ?>
	<link rel="stylesheet" href="css/profile.css">

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="container">
		<?php
		if (isset($_GET['username']) && !empty($_GET['username'])) {
			$username = $_GET['username'];
		} 
		else if (isset($_SESSION['logged_in'])) {
			$username = $_SESSION['logged_in'];
		}

		include_once("./config.php");

		$sql = "SELECT * FROM User WHERE username=? LIMIT 1";

		$stmt = $con->prepare($sql);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		$row = $result->fetch_assoc();
		$username = $row['username'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$picture = $row['picture'];
		$bio = $row['bio'];
		?>

		<div class="header-row">
			<?php

			if (isset($picture) && !empty($picture)) {
				echo '<img src="./upload/' . $picture . '" alt="profile picture" class="profile-pic" width=100px>';
			} else {
				echo '<img src="./upload/default.jpg" alt="profile picture" class="profile-pic" width=100px>';
			}

			?>

			<h2 class='ml-3'>
				<?php

				if (isset($first_name) && !empty($first_name)) {
					echo $first_name . ' ';
				}
				if (isset($last_name) && !empty($last_name)) {
					echo $last_name;
				}
				if (!isset($first_name) && !isset($last_name)) {
					echo $username;
				}
				?>
			</h2>

		</div>


		<h4 class='my-3'>Invitations</h4>

		<h4 class='my-3'>Events Organized</h4>
	</div>

	<?php include('js.html') ?>
	<script src="js/event.js"></script>
</body>

</html>