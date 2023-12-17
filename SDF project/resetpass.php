<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="fp.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="form">
    <h2>Reset Password</h2>
    <form action="resetpass_action.php" method="POST">
        <label for="password">New Password:</label>
        <input type="password" name="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : 'default_value'; ?>">
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
