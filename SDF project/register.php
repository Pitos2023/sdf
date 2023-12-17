<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
        <link rel ="icon" href="logo2.jpg" type="image/x-icon">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
              <form action="register_action.php" method="POST">
                <h1>Register</h1>
                <input type="text" name="username" placeholder="Username" required/>
                <input type="text" name="email" placeholder="Email Address" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="password" name="retype_password" placeholder="Re-type Password" required/>
                <button>create</button>
                <p class="message">Already registered? <a href="login.php">Sign In</a></p>
              </form>
            </div>
        </div>
    </body>
</html>