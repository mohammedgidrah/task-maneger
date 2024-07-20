<?php
$servername = "localhost";
$username = "mohammed";
$password = "testing0245";
$dbname = "taskmanager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
