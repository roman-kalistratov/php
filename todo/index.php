<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="form-area">
                <form id="taskForm">
                    <h1>To-Do List</h1>
                    <input type="text" name="task" id="taskInput" placeholder="Enter a new task" require>
                    <button type="submit">Add Task</button>
                </form>
            </div>

            <div class="tasks-area">
                <h2>Tasks</h2>
                <ul id="taskList"></ul>
            </div>
        </div>
    </div>
</body>

</html>