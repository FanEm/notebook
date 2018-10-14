<?php
session_start();
if (isset($_POST['cancel'])) {
    header('Location: login.php');
    return;
}

# Соединямся с БД
$link = mysqli_connect('localhost','root', 'root', 'Notebook', 8889, "/Applications/MAMP/tmp/mysql/mysql.sock");
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST['submit'])) {
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT user_id, password FROM users WHERE email='".($_POST['email'])."' LIMIT 1";

    $query = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($query);

    # Соавниваем пароли
    if($data['password'] === md5(md5($password)) && $data['email'] === $email) {
        $_SESSION['email'] = htmlentities($email);
        header("Location: index.php");
        return;
    } else {
        $_SESSION['error'] = "Incorrect password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" type="text/css" href="login.css" >
</head>
<body>
<div class="title">Notebook</div>
<form method="post" action="" class="form">
    <div class="form__field">
        <input type="email" name="email" id="email" placeholder="Email" required />
        <span class="form__error"> This field must contain a valid email address (for example example@site.com)</span>
    </div>

    <div class="form__field">
        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required />
        <span class="form__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters</span>

    </div>

    <button type="submit" class="login-button">Sign in</button>

    <div class="forgot-password">
        <a href="..">Forgot password?</a>
    </div>
</form>
</body>
</html>