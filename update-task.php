<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['logged_in'])) {
	header('Location: sign-in.php');
}

include_once("./config.php");

$sql = "SELECT * FROM Event WHERE event_id='$_GET[id]' LIMIT 1";
$rs = $con->query($sql);

if ($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();

    $event_title = $row['event_title'];
    $location =  $row['location'];
    $description = $row['description'];
    $date = $row['date'];
    $time =  $row['time'];
    $is_private = $row['is_private'];
    $id = $row['event_id'];
}

$rs->close();


if(isset($_POST['submit'])){



$sql = "UPDATE Event SET event_title=?, description=?, date=?, time=?, location=?, is_private=? WHERE event_id=?";
$stmt = $con->prepare($sql);
$event_title = $_COOKIE['event_title'];
$description = $_COOKIE['description'];
$date = $_COOKIE['date'];
$time = $_COOKIE['time'];
$location = $_COOKIE['location'];
$is_private = $_COOKIE['is_private'];
$stmt->bind_param('sssssis', $event_title, $description, $date, $time, $location, $is_private, $id);
if ($stmt->execute()) {
    $error = "";
    header('Location: event.php?event_id='.$id);
}
else {
	$error = mysqli_error($con);
}
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include('styles.html') ?>

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
		<h2>Update Event</h2>
		<p>
		<form method="post" onsubmit="return checkRegistration()">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Event Name</label>
				<div class="col-sm-10">
					<input id="name" class="form-control" type="text" placeholder="Christmas Party!" value="<?php echo $event_title ?>">
					<span class="error_message" id="err_name"></span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Location</label>
				<div class="col-sm-10">
					<input id="loc" class="form-control" type="text" placeholder="248 McCormick Rd, Charlottesville, VA" value="<?php echo $location ?>">
					<span class="error_message" id="err_loc"></span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<input id="description" class="form-control" type="text" placeholder="Enter description here" value="<?php echo $description ?>">
					<span class="error_message" id="err_description"></span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Date</label>
				<div class="col-sm-10">
					<input id="date" class="form-control" type="date" placeholder="2021-12-24" value="<?php echo $date ?>">
					<span class="error_message" id="err_date"></span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Time</label>

				<div class="col-sm-10">
					<input id="time" class="form-control" type="time" placeholder="18:00:00" value="<?php echo $time ?>">
					<span class="error_message" id="err_time"></span>
				</div>
			</div>
			<div class="form-group row ml-2">
				<div class="form-check form-check-inline">
					<input id="public" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" <?php if ($is_private != 1) echo 'checked' ?>>
					<label class="form-check-label" for="inlineRadio1">Public</label>
				</div>
				<div class="form-check form-check-inline">
					<input id="private" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" <?php if ($is_private == 1) echo 'checked' ?>>
					<label class="form-check-label" for="inlineRadio2">Private</label>
				</div>
				<span class="error_message" id="err_public_private"></span>
			</div>
			<button name='submit' id='submit' class="btn-blue-muted float-right px-4" type="submit" onsubmit="return checkRegistration()">Update Event</button>
		</form>
		</p>
	</div>

	<?php include('js.html') ?>
	<script>
		function checkRegistration() {

			//add cookies so that elemnts can be acessed in php
			document.cookie = "date=" + document.getElementById("date").value;
			document.cookie = "time=" + document.getElementById("time").value;

			var number_error = 0;

      // check that the name is filled out and less than 100 characters
			var name = document.getElementById("name");
			document.cookie = "event_title=" + name.value;

			if (name.value.length > 100 || name.value.length == 0) {
				number_error++;
				if (name.value.length > 100) {
					document.getElementById("err_name").innerHTML = "Event name must be less than 100 characters";
				} else {
					document.getElementById("err_name").innerHTML = "No name given, please enter an event name";
				}
			} else {
				document.getElementById("err_name").innerHTML = "";
			}

      // check that the location is entered in the "city, state" format
			var loc = document.getElementById("loc");
			document.cookie = "location=" + loc.value;
			var loc_split = loc.value.split(',')

			if (!loc.value.includes(',') || !(loc_split.length == 2) || !(loc_split[0].trim(' ').length > 0) || !(loc_split[1].trim(' ').length > 0)) {
				number_error++;
				document.getElementById("loc").value = loc.value;
				if (loc.value == '') {
					document.getElementById("err_loc").innerHTML = "No location given, please enter an event location";
				} else {
					document.getElementById("err_loc").innerHTML = "Location should be in the format, \"city, state\"";
				}

			} else {
				document.getElementById("err_loc").innerHTML = "";
			}

			var description = document.getElementById("description");
			document.cookie = "description=" + description.value;

			if (description.value.length > 500 || description.value.length == 0) {
				number_error++;
				if (description.value.length > 500) {
					document.getElementById("err_description").innerHTML = "Description must be less than 500 characters";
				} else {
					document.getElementById("err_description").innerHTML = "No event description given, please enter an event description";
				}
			} else {
				document.getElementById("err_description").innerHTML = "";
			}
			

      // Check that private or public is checked
			var public = document.getElementById('public').checked
			var private = document.getElementById('private').checked
			

			if (!public && !private) {
				number_error++;
				document.getElementById("err_public_private").innerHTML = "Please select either public or private for your event";
			} else {
				if(public){
					document.cookie = "is_private=" + 0;
				} else {
					document.cookie = "is_private=" + 1;
				}
				document.getElementById("err_public_private").innerHTML = "";
			}

			if (number_error > 0) {
				return false;
			} else{ // Data types and values are acceptable, format looks OK; form can be submitted.
				return true;
			}
		}
	</script>
</body>

</html>

?>