<?php
require_once "inc/header.php";
require_once "connection.php";
if(isset($_SESSION['empEmail'])){
$email = $_SESSION['empEmail'];

//select employee data
$query2 = "SELECT `id` 
FROM `employees` 
WHERE `email`='$email'";

$result2 = $conn->query($query2);
$row2 = $result2->fetch_assoc();

$emp_id = $row2['id'];

//select task data
$query = "SELECT *
FROM `tasks`
WHERE `emp_id`= $emp_id ";
$result = $conn->query($query);



?>


<h2 class="task_title">Empolyee Leaderboard</h2>


<table>

    <tr bgcolor="#000">
        <th align="center">task_id</th>
        <th align="center">emp_id</th>
        <th align="center">task_name</th>
        <th align="center">description</th>
        <th align="center">status</th>
        <th align="center">deadline</th>
        <th align="center">Action</th>



    </tr>


    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>

            <tr>
                <td> <?php echo $row['task_id']; ?></td>
                <td><?php echo $row['emp_id']; ?></td>
                <td><?php echo $row['task_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td>
                    <?php

                    if ($row['status'] == 'in process') {

                    ?>
                        <a class="btn btn-primary" href="actions/doneTask.php?task_id=<?php echo $row['task_id']; ?>">DONE</a>

                    <?php
                    } elseif ($row['status'] == 'completed') {
                    ?>

                        <a class="btn btn-danger" href="actions/backTask.php?task_id=<?php echo $row['task_id']; ?>">BACK</a>

                    <?php
                    }
                    ?>

                </td>

            </tr>
    <?php
        }
    }
    ?>





</table>

<?php 
}else{
    header('location:empLogin.php');
}
require_once "inc/footer.php"; 
?>