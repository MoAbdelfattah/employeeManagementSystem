<?php require_once "inc/header.php"; ?>



<div class="loginbox">


    
    <?php 
        if(isset($_SESSION['errors'])):
            foreach($_SESSION['errors'] as $error):
            ?>

                <div class="alert alert-danger">
                    <?php echo $error ; ?>
                </div>

            <?php
            endforeach;
        endif;    
        
        session_unset();
    ?>



    <img src="assets/admin.png" class="avatar">
        <h1>Login Here</h1>
        <form action="handlers/handleAdmLogin.php" method="POST">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email Address">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login-submit" value="Login">
        </form>   
</div>

<?php require_once "inc/footer.php"; ?>

