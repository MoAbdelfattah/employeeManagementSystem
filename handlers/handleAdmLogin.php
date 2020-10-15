<?php   
session_start();
require_once "../connection.php";
// getting data from Login Form
$email = $_POST['email'];
$password = $_POST['password'];

// clean data

function cleanData($input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}

$email = cleanData($email);
$password = cleanData($password);

// attempt data

$query = " SELECT *
FROM `admins`
WHERE `email`='$email'
AND `password` ='$password'";

$result = $conn->query($query);

// validate data
$errors=[''];
$is_valid = true;

// validate attempt
if($result->num_rows == 0 && !empty($email) && !empty($password)):
    $errors['data'] = "Please Enter Valid Data";
    $is_valid = false;

endif;

// validate email
if(empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL)):
    $errors['email'] = "Please Enter Valid Email";
    $is_valid = false;

endif;


// validate passwor
// $pattern = "";
// if(empty($password) || !preg_match($pattern, $password)):

if(empty($password)):
    $errors['password'] = "Please Enter Valid password";
    $is_valid = false;

endif;

// store errors 
$_SESSION['errors'] = $errors;
if(isset($_SESSION['errors'])):
    header('location: ../admLogin.php');
endif;

if($is_valid === true && $result->num_rows>0):
    $_SESSION['admEmail'] = $email;
    $_SESSION['admPassword'] = $password;

    header("location: ../allTasks.php");

endif;

