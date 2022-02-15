<?php
$servername = "localhost";
$username = "root";
$password = "2609Ahv*";
$dbname = "myDB";

$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";;
$resultados = json_decode(file_get_contents($api_url . "results"), true);
$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql= "CREATE TABLE Resultados (
   id INT(20) AUTO_INCREMENT PRIMARY KEY ,
    district VARCHAR(30) NOT NULL,
    party VARCHAR(100),
    votes INT(50)
)";
/*
$sql = "CREATE TABLE Partidos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
acronym VARCHAR(10) NOT NULL,
logo VARCHAR(100),
colour VARCHAR(10),
totalVotos VARCHAR(50),
totalEscanyos VARCHAR(50)
)";
*/

if ($conn->multi_query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?> 