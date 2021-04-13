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
	<!-- <link rel="stylesheet" href="css/test.css"> -->

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="border">
		<div class='sidebar'>
			<div class='search'>
				<a href="new-msg.php" class='btn-blue-muted'>+ New Message</a>
			</div>
			<div class='msg-prev'>
				<?php
				$sql = "SELECT * FROM Msg WHERE to_user = ? ORDER BY time DESC LIMIT 15";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('s', $_SESSION['logged_in']);
				$stmt->execute();
				$rs = $stmt->get_result();

				if ($rs->num_rows > 0) {
					$i = 0;
					while ($row = $rs->fetch_assoc()) {
						echo '<h6><a href="messages.php?id=' . $row['msg_id'] . '">';
							echo $row['from_user'] . "<br>";
							echo '<div class="msg-preview">';
							echo substr($row['msg_content'], 0, min(strlen($row['msg_content']), 32));
							echo '</div>';
							echo '</a></h6>';
						if ($i != $rs->num_rows-1) {
							echo '<div class="hl"></div>';
						}
						$i += 1;
					}
				}
				?>
			</div>
		</div>
		<div class='cur-msg'>
			<div class='header-row'>
				<img src="upload/default.jpg" class="profile-pic" width=100px>
				
				<?php
				if (!empty($_GET)) {
					$sql = "SELECT * FROM Msg WHERE msg_id=?";
					$stmt = $con->prepare($sql);
					$num = (int)$_GET['id'];
					$stmt->bind_param('i', $num);
					$stmt->execute();
					$rs = $stmt->get_result();
					$row = $rs->fetch_assoc();

					echo "<h3 class='m-2'>" . $row['from_user'] . '</h3>';
					echo '</div>';
					echo "<div class='msg-content'>";
					echo $row['msg_content'];
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>

	<?php include('js.html') ?>
</body>

</html>