<?php 
session_start();
if (!isset($_SESSION['logged_in'])) {
	header('Location: sign-in.php');
}

include_once("./config.php");


$current_event_id=$_GET['event_id'];
    
$sql = "SELECT * FROM Event Where event_id='$current_event_id'";
$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $error = "";
}
else {
    $error = mysqli_error($con);
}
$results = $stmt->get_result();
$row = $results->fetch_assoc();


$sql = "SELECT * FROM User";
$stmt = $con->prepare($sql);
if ($stmt->execute()) {
    $error = "";
}
else {
    $error = mysqli_error($con);
}
$usernames = $stmt->get_result();

if(isset($_POST['submit'])){
$sql = "INSERT INTO invitations (event_id, guest, host, event_name, event_description)
VALUES
(?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$guest = $_COOKIE['username'];
$username = $_SESSION['logged_in'];
$event_name = $row['event_title'];
$event_desctiption = $row['description'];

$sql = "SELECT * FROM invitations WHERE event_id='$current_event_id' and guest='$guest'";
$rs = $con->query($sql);
$rows = $rs->num_rows;
if ($rs->num_rows > 0) {
	header("Location: profile.php");
	return;
}
$stmt->bind_param('sssss', $current_event_id, $guest, $username, $event_name, $event_desctiption);
if ($stmt->execute()) {
	$error = "";
	header("Location: profile.php");
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
        <?php 
    
        foreach($results as $result)
            echo '<h2>Send an Invitation for '.$result['event_title'].'</h2>'
 ?>
        <p>
        <form method="post" onsubmit="return checkRegistration()">
        
                
                <div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
                <select id="username" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php 
                    foreach($usernames as $result){
                        echo '<option value="'.$result['username'].'">'.$result['username'].'</option>';
                    }
                    ?>
                </select>
				</div>
			</div>
			<button name='submit' id='submit' class="btn-blue-muted float-right px-4" type="submit" onsubmit="return checkRegistration()">Invite</button>
		</form>
		</p>
	</div>

	<?php include('js.html') ?>
	<script>
		function checkRegistration() {

			//add cookies so that elemnts can be acessed in php
			document.cookie = "username=" + document.getElementById("username").value;

		}
	</script>
</body>

</html>