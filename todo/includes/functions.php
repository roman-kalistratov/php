<?php 
require_once '../config/db.php';

// add new task
function addTask($pdo, $task) {    
    $sql = "INSERT INTO tasks(task) VALUE (?)";
    $query = $pdo->prepare($sql);
    $query->execute([$task]);
}

//delete task
function deleteTask($pdo, $id){
    $sql="DELETE from tasks WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
}

// update task
function updateTask($pdo, $id, $newTask) {
    $sql="UPDATE tasks SET task = ? WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$newTask,$id]);
   
}

// get all tasks
function getTasks($pdo) {
    $sql = "SELECT * from tasks";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}