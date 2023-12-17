<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="fp.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="form">
    <h2>Forgot Password</h2>
    <form action="forgotpass_action.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send Reset Link</button>
    </form>
    </div>
</body>
</html>
