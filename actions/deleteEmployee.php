<?php
session_start();
require_once "../connection.php";

//getting emp_id
$emp_id = $_GET['emp_id'];

//delete employee
$query = "DELETE FROM `employees` WHERE `id` = $emp_id";

if ($conn->query($query) === TRUE) {
    header("location: ../viewEmployees.php");
} else {
    header("location: ../viewEmployees.php");
}
