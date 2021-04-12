<?php

function getProfileInfo($username) {
    include_once("./config.php");

    $sql = "SELECT * FROM User WHERE username=? LIMIT 1";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $username = $row['username'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $picture = $row['picture'];
    $bio = $row['bio'];

    $all = array($username, $first_name, $last_name, $email, $picture, $bio);
    return $all;
}


?>