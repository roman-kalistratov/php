<?php

require_once '../config/db.php';

// get all data
function fetchData($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// insert data
function insertData($pdo, $data) {
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$data['value1'],$data['value2']]);
}