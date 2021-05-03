<?php
include_once("config.php");

if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
    $user = $_SESSION['logged_in'];
    $sql = "SELECT username, picture FROM User WHERE username='$user' LIMIT 1";
    $rs = $con->query($sql);
    $row = $rs->fetch_assoc();

    if (!empty($row['picture'])) {
        $pic = $row['picture'];
    } else {
        $pic = 'default.jpg';
    }
    $username = $row['username'];
}
?>

<nav class="navbar navbar-light bg-light nav-split shadow-sm p-3 mb-5 bg-white rounded">
    <div class="show-hide">
        <i id="hi" class="fas fa-bars fa-2x"></i>
        <i id="bye" class="fas fa-times fa-2x"></i>
    </div>

    <!-- LOGO AND BRAND -->
    <div>
        <a class="navbar-brand" href="base.php">
            <i class="far fa-envelope"></i> invit.io
        </a>
    </div>

    <!-- NAVIGATION -->
    <div id="nav">
        <a class="nav-items" href="base.php">Home</a>
        <a class="nav-items" href="messages.php">Messages</a>
        <a class="nav-items" href="events.php">All Events</a>
        <hr class="hide">
        <?php

        if (isset($_SESSION['logged_in'])) {
            echo '
            <a class="nav-items hide" href="profile.php">Profile</a>
            <a class="nav-items hide" href="settings.php">Settings</a>
            <a class="nav-items hide" href="sign-out.php">Sign Out</a>
            ';
        } else {
            echo '
            <a class="nav-items hide" href="sign-up.php">Register</a>
            <a class="nav-items hide" href="sign-in.php">Sign In</a>
            ';
        }
        ?>
    </div>

    <!-- PROFILE, SETTINGS, AND LOGOUT -->
    <div class="grid-end">
        <?php
        


        if (isset($_SESSION['logged_in'])) {
            echo '
            <a id="new-event-btn" class="btn-blue-muted m-2" href="new-event.php">+ New Event</a>
            <div class="btn-group max-width-4">
                <img id="prof-dropdown" src="https://storage.cloud.google.com/invitio-21.appspot.com/upload/' . $pic . '?authuser=2" class="profile-pic dropdown-toggle" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="">
                <div class="dropdown-menu dropdown-menu-right right-align min-width-content"
                    aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="settings.php">Settings</a>
                    <a class="dropdown-item" href="sign-out.php">Sign Out</a>
                </div>
            </div>
            ';
        } else {
            echo '
            <a id="new-event-btn" class="btn-blue-muted m-2" href="sign-up.php">Register</a>
            <a id="new-event-btn" class="btn-blue-muted-outline m-2" href="sign-in.php">Sign In</a>';
        }
        ?>
    </div>
</nav>