<?php
session_start();
include 'dbconn.php';

// Check if the user is not logged in, redirect to the user login page
if (!isset($_SESSION['user']) || $_SESSION['user'] !== true) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM account";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
                <h1>Hello User <?php echo $_SERVER['PHP_SELF']; ?></h1>

            <form action="user_add_task.php" method="POST">
                <input type="text" name="add_task" id="add_task" placeholder="Enter Your Task">
                <input type="date" name="due_date" id="due_date">
                <button type="submit" name="addTask">Add Task</button>
            </form><br>

        <form action="user_logout.php">
        <button type="submit">Log Out</button>
        </form><br>

        <h1>Your Lists</h1>
        <div id="lists">
        <table class="table table-dark table-hover" border="1">
  <thead>
    <tr>
      <th scope="col" name="id">No.</th>
      <th scope="col">To Do</th>
      <th>Due Date</th>
      <th>Overdue Tasks</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include 'dbconn.php';
        $sql="SELECT * FROM todo_list";
        $result=mysqli_query($conn, $sql);

        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $add_task=$row['add_task'];
                $due_Date=$row['due_date'];

                $currentDate = date("Y-m-d");
                $isOverdue = ($currentDate > $due_Date);

                ?>
                <tr <?php echo ($isOverdue ? ' style="color: red;"' : ''); ?>>
                    <td><?php echo $id ?></td>
                    <td><?php echo $add_task ?></td>
                    <td><?php echo $due_Date ?></td>
                    <td><?php if ($isOverdue) {echo "<li style='color: red;'>$add_task - Due: $due_Date";}?></td>
                    <td>
                      <a class="btn btn-success btn-sm" href="user_edit_task.php?id=<?php echo $id; ?>" role="button">Edit</a>
                      <td><a href="user_edit_and_delete_action.php?delete_id=<?php echo $id; ?>" role="button">Delete</a></td>
                        </tr>
                    </td>
                </tr>
                <?php
            }
        }
    ?>
  </tbody>
</table>

</body>
</html>
