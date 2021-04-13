<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: sign-in.php');
}

if ($_GET['mid']) {
    include_once('config.php');

    // check if this is their msg to delete
    $sql = "SELECT to_user FROM Msg WHERE msg_id=?";
    $stmt = $con->prepare($sql);
    $num = (int)$_GET['mid'];
    $stmt->bind_param('i', $num);
    $stmt->execute();
    $rs = $stmt->get_result();
    if ($rs->num_rows < 1) {
        $_SESSION['bad_alert'] = 'This message does not exist.';
    }
    $row = $rs->fetch_assoc();
    $username = $_SESSION['logged_in'];
    if (strtolower($row['to_user']) != strtolower($username)) {
        $_SESSION['bad_alert'] = 'Permission denied: This message could not be deleted.';
    }

    // delete the msg
    if (empty($_SESSION['bad_alert'])) {
        $sql = "DELETE FROM Msg WHERE msg_id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $num);

        if ($stmt->execute()) {
            $_SESSION['good_alert'] = "Message deleted!";
            $_SESSION['bad_alert'] = "";
        } else {
            $_SESSION['good_alert'] = "";
            $_SESSION['bad_alert'] = mysqli_error($con);
        }
        // header('Location: messages.php');
    }
}
?>


<?php 
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