<?php
    include_once("./config.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $hashed = password_hash("Password", PASSWORD_DEFAULT);
    // Form the SQL query (an INSERT query)
    $sql = "INSERT INTO User (username, password, email)
    VALUES
    ('$_POST[username]','$hashed','$_POST[email]')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "1 record added"; // Output to user
    mysqli_close($con);
?>