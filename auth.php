<?php
# Соединямся с БД
$link = mysqli_connect('localhost','root', 'root', 'Notebook', 8889, "/Applications/MAMP/tmp/mysql/mysql.sock");

if(isset($_POST['submit'])) {
    $err = array();

    # проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link,"SELECT COUNT(user_id) FROM users WHERE email='".mysqli_real_escape_string($_POST['email'])."'");

    if(mysqli_num_fields($query) > 0){
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    # Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0){
        $email = $_POST['email'];
        # Делаем двойное шифрование
        $password = md5(md5($_POST['password']));
        mysqli_query($link,"INSERT INTO users SET  email='".$email."', password='".$password."', firstname='".$firstname."', surname='".surname."'");
        header("Location: login.php");
        exit();
    }

    else{
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error) {
            print $error."<br>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="auth.css" >
    <script src="auth.js"></script>
</head>
<body>
<div class="title">Notebook</div>
<form method="post" action="" class="form">

    <div class="form__field">
        <input type="text" name="first_name" id="first_name" value="" placeholder="First name">
    </div>

    <div class="form__field">
        <input type="text" name="surname" id="surname" value="" placeholder="Surname">
    </div>

    <div class="form__field">
        <input type="email" name="email" id="email" placeholder="E-Mail" required />
        <span class="form__error"> This field must contain a valid email address (for example example@site.com)</span>
    </div>

    <div class="form__field">
        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required />
        <span class="form__error">Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters</span>
    </div>

    <div class="form__field">
        <input type="password" name="confirm" id="confirm" placeholder="Confirm a password" onkeyup='check();' required/>
        <span id="matching"></span>
    </div>

    <button type="submit" class="register-button">Register</button>
</form>
</body>
</html>

