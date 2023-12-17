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

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $email = $_POST['email'];

           $check_email_sql = "SELECT * FROM account WHERE email='$email'";
           $check_email_result = $conn->query($check_email_sql);

           if ($check_email_result->num_rows > 0) {
               // Email exists, proceed with password reset
               $token = bin2hex(random_bytes(32));

               $sql = "UPDATE account SET reset_token='$token' WHERE email='$email'";
               $result = $conn->query($sql);

               if ($result) {
                  echo "<div class='container'><p style='background:#B1C9EF; position: relative; width: 35%; padding: 30px; border-radius: 10px; text-align:center; '>Verified successfully for $email. <a href='resetpass.php?token=$token' style='text-decoration: none;'> Proceed here to reset your password.</a></p></div>";
               } else {
                  echo "<div class='container'><p>Error updating token: " . $conn->error . "</p></div>";
               }
           } else {
               echo "<div class='container'><p style='background:#B1C9EF; position: relative; width: 35%; padding: 30px; border-radius: 10px; text-align:center; '>Email not found in the database. Please enter a valid email. <a href='forgotpass.php'>Click here to try again.</a></p></div>";
           }
       }

       $conn->close();
   ?>
   </body>
</html>


