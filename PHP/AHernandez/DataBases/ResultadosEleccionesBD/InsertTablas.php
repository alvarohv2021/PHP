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

$sql = "";
for ($i = 0; $i < count($resultados); $i++) {
    $party[] = $resultados[$i]["party"];
    $party[$i] = $conn->real_escape_string($party[$i]);
    $sql .= "INSERT INTO Resultados (district,party,votes)VALUES (";
    $sql .="'".$resultados[$i]['district']."','". $party[$i]."'," .$resultados[$i]['votes'];
    $sql .= ");";
}
/*
$sql = "";
for ($i = 0; $i < count($partidos); $i++) {
    $name[] = $partidos[$i]["name"];
    $name[$i] = $conn->real_escape_string($name[$i]);
    $sql .= "INSERT INTO Partidos ( name, acronym,logo,colour,totalVotos,totalEscanyos)VALUES (";
    $sql .= "'" . $name[$i] . "','" . $partidos[$i]['acronym']. "','" . $partidos[$i]['logo'].
        "','" . $partidos[$i]['colour']. "','" . $partidos[$i]['totalVotos']. "','" .
        $partidos[$i]['totalEscanyos']."'";
    $sql .= ");";
}
$sql = "CREATE TABLE Partidos (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
acronym VARCHAR(10) NOT NULL,
logo VARCHAR(100),
colour VARCHAR(10),
totalVotos VARCHAR(50),
totalEscanyos VARCHAR(50)
)";
if ($conn->multi_query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "new record created successfully . Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . " < br>" . $conn->error;
}
*/

if ($conn->multi_query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?> 