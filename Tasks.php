<?php
session_start();
if (isset($_SESSION['taskList'])) {
    $taskList = $_SESSION['taskList'];
} else {
    $taskList = [];
}
if (isset($_POST['addTask'])) {
    $newTask = [
        'task' => $_POST['taskName'],
        'assignedTo' => $_POST['assignedTo'],
        'dueDate' => $_POST['dueDate'],
        'completed' => false,
    ];
    $taskList[] = $newTask;
    $_SESSION['taskList'] = $taskList;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>
<body>
    <h1>Task List</h1>
    <ul id="taskList">
        <?php
        foreach ($taskList as $index => $task) {
            $taskId = 'task_' . $index;
            echo '<li>';
            echo '<input type="checkbox" id="' . $taskId . '" name="taskCompleted[]" value="' . $index . '" ';
            if ($task['completed']) {
                echo 'checked ';
            }
            echo '>';
            echo '<label for="' . $taskId . '">' . $task['task'] . '</label>';
            echo '<br>';
            echo 'Assigned to: ' . $task['assignedTo'] . '<br>';
            echo 'Due Date: ' . $task['dueDate'];
            echo '</li>';
        }
        ?>
    </ul>
    <h2>Add Task</h2>
    <form action="Tasks.php" method="post">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required><br>
        <label for="assignedTo">Assigned To:</label>
        <input type="text" id="assignedTo" name="assignedTo" required><br>       
        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="dueDate" required><br>       
        <button type="submit" name="addTask">Add Task</button>
    </form>
	<form action="Invitations.php" method="post">
		<button type="submit" name="invitations">Invitations</button>
	</form>
    <script>
        const taskList = document.getElementById("taskList");
        taskList.addEventListener("change", function (event) {
            if (event.target && event.target.name === "taskCompleted[]") {
                const taskIndex = event.target.value;
                document.getElementById("addTaskForm").submit();
            }
        });
    </script>
</body>
</html>
