<?php
include 'dbconn.php';

if (isset($_POST['addTask'])) {
    $add_task = $_POST['add_task'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO todo_list (add_task, due_date) VALUES ('$add_task', '$due_date')";

    if (mysqli_query($conn, $sql)) {
        header ('Location: user_dashboard.php');
        exit(); // Ensure that no further code is executed after the header
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$conn->close();
?>
