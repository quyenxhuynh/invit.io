<!-- show img potential src: https://jsfiddle.net/bootstrapious/8w7a50n2 -->

<?php
session_start();
if (!isset($_SESSION['logged-in'])) {
    header('Location: sign-in.php');
}

$username = $_SESSION['logged-in'];

include_once("./config.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['update-settings'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    else {
        // to fix
        echo "Please select an image file to upload.";  
    }
    // not done lol
    $sql = "UPDATE User SET first_name='$_POST[fn]', last_name='$_POST[ln]', picture='$imgContent', email='$_POST[email]' first  WHERE username=? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
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
        <h2>Settings</h2>
        <br>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Profile Picture</label>
                <div class="col-sm-10">
                    <input name="pic" id="profile-pic" class="form-control" type="file">
                    <span class="error_message" id="file_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input name="fn" class="form-control" type="text" placeholder="Current First Name">
                    <span class="error_message" id="fn_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input name="ln" class="form-control" type="text" placeholder="Current Last Name" value="">
                    <span class="error_message" id="ln_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input name="username" class="form-control" type="text" placeholder="<?php echo $_SESSION['logged-in'] ?>">
                    <span class="error_message" id="user_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="email" placeholder="Current Email">
                    <span class="error_message" id="email_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input name="password1" class="form-control" type="password" placeholder="*********">
                    <span class="error_message" id="pw1_err"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input name="password2" class="form-control" type="password" placeholder="*********">
                    <span class="error_message" id="pw2_err"></span>
                </div>
            </div>
            <button name="update-settings" class="btn-blue-muted float-right px-4" type="submit">Save Settings</button>
        </form>
    </div>

    <?php include('js.html') ?>
</body>

</html>