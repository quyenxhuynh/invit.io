<?php
function deleteTask($id) {
    include_once('config.php');
        $sql = "DELETE FROM Event WHERE event_id='$id'";
        $stmt = $con->prepare($sql);
        if ($stmt->execute()) {
        	$error = "";
        }
        else {
        	$error = mysqli_error($con);
        }
        mysqli_close($con);
        header('Location: events.php');
    }

function getTaskByID($id) {
    include_once('./config.php');
    $sql = "SELECT * FROM Event WHERE event_id='$id' LIMIT 1";
    $rs = $con->query($sql);
    return $rs;
}

?>
