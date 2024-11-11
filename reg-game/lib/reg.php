<?php
$login = trim(filter_var($_POST['login']), FILTER_SANITIZE_SPECIAL_CHARS);
$username = trim(filter_var($_POST['username']), FILTER_SANITIZE_SPECIAL_CHARS);
$email = trim(filter_var($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
$password = trim(filter_var($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

if (strlen($login) < 4) {
    echo "Login error";
    exit;
}

// Password hash
$salt = 'askfg()q553*^&asklfj';
$password = md5($salt . $password);

// DB connect
require "db.php";

//INSERTT DATA
$sql = 'INSERT INTO users(login, username, email, password) VALUES (?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$login, $username, $email, $password]);

header('Location: /');