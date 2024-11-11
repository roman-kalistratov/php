<?php

$host = 'localhost';
$dbname = 'pdo';
$username = "root";
$password = '';

try {
    // Создаем новое PDO подключение
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=3306", $username, $password);
    
    // Настройка режима ошибок для PDO (исключения)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection success!";
    
    // Возвращаем объект PDO для дальнейшего использования
    return $pdo;
} catch (PDOException $e) {
    // Обрабатываем ошибку подключения
    echo "Connection error: " . $e->getMessage();
    return null;
}