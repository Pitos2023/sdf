<?php

include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($new_password === $confirm_password) {

        $sql = "SELECT * FROM account WHERE reset_token='$token'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $user = $result->fetch_assoc();
            $user_id = $user['user_id'];

            
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_sql = "UPDATE account SET password='$hashed_password', reset_token=NULL WHERE user_id=$user_id";
            $update_result = $conn->query($update_sql);

            if ($update_result) {
                echo "<div class='container'><p style='background:#B1C9EF; position: relative; width: 35%; padding: 30px; border-radius: 10px; text-align:center; '>Password updated successfully. <a href='login.php'>Click here to go back to Log-In</a>";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            echo "<div class='container'><p style='background:#B1C9EF; position: relative; width: 35%; padding: 30px; border-radius: 10px; text-align:center; '>Invalid or expired token <a href='forgotpass.php'>Click here to go back<a>";
        }
    } else {
        echo "Passwords do not match";
    }

    $conn->close();
}
?>
