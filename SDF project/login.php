<!DOCTYPE html>
   <html>
    <head>
        <title>Log In</title>
        
		<link rel="stylesheet" href="style.css">
    <link rel ="icon" href="logo2.jpg" type="image/x-icon">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
              <form action="login_action.php" class="login-form" method="POST">
                <h1>Log In</h1>
				<?php if (isset($_GET['error']) ): ?>
				<p style="color:#D21404";><?= $_GET['error']; ?></p>
				<?php endif ?>
                <input type="text" name="email" id="email" placeholder="Email"/>
                <input type="password" name="password" id="password" placeholder="Password"/>
                <button>login</button>
				<b class="message"><a href="forgotpass.php">Forgot Password</a></b>
                <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                <p class="message">Log-in here if you are an <a href="admin/admin_log-in.php"> Admin</a></p>
              </form>
            </div>
          </div>
          <script src="script.js"></script>
    </body>
   </html> 