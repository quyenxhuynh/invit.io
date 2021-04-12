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
	<link rel="stylesheet" href="/invit.io/css/messages.css">
	<!-- <link rel="stylesheet" href="/invit.io/css/test.css"> -->

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php');
	if (isset($_SESSION['good_alert']) && !empty($_SESSION['good_alert'])) {
		echo '<div class="alert alert-success mx-4" role="alert">' .
			$_SESSION['good_alert'] .
			'</div>';
	}
	unset($_SESSION['good_alert']);

	if (isset($_SESSION['bad_alert']) && !empty($_SESSION['bad_alert'])) {
		echo '<div class="alert alert-danger mx-4" role="alert">' .
			$_SESSION['bad_alert'] .
			'</div>';
	}
	unset($_SESSION['bad_alert']);
	?>

	
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
						if ($i != $rs->num_rows - 1) {
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
				

				<?php
				if (!empty($_GET)) {
					$sql = "SELECT * FROM Msg WHERE msg_id=?";
					$stmt = $con->prepare($sql);
					$num = (int)$_GET['id'];
					$stmt->bind_param('i', $num);
					$stmt->execute();
					$rs = $stmt->get_result();
					if(mysqli_num_rows($rs) > 0){
						$row = $rs->fetch_assoc();

						$otherUser = $row['from_user'];
						$msgContent = $row['msg_content'];
	
						$sql = "SELECT username,picture FROM User WHERE username=?";
						$stmt = $con->prepare($sql);
						$stmt->bind_param('s', $otherUser);
						$stmt->execute();
						$rs = $stmt->get_result();
						$row = $rs->fetch_assoc();
						
						$profPic = $row['picture'];
						$otherUser = $row['username'];
	
						if (!empty($profPic)){
							echo '<div class="row m-2"><img src="/invit.io/upload/' . $profPic . '" class="profile-pic" width=100px>';
						}
						else {
							echo '<div class="row m-2"><img src="/invit.io/upload/default.jpg" class="profile-pic" width=100px>';
						}
						
	
						echo "<h3 class='m-2'>@" . $otherUser . '</h3></div>';
						echo "<div><a href='/invit.io/new-msg.php?user=" . $otherUser . "' class='btn-blue-muted-outline m-1'>Reply</a>";
						echo "<a href='/invit.io/del-msg.php?mid=" . $_GET['id'] . "' class='btn-red-muted m-1'>Delete</a></div>";
						echo '</div>';
						echo "<div class='msg-content'>";
						echo $msgContent;
						echo '</div>';
					}
					
				}
				?>
			</div>

		</div>
	</div>

	<?php include('js.html') ?>
</body>

</html>