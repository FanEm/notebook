<?php
session_start();
if (isset($_POST['cancel'])) {
    header('Location: login.php');
    return;
}
$salt = 'XyZzy12*_';
// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['password']) ) {
    if (strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1) {
        $failure = "User name and password are required";
    } else {
        $check = $_POST['email'] === 'test' && $_POST['password'] === 'test';
        if ($check) {
            // Redirect the browser to index.php
            $_SESSION['email'] = htmlentities($_POST['email']);
            header("Location: index.php");
            return;
        } else {
            $_SESSION['error'] = "Incorrect password";
        }
    }
}
// Fall through into the View
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="login.css" >
</head>
<body>
<form method="post" action="" class="login">
    <p class="title">Notebook</p>

    <p>
        <label for="login">Логин:</label>
        <input type="text" name="email" id="login" value="">
    </p>

    <p>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
        <button type="submit" class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p>
</form>
</body>
</html>
