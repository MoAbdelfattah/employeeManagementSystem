<?php
require_once "../connection.php";

//getting task id
$task_id = $_GET['task_id'];
$query = "UPDATE `tasks`
SET `status` = 'completed'
WHERE `task_id` = $task_id ";

if($conn->query($query) === true){
    header('location: ../myTasks.php');
}else{

    ?>
        <div class="alert alert-danger">
            <?php     
                echo "Error updating record: " . $conn->error;
            ?>
        </div>

<?php
};
$conn->close();
?>