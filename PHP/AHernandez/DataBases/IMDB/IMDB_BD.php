<?php

$servername = "localhost";
$username = "root";
$password = "2609Ahv*";


/*$servername = "sql480.main-hosting.eu";
$username = "u850300514_ahernandez";
$password = "x43470242N";*/

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IMDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>