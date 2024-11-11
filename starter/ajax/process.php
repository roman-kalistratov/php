<?php
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    if (!empty($_POST['value1']) && !empty($_POST['value2'])) {
        insertData($pdo, $_POST);
        $data = fetchData($pdo);       
      
        foreach ($data as $row) {
            echo "<p>{$row['name']} - {$row['email']}</p>";
        }
    } else {
        echo "Please fill in all fields of the form.";
    }
}


?>