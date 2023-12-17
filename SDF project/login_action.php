<?php
session_start();
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and validate user's input
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM account WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($password == $row['password']){
            $_SESSION['user'] = true;
            header("Location: user_dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=Invalid credentials");
            exit();
        }
    } else {
        header("Location: login.php?error=Invalid credentials");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
?>