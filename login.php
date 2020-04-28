<?php
require( dirname( __FILE__ ) . '/db.php');

if (isset ($_GET['login'])) { $login = $_GET['login']; unset($login); }
if (isset ($_GET['password'])) { $password = $_GET['password']; unset($password); }

if (isset ($_POST['login'])) { $login = $_POST['login']; }
if (isset ($_POST['password'])) { $password = $_POST['password']; }


if ($_POST['submit']) {
    if (isset($login) and isset($password)) {
        $query = mysqli_query($db, "SELECT * FROM users WHERE user_login='$login' AND user_password='$password'");
        $result = mysqli_fetch_array($query);

        if ($result != "") {
            if ($login == $result['user_login'] AND $password == $result['user_password']) {
                session_start([
                    'cookie_lifetime' => 86400,
                ]);
                $_SESSION['login'] = $result['user_login'];
                header("Location: /");
                exit;
            } else {
                header("Location: login");
                exit;
            }
        } else {
            header("Location: login");
            exit;
        }
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>K-Telecom Test - Viktorov</title>
</head>
<body>
<div class="container mt-5">
    <form method="post">
        <h3>Авторизация:</h3>
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Войти" name="submit">
    </form>
</div>