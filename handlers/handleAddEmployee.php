<?php
session_start();
require_once "../connection.php";
if(isset($_SESSION['admEmail'])){

// getting data from Login Form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];



// clean data

function cleanData($input)
{
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}

$name = cleanData($name);
$email = cleanData($email);
$password = cleanData($password);
$city = cleanData($city);
$gender = cleanData($gender);
$phone = cleanData($phone);
$birthday = cleanData($birthday);




// validate data
$errors=[''];
$is_valid = true;

// validate name
if(empty($name) || !filter_var($name , FILTER_SANITIZE_STRING)):
    $errors['name'] = "Please Enter Valid Name";
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

// validate city
if(empty($city) || !filter_var($city , FILTER_SANITIZE_STRING)):
    $errors['city'] = "Please Enter Valid City";
    $is_valid = false;

endif;



// validate gender
if(empty($gender) || !filter_var($gender , FILTER_SANITIZE_STRING)):
    $errors['gender'] = "Please Enter Valid Gender";
    $is_valid = false;

endif;

// validate phone
if(empty($phone) || !preg_match("/^(01)[0-9]{9}$/" , $phone)):
    $errors['phone'] = "Please Enter Valid Phone";
    $is_valid = false;

endif;

// validate birthday
// $pattern = "";
// if(empty($password) || !preg_match($pattern, $birthday)):
if(empty($birthday)):
    $errors['birthday'] = "Please Enter Valid Birthday";
    $is_valid = false;

endif;


// store errors 

$_SESSION['errors'] = $errors;
if (isset($_SESSION['errors'])) :
    header('location: ../addEmployee.php');
endif;

if ($is_valid===true):

    //insert in DB
    $query = "INSERT INTO `employees`(`name`, `email`, `password`, `city`, `gender`, `phone`, `birthday`) 
    VALUES ('$name','$email','$password','$city','$gender','$phone','$birthday')";

    if ($conn->query($query) === TRUE) {
        header("location: ../viewEmployees.php");
    } else {
        header("location: ../addEmployee.php");
    }


endif;
}else{
    header('location: admLogin.php');
}