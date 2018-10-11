<?php // Do not put any HTML above this line

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['login']) && isset($_POST['password']) ) {
    if ( strlen($_POST['login']) < 1 || strlen($_POST['password']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = strlen($_POST['login']) === 'test' && isset($_POST['password']) === 'test';
        if ( $check) {
            // Redirect the browser to add.php
            header("Location: index.html);
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}
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
        <input type="text" name="login" id="login" value="">
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