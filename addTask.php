<?php 
require_once "inc/header.php"; 
require_once "connection.php";
if(isset($_SESSION['admEmail'])){
//select all employees
$query = "SELECT * FROM `employees`";
$result = $conn->query($query);
?>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title text-center mb-4">Project Info</h2>
                    <form action="handlers/handleAddTask.php" method="POST" >

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
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="emp_id">
                                    <option disabled="disabled" selected="selected">Select employee</option>
                                    <?php
                                        if($result->num_rows>0){
                                            while($row=$result->fetch_assoc()){
                                                ?>
                                                    <option value="<?PHP echo $row['id'];?>"><?PHP echo $row['name'];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project name" name="task_name">
                        </div>

                        <div class="form-group">
                            <label style="color: #666;" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>

                       
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="status">
                                    <option disabled="disabled" selected="selected">Task status</option>
                                    <option value="in process">in process</option>
                                    <option value="completed">completed</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" style="color: #666;" type="date" placeholder="Deadline" name="deadline">
                        </div>
                                          

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php 
require_once "inc/footer.php";
}else{
    header('location: admLogin.php');
} 
?>

