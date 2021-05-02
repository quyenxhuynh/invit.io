<?php session_start(); ?>

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
		} else if (isset($_GET['category']) && !empty($_GET['category'])) {
			$username = $_GET['category'];
		} else if (strpos($_SERVER["REQUEST_URI"], "profile/") !== false) {
			$username = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], "profile") + strlen('profile/'));
			$username = str_replace("/", "", $username);
		} else if (isset($_SESSION['logged_in'])) {
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
				echo '<img src="upload/' . $picture . '" alt="profile picture" class="profile-pic" width=100px>';
			} else {
				echo '<img src="upload/default.jpg" alt="profile picture" class="profile-pic" width=100px>';
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
				} else {
					echo ' (@' . $username . ')';
				}
				?>
			</h2>

		</div>


		<div class='content mt-2'>
			<div id="about me">
				<h4 id="abt-me">About Me</h4>
				<div class='rounded-outline'>
					<?php
					if (!empty($bio)) {
						echo $bio;
					} else {
						echo 'Welcome to ' . $username . "'s profile page!";
					} ?>
				</div>
			</div>
			<div id='invitations'>
				<h4>Invitations</h4>
				<div class='event rounded-outline'>
					<div class='left-event'>
						<h6>Event Name</h6>
						<div class='event-description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, et, quam eius quaerat praesentium consectetur illo quas, totam nisi error autem. Nisi, veniam.</div>
					</div>
					<div class='right-event'>
						<div class='my-2 right'>
							<a href='' class='btn-yes'>Yes</a>
							<a href='' class='btn-no'>No</a>
							<a href='' class='btn-maybe'>Maybe</a>
						</div>
						<div class='mb-2 right'>
							<a href='' class='btn-blue-muted-outline btn-invite'>Message Host</a>
						</div>
						<div class='right'>
							<span class='heart-toggle'>
								<i class='event-icon far fa-heart'></i>
							</span>
							<span class='share-event'>
								<i class='event-icon fas fa-share'></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<!-- EVENT LOOP 2 HERE -->
			<?php
			$sql = "SELECT * FROM Event WHERE organizer='$username' LIMIT 4";
			$rs = $con->query($sql);
			?>
			<div id="events-organized">
				<?php
				if ($rs->num_rows > 0) {
					echo "<h4>Events Organized</h4>";
					while ($row = $rs->fetch_assoc()) {
						echo "<div class='event rounded-outline'>
					<div class='left-event'>
						<h6>" . $row['event_title'] . "</h6>
						<div class='event-description'>" . $row['description'] . "</div>
					</div>
					<div class='right-event'>";
						if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
							if ($_SESSION['logged_in'] != $username) {
								echo "<div class='my-2 right'>
						<a href='' class='btn-yes'>Yes</a>
						<a href='' class='btn-no'>No</a>
						<a href='' class='btn-maybe'>Maybe</a>
					</div>
					<div class='mb-2 right'>
						<a href='' class='btn-blue-muted-outline btn-invite'>Message Host</a></div>";
							}
						}


						echo "
						<div class='right'>
							<span class='heart-toggle'>
								<i class='event-icon far fa-heart'></i>
							</span>
							<span class='share-event'>
								<i class='event-icon fas fa-share'></i>
							</span>
						</div>
					</div>
				</div>";
					}
				}
				?>

				
			</div>
		</div>
		
	</div>

	<?php include('js.html') ?>
	<script src="js/event.js"></script>
</body>

</html>