<?php
include 'dbconn.php';

if (isset($_POST['updateTask'])) {
    $id = $_POST['id'];
    $newTask = $_POST['newTask'];

    $sql = "UPDATE todo_list SET add_task = '$newTask' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: user_dashboard.php");
    } else {
        echo "Error: " . mysqli_error($conn); 
    }
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM todo_list WHERE id = $delete_id";
    $delete_result = mysqli_query($conn, $delete_sql);

    if ($delete_result) {
        header("Location: user_dashboard.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>