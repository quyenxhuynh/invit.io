<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php include("styles.html") ?>
	<link rel="stylesheet" href="css/events.css">

	<title>Event Name</title>
</head>

<body>
	<?php include('navbar.html') ?>

	<!-- HEADER -->
	<div class="container">
		<div class="header">
			<h2>Event Name</h2>
			<div>
				<span class="heart-toggle mx-1">
					<i class="event-icon far fa-heart fa-2x"></i>
				</span>
				<span class="share-event mx-1">
					<i class="event-icon fas fa-share fa-2x"></i>
				</span>

			</div>

		</div>

		<!-- CONTENT -->
		<div class="content">
			<div class="left rounded-outline">
				<div class="description">
					Full description and details of event. <br>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ab voluptas aperiam modi iusto labore eveniet impedit dolore distinctio dolorem exercitationem minima ut, quod unde natus optio doloribus atque facilis, praesentium magni? Quasi, nam. Iusto, ab perspiciatis? Repellat tenetur rem facere eaque. Exercitationem ratione mollitia fugiat, itaque doloribus reprehenderit a.
				</div>
			</div>

			<div class="right rounded-outline">
				<div class="row">
					<img class="profile-pic mx-3" src="media/profile-picture.jpg" alt="">
					<h5><a href="profile.php">John Doe</a></h5>
				</div>
				<div class="row">
					Tuesday, March 23, 2021 <br>
					2:00pm
				</div>
			</div>
		</div>
	</div>

	<?php include('js.html') ?>
	<script src="js/event.js"></script>
</body>

</html>