<?php 
require_once "inc/header.php";
require_once "connection.php";
$task_id = $_GET['task_id'];

//select all employees
$query2 = "SELECT * FROM `employees`";
$result2 = $conn->query($query2);

//select a certain task
$query = "SELECT * FROM `tasks`
WHERE `task_id` = $task_id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

?>


    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Assign Project</h2>
                    <form action="handlers/handleAssignTask.php?task_id=<?php echo $task_id; ?>" method="POST" enctype="multipart/form-data">

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
                                    <?php
                                        if($result2->num_rows>0){
                                            while($row2=$result2->fetch_assoc()){
                                                ?>
                                                    <option <?php if($row['emp_id']==$row2['id']){?> selected <?php } ?> value="<?PHP echo $row2['id'];?>"><?PHP echo $row2['name'];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" value="<?PHP echo $row['task_name'];?>" name="task_name">
                        </div>

                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" value="<?PHP echo $row['deadline'];?>" name="deadline">
                                   
                                </div>
                            </div>                        
                        </div>
                        
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Assign Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php require_once "inc/footer.php"; ?>