<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tasks WHERE id=$id");
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="update_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $task['title']; ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"><?php echo $task['description']; ?></textarea>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Pending" <?php echo ($task['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="Completed" <?php echo ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
        </select>
        <input type="submit" value="Update Task">
    </form>
</body>
</html>
