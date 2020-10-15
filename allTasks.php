<?php 
require_once "inc/header.php";
require_once "connection.php"; 
?>

    

    <h2 class="task_title" >Tasks Leaderboard</h2>
    <h3 class="task_title"><a class="btn btn-info m-3" href="addTask.php">Add New Task</a></h3>
    
    <?php
        //select all tasks
        $query = "SELECT * FROM `tasks` JOIN `employees`
        ON tasks.emp_id = employees.id ";
        $result = $conn->query($query);

    ?>
      
    <table>

			<tr bgcolor="#000">
				<th align = "center">task_id</th>
                <th align = "center">emp_id</th>
                <th align = "center">emp_name</th>
				<th align = "center">task_name</th>
                <th align = "center">description</th>
                <th align = "center">status</th>
                <th align = "center">deadline</th>
                <th align = "center">actions</th>


				
            </tr>
            
            <?php
                if($result->num_rows>0)
                {
                    while ($row=$result->fetch_assoc())
                    {
                        ?>
                            <tr>
                                <td><?php echo $row['task_id']; ?></td>
                                <td><?php echo $row['emp_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['task_name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['deadline']; ?></td>
                                <td>
                                    <a class="btn btn-success" href="editTask.php?task_id=<?php echo $row['task_id']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="actions/deleteTask.php?task_id=<?php echo $row['task_id']; ?>">Delete</a>
                                    <a class="btn btn-primary" href="assignTask.php?task_id=<?php echo $row['task_id']; ?>">Assign to</a>

                                </td>
                            </tr>
                        <?php
                    }
                }
            ?>
            
            

	</table>

  <?php require_once "inc/footer.php"; ?>


