<?php

// $servername = "localhost";
// $username = "mohammed"; //defult  root
// $password = "test1234"; // المتوقع فاضي 
// $dbname = "Mydb";

// //creat connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// //error handling

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "good". "<br>";
// }

// // insert into table
// // $insert = "INSERT INTO MyGuests (firstname, lastname, email) VALUES 
// // ('mohammed','hi','test@test')";

// // // error handling
// // if ($conn->query($insert) === TRUE) {
// //     echo "Records inserted successfully<br>";
// // } else {
// //     echo "Error inserting records: " . $conn->error . "<br>";
// // }



// // read or select data 
// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);
// // error handling
// if ($result->num_rows > 0) {
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }




// // update from table 
// // $sql = "UPDATE MyGuests SET lastname='ahmad' WHERE id=1";
// // // error handling
// // if ($conn->query($sql) === TRUE) {
// //   echo "Record updated successfully";
// // } else {
// //   echo "Error updating record: " . $conn->error;
// // }

// // delete from table 
// $sql = "DELETE FROM MyGuests WHERE id=6";
// // error handling
// if ($conn->query($sql) === TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . $conn->error;
// }
        
// //close the connection
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>

    <form action="create_task.php" method="POST">
        <h2>Create Task</h2>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <input type="submit" value="Add Task">
    </form>

    <h2>All Tasks</h2>
    <table border="1">
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
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='edit_task.php?id={$row['id']}'>Edit</a>
                        <a href='delete_task.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
