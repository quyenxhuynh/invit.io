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

	<div class="container">
		<?php
		if (isset($_GET['username']) && !empty($_GET['username'])) {
			$username = $_GET['username'];
		}
		else {
			$username = $_SESSION['logged-in'];
		}

		include_once("./config.php");
		$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

		if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

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
		?>

		<h2>
			<?php 
			if (isset($first_name) && !empty($first_name)) {
				echo $first_name;
			}
			if (isset($last_name) && !empty($last_name)) {
				echo $last_name;
			}
			if (!isset($first_name) && !isset($last_name)) {
				echo $username;
			}
			?>
		</h2>

		<h4 class='my-3'>Invitations</h4>

		<h4 class='my-3'>Events Organized</h4>
	</div>
	
	<?php include('js.html') ?>
</body>

</html>