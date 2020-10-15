<?php 
require_once "inc/header.php";
require_once "connection.php";
if(isset($_SESSION['admEmail'])){

$query = "SELECT * FROM `employees`";
$result = $conn->query($query);
?>

    <h2 class="task_title" >Employee Leaderboard</h2>
    <h3 class="task_title"><a class="btn btn-info m-3" href="addEmployee.php">Add New Employee</a></h3>
    

		<table>
            <tr bgcolor="#000"> 
                <th align = "center">Emp_ID</th>
                <th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Phone</th>
                <th align = "center">City</th>
                <th align = "center">Gender</th>
                <th align = "center">Birthday</th>
                <th align = "center">Actions</th>
                
			</tr>


            <?php

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){

                        ?>

                        <tr>

                                <td><?php echo $row['id'];  ?></td>
                                <td><img class="rounded-circle" src="<?php echo $row['pic'];  ?>" width="80px" height="80px"></td>
                                <td><?php echo $row['name'];  ?></td>
                                <td><?php echo $row['email'];  ?></td>
                                <td><?php echo $row['phone'];  ?></td>
                                <td><?php echo $row['city'];  ?></td>
                                <td><?php echo $row['gender'];  ?></td>
                                <td><?php echo $row['birthday'];  ?></td>
                                <td>
                                    <a class="btn btn-danger" href="actions/deleteEmployee.php?emp_id=<?php echo $row['id']; ?>">Delete</a>
                                </td>


                        </tr>

                        <?php

                    }
                }


            ?>
            

		</table>

    <?php 
    }else{
        header('location: admLogin.php');
    }
    require_once "inc/footer.php"; 
    ?>