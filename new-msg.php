<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: sign-in.php');
}

if (isset($_POST['send-msg'])) {
    include_once('config.php');
    $sql = "SELECT username FROM User WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $rs = $stmt->get_result();
    if (!$rs) {
        echo mysqli_error($con);
    }
    if (mysqli_num_rows($rs) < 1) {
        $error = "Username doesn't exist";
    } 
    else {
        $sql = "INSERT INTO Msg (from_user, to_user, msg_content)
			VALUES
			(?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sss', $_SESSION['logged_in'], $_POST['username'], $_POST['content']);
        if ($stmt->execute()) {
            $error = "";
            header("Location: messages.php");
        }
    }
}
?>

<!-- BASE TEMPLATE TO C/P TO NEW PAGES -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="quyen huynh, alex johnson">

    <?php include("styles.html") ?>
    <link rel="stylesheet" href="/invit.io/css/messages.css">

    <title>invit.io</title>
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container">
        <form method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Recipient</label>
                <div class="col-sm-10">
                    <input id="username" name="username" class="form-control" type="text" placeholder="johndoe" required>
                    <span style="color: red"><?php if (!empty($error)) echo $error; ?></span>
                </div>


            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea id="content" name="content" class="form-control" placeholder="Good morning!" required></textarea>
                </div>
            </div>
            <button name="send-msg" class="btn-blue-muted float-right px-4" type="submit">Send Message</button>
        </form>
    </div>

    <?php include('js.html') ?>
</body>

</html>