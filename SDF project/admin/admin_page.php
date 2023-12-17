<?php
session_start();

// Check if the user is not logged in as admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_log-in.php");
    exit();
}

include '../dbconn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin accounts from the database
$sql = "SELECT * FROM admins";
$result = $conn->query($sql);

$admins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
    <html>
        <body>
            <?php foreach ($admins as $admin): ?>
            <h1>Hello Admin <?php echo $admin['username']; ?></h1>
            <?php endforeach; ?>

            <?php
include "../dbconn.php";

$sql = "SELECT * FROM account";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

            <table border="1">
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table><br>

                    <form action="admin_log-out.php">
                        <button type="submit">Logout</button>
                    </form>

        </body>
</html>
