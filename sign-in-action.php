<!-- TO DO: 
Duplicate usernames -->

<?php
    session_start();
    if (isset($_SESSION['logged-in'])) {
        header("location: profile.php"); // TODO: update w/ specific profile or index
        exit;
    }
    $error = "";
    include_once("./config.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT username, password FROM User WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "error: " . mysqli_error($con);
    }
    
    
    // $count = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['username'];
        echo '<br>';
    }
?>