<!DOCTYPE html>
<html>
<head>
    <title>Update To Do List</title>
</head>
<body>
    <h1>Update To Do List</h1>
    <form action="user_edit_and_delete_action.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? (int)$_GET['id'] : 0; ?>">
        <label for="newTask">New Task</label>
        <input type="text" name="newTask" id="newTask">

        <button type="submit" name="updateTask">Update Task</button>
    </form>
</body>
</html>
