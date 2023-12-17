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

<!DOCTYPE html>
<html>
    <head>
    </head>
        <body>
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
            </table>
            <ul>
                  <li><a href="admin_page.php">Home</a></li>
            </ul>
        </body>
</html>