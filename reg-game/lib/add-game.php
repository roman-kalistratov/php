<?php
$image = trim($_POST['image']);
$followers = trim($_POST['followers']);

require "db.php";

//SQL
$sql = 'INSERT INTO trending(image, followers) VALUES(?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$image, $followers]);

header('Location: /trending.php');