<?php 
session_start();
$_SESSION = array();
session_destroy();

include('base.php');
?>

<div class="container">
    Successfully logged out. <a href="/invit.io/base.php">Go home.</a>
</div>
