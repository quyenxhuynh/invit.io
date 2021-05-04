<?php

if (isset($_SESSION['logged_in'])) {
    include_once("./config.php");

    $username = $_SESSION['logged_in'];
    $sql = "SELECT first_name, last_name, email, picture, bio FROM User WHERE username='$username' LIMIT 1";
    $rs = $con->query($sql);
    $row = $rs->fetch_assoc();

    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['bio'] = $row['bio'];

    $_SESSION['set-up'] = TRUE;
}

?>