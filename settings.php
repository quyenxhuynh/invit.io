<?php session_start();
if (!isset($_GET['username']) && !isset($_SESSION['logged_in'])) {
    header("Location: sign-in.php");
}

require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

if (isset($_POST['update-settings'])) {
    include_once("config.php");
    $username = $_SESSION['logged_in'];

    if (empty($error)) {
        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
            $name = $_SESSION['logged_in'] . ".";
            $name = $name . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $extensions_arr)) {
                $query = "UPDATE User SET picture='$name' WHERE username='$username'";
                mysqli_query($con, $query);


                $storage  = new StorageClient([
                    'keyFilePath' => 'google-key.json'
                ]);
                $file = fopen($_FILES['file']['tmp_name'], 'r');
                $bucket = $storage->bucket('invitio-21.appspot.com');
                $object = $bucket->upload($file, [
                    'name' => $target_dir . $name
                ]);
                // move_uploaded_file($_FILES['file']['tmp_name'], 'gs://invitio-21.appspot.com/' . $target_dir . $name);
                // $bucket->upload(
                //     fopen($_FILES['file']['tmp_name'], $target_dir . $name, 'r'),
                //     ['name' => $target_dir . $name]
                // );
                // $_SESSION['good_alert'] = "Uploaded " . PHP_EOL . "to gs://" . 'invitio-21.appspot.com/' . $target_dir . $name;
            }
        }


        $sql = "UPDATE User SET first_name=?, last_name=?, email=?, bio=? WHERE username=?";
        $stmt = $con->prepare($sql);
        $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : $_SESSION['first_name'];
        $last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : $_SESSION['last_name'];
        $email = !empty($_POST['email']) ? $_POST['email'] : $_SESSION['email'];
        $bio = !empty($_POST['bio']) ? $_POST['bio'] : $_SESSION['bio'];
        $stmt->bind_param('sssss', $first_name, $last_name, $email, $bio, $username);


        if ($stmt->execute()) {
            $_SESSION['good_alert'] = "Settings saved!";
        } else {
            echo mysqli_error($con);
        }

        include('var-setup.php');
        header('Location: settings.php');
        // exit();
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
                    <input name="first_name" class="form-control" type="text" placeholder="<?php if (isset($_SESSION['first_name'])) echo $_SESSION['first_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input name="last_name" class="form-control" type="text" placeholder="<?php if (isset($_SESSION['last_name'])) echo $_SESSION['last_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email Address</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" placeholder="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bio</label>
                <div class="col-sm-10">
                    <input name="bio" class="form-control" type="text" placeholder="<?php if (isset($_SESSION['bio'])) echo $_SESSION['bio'] ?>">
                </div>
            </div>
            <button name="update-settings" class="btn-blue-muted float-right px-4" type="submit">Save Settings</button>
        </form>
    </div>

    <?php include('js.html') ?>
</body>

</html>