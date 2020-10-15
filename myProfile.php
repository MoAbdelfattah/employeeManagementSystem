<?php
require_once "inc/header.php";
require_once "connection.php";
if(isset($_SESSION['empEmail'])){


if (isset($_SESSION['empEmail'])) {
    $email = $_SESSION['empEmail'];
}

$query = "SELECT * FROM `employees` WHERE `email` = '$email'";
$result = $conn->query($query);
$row = $result->fetch_assoc();


?>


<!-- <form id = "registration" action="edit.php" method="POST"> -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">

                <form method="POST" action="editProfile.php?emp_id=<?php echo $row['id']; ?>" enctype="multipart/form-data">


                    <?php
                    if (isset($_SESSION['errors'])) {
                        foreach ($_SESSION['errors'] as $error) {
                    ?>

                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>

                    <?php
                        };
                    };
                        
                    ?>


                    <div class="text-center ">
                        <h2 class="title">My Info</h2>
                    </div>

                    <div class="input-group ">
                        <img class="title rounded-circle" src="<?php echo $row['pic']; ?>" width="100px" height="100px">
                    </div>

                    <div class="input-group">
                        <p>Name</p>
                        <input class="input--style-1" type="text" name="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="input-group">
                        <p>Email</p>
                        <input class="input--style-1" type="text" name="email" value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="input-group">
                        <p>Password</p>
                        <input class="input--style-1" style="color: #666;" type="password" name="password" value="<?php echo $row['password']; ?>">
                    </div>

                    <div class="row row-space">
                        <div class="col-5">
                            <div class="input-group">
                                <p>City</p>
                                <input class="input--style-1" type="text" name="city" value="<?php echo $row['city']; ?>">

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <p>Gender</p>
                                <input class="input--style-1" type="text" name="gender" value="<?php echo $row['gender']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <p>Phone Number</p>
                        <input class="input--style-1" type="number" name="phone" value="<?php echo $row['phone']; ?>">
                    </div>


                    <div class="input-group">
                        <p>Birthday</p>
                        <input class="input--style-1" type="date" name="birthday" value="<?php echo $row['birthday']; ?>">
                    </div>

                    <div class="input-group">
                        <p>Picture</p>
                        <input class="input--style-1" type="file" name="pic">
                    </div>



                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" name="send">Update Info</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
}else{
    header('location:empLogin.php');
}
require_once "inc/footer.php"; 
?>