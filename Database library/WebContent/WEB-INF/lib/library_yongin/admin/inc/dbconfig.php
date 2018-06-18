<?php
$db_host = "localhost";
$db_username = "db_rushbro";
$db_password = "yongin123";
$db_name = "db_rushbro";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
?>