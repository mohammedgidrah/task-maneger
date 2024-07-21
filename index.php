<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="contaner">
        <h1>Task Manager</h1>

        <form action="create_task.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
            <input class="addtask" type="submit" value="Add Task">
        </form>

        <h2>All Tasks</h2>
        <table >
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'db_connection.php';
            $result = $conn->query("SELECT * FROM tasks");
            $counter=0;
            while ($row = $result->fetch_assoc()) {
                $counter++;
                echo "<tr>
                
                    <td>{$counter}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a class='edit' href='edit_task.php?id={$row['id']}'>Edit</a>
                        <a class='delete' href='delete_task.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>