<!DOCTYPE html>
   <html>
    <head>
        <title>Log In</title>
		<link rel="stylesheet" href="style.css">
        <link rel ="icon" href="logo2.jpg" type="image/x-icon">
        <style>
            body {
                margin:0;
                padding:0;
            }

        </style>
    </head>
    <body>

<?php
    include 'dbconn.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];

    if ($password !== $retype_password) {
        echo "<p style='font-size: 24px; color: #D5DEEF; position:absolute; top:50%; left:50%;transform: translate(-50%,50%);'>Error: Passwords do not match.  <a href=register.php>Click here to go back and register again</a>";
        exit();
    }

    $check_query = "SELECT * FROM account WHERE username='$username' OR email='$email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "<p style='font-size: 24px; color: #D5DEEF; position:absolute; top:50%; left:50%;transform: translate(-50%,50%);'>Error: Username or email already exists. <b><a href ='register.php'>Click here to register again.</a></b></p>";
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: succesful_registered.php?username=$username");
        exit();
    } else {
        echo "Error " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>


