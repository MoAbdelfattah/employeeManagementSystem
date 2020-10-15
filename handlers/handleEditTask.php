<?php
session_start();
require_once "../connection.php";
if(isset($_SESSION['admEmail'])){


//getting task_id
$task_id = $_GET['task_id'];

// getting task data
$emp_id = $_POST['emp_id'];
$task_name = $_POST['task_name'];
$description = $_POST['description'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];


// clean data

function cleanData($input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}

$emp_id = cleanData($emp_id);
$task_name = cleanData($task_name);
$description = cleanData($description);
$status = cleanData($status);
$deadline = cleanData($deadline);


// validate data
$errors = [''];
$is_valid = true;

//validate emp_id
if (empty($emp_id) || !filter_var($emp_id, FILTER_VALIDATE_INT)) :
    $errors['emp_id'] = "Please Enter Valid emp_id";
    $is_valid = false;

endif;

// validate task_name
if (empty($task_name) || !filter_var($task_name, FILTER_SANITIZE_STRING)) :
    $errors['task_name'] = "Please Enter Valid task_name";
    $is_valid = false;

endif;


// validate description
if (empty($description) || !filter_var($description, FILTER_SANITIZE_STRING)) :
    $errors['description'] = "Please Enter Valid description";
    $is_valid = false;

endif;


// validate status
if (empty($status) || !filter_var($status, FILTER_SANITIZE_STRING)) :
    $errors['status'] = "Please Enter Valid status";
    $is_valid = false;

endif;

// validate deadline
// $pattern = "";
// if(empty($deadline) || !preg_match($pattern, $deadline)):
if (empty($deadline)) :
    $errors['deadline'] = "Please Enter Valid deadline";
    $is_valid = false;

endif;




// store errors 
$_SESSION['errors'] = $errors;
if (isset($_SESSION['errors'])) :
    header("location: ../editTask.php?task_id=$task_id");
endif;

if ($is_valid === true) :

    //update data in DB
    $query = "UPDATE `tasks` SET
    `emp_id`=$emp_id,
    `task_name`='$task_name',
    `description`='$description',
    `status`='$status',
    `deadline`='$deadline' WHERE task_id = $task_id";

    if ($conn->query($query) === TRUE) {
        header("location: ../allTasks.php");
    } else {
        header("location: ../editTask.php?task_id=$task_id");
    }


endif;

}else{
    header('location: admLogin.php');
}