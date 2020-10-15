<?php
session_start();
require_once "connection.php";

?>
<!DOCTYPE html>

<html>

<head>
  <title>Company Name</title>
  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Main CSS-->
  <link href="css/main.css" rel="stylesheet" media="all">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/styleindex.css">
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <link rel="stylesheet" type="text/css" href="css/styletasks.css">


</head>

<body>

  <header>


    <nav>
      <?php

      if (isset($_SESSION['empEmail'])) {
        $email = $_SESSION['empEmail'];
        $query = "SELECT * 
                  FROM `employees`
                  WHERE `email`='$email'";

        $result = $conn->query($query);
        $row = $result->fetch_assoc();

      ?>
        <h1>
          <img class="rounded-circle" src="<?php echo $row['pic']; ?>" width="35px" height="35px">
          <?php echo $row['name']; ?>
        </h1>
      <?php


      } else {

      ?>
        <h1>Company Name</h1>

      <?php
      }

      ?>
      <ul id="navli">

        <?php
        if (isset($_SESSION['empEmail'])) {


        ?>

          <li><a class="homered" href="myTasks.php">My Tasks</a></li>
          <li><a class="homeblack" href="chat.php">Chat</a></li>
          <li><a class="homeblack" href="myProfile.php">Profile</a></li>
          <li><a class="homeblack" href="logout.php">Logout</a></li>


        <?php

        } elseif (isset($_SESSION['admEmail'])) {

        ?>


          <li><a class="homeblack" href="allTasks.php">All Tasks</a></li>
          <li><a class="homeblack" href="viewEmployees.php">View Employees</a></li>
          <li><a class="homeblack" href="logout.php">Logout</a></li>


        <?php

        } else {

        ?>

          <li><a class="homered" href="index.php">HOME</a></li>
          <li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
          <li><a class="homeblack" href="admLogin.php">Admin Login</a></li>

        <?php
        };

        ?>




      </ul>
    </nav>
  </header>

  <div class="divider"></div>