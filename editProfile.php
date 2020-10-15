<?php
session_start();
require_once "connection.php";

//get emp_id
$emp_id = $_GET['emp_id'];

//get emp data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];


//get pic data ---> from W3School

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


//clean data
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


//validate picture ---> from W3School

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["pic"]["tmp_name"]);
  if($check == false) {

    $errors['pic'] = "the file is not an image";
    $is_valid = false;
  }  

// Check if file already exists
if (file_exists($target_file)) {
    $errors['pic'] = "Sorry, file already exists.";
    $is_valid = false;
}

// Check file size
if ($_FILES["pic"]["size"] > 500000) {
    $errors['pic'] = "Sorry, your file is too large.";
    $is_valid = false;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errors['pic'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $is_valid = false;
}


  

// store errors 
$_SESSION['errors'] = $errors;
if(isset($_SESSION['errors'])):
    header('location: myProfile.php');
endif;

if($is_valid === true):

    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    $query = "UPDATE `employees` 
    SET `name`='$name',
    `name`='$name',
    `email`='$email',
    `password`='$password',
    `phone`='$phone',
    `city`='$city',
    `gender`='$gender',
    `birthday`='$birthday',
    `pic` = '$target_file'
    WHERE id=$emp_id";

    if ($conn->query($query) === TRUE) {
        $_SESSION['empEmail'] = $email;
        header('location: myProfile.php');
    } else {
      echo "Error updating record: " . $conn->error;
      header('location: myProfile.php');

    }
    
    $conn->close();
endif;
