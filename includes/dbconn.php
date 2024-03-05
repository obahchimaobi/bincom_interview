<?php 
// Database connection details 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bincomphptest";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . $conn->connect_error);
}


?>