<?php
session_start();
require_once "../connection.php";

//getting task_id
$task_id = $_GET['task_id'];

//delete task
$query = "DELETE FROM `tasks` WHERE `task_id` = $task_id";

if ($conn->query($query) === TRUE) {
    header("location: ../allTasks.php");
} else {
    header("location: ../allTasks.php");
}
