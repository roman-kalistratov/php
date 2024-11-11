<?php
    $login = trim(filter_var($_POST['login']), FILTER_SANITIZE_SPECIAL_CHARS);    
    $password = trim(filter_var($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);    

    // Password hash
    $salt = 'askfg()q553*^&asklfj';
    $password = md5($salt.$password);

    // DB connect
    require "db.php";
    
    $sql = 'SELECT id FROM users WHERE login = ? AND password = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$login, $password]);

    if($query->rowCount() == 0)
        echo "User not found";
    else {
        setcookie('login', $login, time() + 3600 * 24 * 30, "/");        
        header('Location: /user.php');
    } 