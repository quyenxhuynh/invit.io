<?php 
session_start();
?>

<!doctype html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include("styles.html") ?>
	<link rel="stylesheet" href="css/events.css">

	
</head>



<body>
	<?php include('navbar.php') ?>
	<?php 
		include_once("./config.php");

		// echo "<script>if(!window.location.hash) {
		// 	window.location = window.location + '#loaded';
		// 	window.location.reload();
		// }</script>";

		$current_event_id=$_GET['event_id'];

		// echo '<script>alert('.$current_event_id.')</script>';
		

		$sql = "SELECT * FROM Event Where event_id='$current_event_id'";
		$stmt = $con->prepare($sql);
		if ($stmt->execute()) {
			$error = "";
		}
		else {
			$error = mysqli_error($con);
		}
		$results = $stmt->get_result();
	
		foreach($results as $result)
			echo '<title>'.$result['event_title'].'</title>
			<!-- HEADER -->
			<div class="container">
				<div class="header">
					<h2>'.$result['event_title'].'</h2>
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
							'.$result['description'].'
						</div>
						<a style="float:right" id="new-event-btn" class="btn-blue-muted m-2" href="delete.php?id='.$result['event_id'].'">Delete</a>
						<a style="float:right" id="new-event-btn" class="btn-blue-muted m-2" href="update-task.php?id='.$result['event_id'].'">Update</a>
					</div>
		
					<div class="right rounded-outline">
						<div class="row">
							Organizer: '.$result['organizer'].' <br>
							Date: '.$result['date'].' <br>
							Time '.$result['time'].'
						</div>
					</div>
				</div>
			</div>'
		?>

<script>
function deleteData(){
		alert('dog')
}
</script>


	<?php include('js.html') ?>
	<script src="js/event.js">
</script>
</body>

</html>