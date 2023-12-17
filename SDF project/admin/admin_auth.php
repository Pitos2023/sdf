<?php
session_start();

include '../dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and validate admins input
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        //authenticate if admin
        $_SESSION['admin'] = true;
        header("Location: admin_page.php");
        exit();
    } else {
  
        header("Location: admin_log-in.php?error=Invalid credentials");
        exit();
    }
} else {

    header("Location: admin_log-in.php");
    exit();
}

// Close the database connection
$conn->close();
?>
