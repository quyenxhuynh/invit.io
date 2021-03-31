<!-- show img potential src: https://jsfiddle.net/bootstrapious/8w7a50n2 -->

<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: sign-in.php');
}

include_once("./config.php");
if (!isset($_SESSION['set-up'])) {
    include('var-setup.php');
}

if (isset($_POST['update-settings'])) {
    if (empty($error)) {
        $name = $username . ".";
        $name = $name . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        // $name = $_FILES['file']['name'];

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {
            $query = "UPDATE User SET picture='$name' WHERE username='$username'";
            mysqli_query($con, $query);
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
        }

        $sql = "UPDATE User SET first_name=?, last_name=?, email=?, picture=? WHERE username=? LIMIT 1";
        $stmt = $con->prepare($sql);
        $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : $_SESSION['first_name'];
        $last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : $_SESSION['last_name'];
        $email = !empty($_POST['email']) ? $_POST['email'] : $_SESSION['email'];
        $stmt->bind_param('sssss', $first_name, $last_name, $email, $name, $username);
        $stmt->execute();

        $_SESSION['good_alert'] = "Settings saved!";
        include('var-setup.php');
        header('Location: settings.php');
        exit();
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="quyen huynh, alex johnson">

    <?php include('styles.html') ?>

    <title>invit.io - Settings</title>
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container">
        <?php
        if (isset($_SESSION['good_alert']) && !empty($_SESSION['good_alert'])) {
            echo '<div class="alert alert-success" role="alert">' .
                $_SESSION['good_alert'] .
                '</div>';
        }
        unset($_SESSION['good_alert']);
        ?>
        <h2>Settings</h2>
        <br>
        <form method="post" enctype='multipart/form-data'>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Profile Picture</label>
                <div class="col-sm-10">
                    <input type='file' name='file'>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input name="first_name" class="form-control" type="text" placeholder="<?php echo $_SESSION['first_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input name="last_name" class="form-control" type="text" placeholder="<?php echo $_SESSION['last_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" placeholder="<?php echo $_SESSION['email'] ?>">
                </div>
            </div>
            <button name="update-settings" class="btn-blue-muted float-right px-4" type="submit">Save Settings</button>
        </form>
    </div>

    <?php include('js.html') ?>
    <script>
        var user = document.getElementById("username");
        user.onkeyup = function() {
            if (user.value.length > 150) {
                user.setCustomValidity("Username too long!")
            } else {
                user.setCustomValidity("");
            }
        }

        var pw1 = document.getElementById("password1");
        var pw2 = document.getElementById("password2");

        pw2.onkeyup = function() {
            if (pw1.value != pw2.value) {
                <?php $error = "Passwords don't match"; ?>
            }
        }
    </script>
</body>

</html>