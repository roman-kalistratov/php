<?php 
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['action'] === 'add'){
        $task = trim($_POST['task']);
        if(!empty($task)){
            addTask($pdo, $task);
        }       
    }elseif($_POST['action'] === 'delete'){
        $id = intval($_POST['id']);
        deleteTask($pdo, $id);
    }elseif($_POST['action'] === 'update'){
        $id = intval($_POST['id']);
        $newTask = trim($_POST['task']);
        if (!empty($newTask)) {
            updateTask($pdo, $id, $newTask);
        }
    }elseif($_POST['action'] === 'getAll') {
        $tasks = getTasks($pdo);
        foreach ($tasks as $task) {
            echo "<li data-id='{$task['id']}'>
                    <span class='task-text'>{$task['task']}</span> 
                    <button class='edit' data-id='{$task['id']}'>Edit</button>
                    <button class='delete' data-id='{$task['id']}'>Delete</button>
                  </li>";
        }
        
    }
}