<?php 
session_start();
?>

<script>
		function test1(){
			alert("data");
		}
		function deleteData(data){
		document.cookie = "current_event_id=" + data;
		<?php
			include_once("./config.php");
			// echo '<script>alert(cat)</script>';
			// $sql = "DELETE FROM Event WHERE event_id='$_COOKIE[current_event_id]'";
			// $stmt = $con->prepare($sql);
			// if ($stmt->execute()) {
			// 	$error = "";
			// }
			// else {
			// 	$error = mysqli_error($con);
			// }
		?>
		}
	</script>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include("styles.html") ?>
	<link rel="stylesheet" href="css/events.css">

	<title>invit.io</title>
</head>

<body>
	<?php include('navbar.php') ?>

	<div class="container">
	<?php if (isset($error) && (!empty($error))) {
			echo '<div class="alert alert-danger" role="alert">' .
				$error .
				'</div>';
		}
		?>
		<div class="header">
			<h2>All Events</h2>

			<!-- SORT OPTIONS -->
			<!-- <form>
			<div class="btn-group btn-group-toggle" data-toggle="buttons">
				<label class="btn btn-secondary active">
					<input type="radio" name="options" id="newest" onclick="test1()"> Newest
				</label>
				<label class="btn btn-secondary">
					<input type="radio" name="options" id="oldest" onclick="test2()"> Oldest
				</label> -->
		</div>
		<!-- </div>
		</form> -->

		<!-- ALL EVENTS -->
		<?php 
		include_once("./config.php");

		$sql = "SELECT * FROM Event";
		$stmt = $con->prepare($sql);
		$_POST;
		if ($stmt->execute()) {
			$error = "";
		}
		else {
			$error = mysqli_error($con);
		}
		$results = $stmt->get_result();
	
		foreach($results as $result)
			echo '<div class="events-list-lg">
			<div class="event rounded-outline">
				<h5><a href="event.php?event_id='.$result['event_id'].' ">'.$result['event_title'].'</a></h5>
				<p>'.$result['description'].'</p>
			</div>
		</div>'
		?>



	</div>

	

	<?php include('js.html') ?>
</body>

</html>