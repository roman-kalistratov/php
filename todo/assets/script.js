$(function () {
  loadTasks();

  $("#taskForm").on("submit", function (e) {
    e.preventDefault();

    const task = $("#taskInput").val();

    $.ajax({
      url: "./ajax/process.php",
      type: "POST",
      data: { action: "add", task: task },
      success: function (res) {
        $("#taskForm").trigger("reset"); // Очистить поле ввода
        loadTasks();
      },
    });
  });

  //get all tasks
  function loadTasks() {
    $.ajax({
      url: "./ajax/process.php",
      type: "POST",
      data: { action: "getAll" },
      success: function (res) {
        $("#taskList").html(res);
      },
    });
  }

  // delete task
  $("#taskList").on("click", ".delete", function () {
    const taskId = $(this).data("id");

    $.ajax({
      url: "./ajax/process.php",
      type: "POST",
      data: { action: "delete", id: taskId },
      success: function () {
        loadTasks();
      },
    });
  });

  //   update task
  $("#taskList").on("click", ".edit", function () {
    const taskId = $(this).data("id");
    const taskText = $(this).siblings(".task-text");
    const currentTask = taskText.text();

    const newTask = prompt("Edit the task:", currentTask);
    if (newTask !== null && newTask.trim() !== "") {
      $.ajax({
        url: "./ajax/process.php",
        type: "POST",
        data: { action: "update", id: taskId, task: newTask },
        success: function () {
          loadTasks();
        },
      });
    }
  });
});
