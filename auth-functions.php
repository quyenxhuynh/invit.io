<?php

function login($user, $pass)
{
    include_once('config.php');
    $sql = "SELECT username, password FROM User WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $rs = $stmt->get_result();
    if (!$rs) {
        echo mysqli_error($con);
    }
    if (mysqli_num_rows($rs) < 1) {
        $error = "Username doesn't exist";
    } else {
        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);

        if (password_verify($pass, $row['password'])) {
            $error =  "";
            $_SESSION['logged_in'] = $row['username'];
            header("Location: base.php");
        } else {
            $error = "The username or password do not match";
        }
    }
    return $error;
}

function register($user, $email, $pw1, $pw2)
{
    include_once('config.php');
    $sql = "SELECT username FROM User WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $rs = $stmt->get_result();
    if (mysqli_num_rows($rs) > 0) {
        $error = "Username taken!";
        return $error;
    }
    $sql = "SELECT email FROM User WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $rs = $stmt->get_result();

    if (mysqli_num_rows($rs) > 0) {
        $error = "This email has already been associated with another account.";
        return $error;
    }

    if (strlen($pw1) < 8) {
        $error = "Password must be at least 8 characters long.";
        return $error;
    } else if ($pw1 != $pw2) {
        $error = "Passwords don't match.";
        return $error;
    }

    if (empty($error)) {
        $hashed = password_hash($pw1, PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (username, password, email)
			VALUES
			(?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sss', $user, $hashed, $email);
        if ($stmt->execute()) {
            $error = "";
            $_SESSION['logged_in'] = $user;
            header("Location: base.php");
        } else {
            $error = mysqli_error($con);
        }
    }
    return $error;
}
