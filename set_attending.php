<?php 
session_start();
include_once("./config.php");


$attending=$_GET['attending'];
$event_id=$_GET['event_id'];
$guest = $_SESSION['logged_in'];

$sql = "UPDATE invitations SET attending=? WHERE event_id=? and guest=?";
$stmt = $con->prepare($sql);
$stmt->bind_param('sss', $attending, $event_id, $guest);
if ($stmt->execute()) {
    $error = "";
    header('Location: profile.php');
}
else {
	$error = mysqli_error($con);
}


?>