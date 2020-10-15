<?php 
require_once "inc/header.php"; 
if(isset($_SESSION['admEmail'])){
?>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title mb-5 text-center">Registration Info</h2>
                    <form action="handlers/handleAddEmployee.php" method="POST" >


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
        
                        ?>


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Name" name="name">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" style="color: #666;" type="password" placeholder="Password" name="password">
                        </div>

                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="City" name="city">
                                   
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Phone Number" name="phone" >
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="Birthday" name="birthday" >
                        </div>


                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

}else{
    header('location: admLogin.php');
}

require_once "inc/footer.php"; 

?>