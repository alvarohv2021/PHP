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
for ($i = 0; $i < count($partidos); $i++) {
    //mysql_real_escape_string
    $sql .= "INSERT INTO Partidos ( name, acronym,logo,colour,totalVotos,totalEscanyos)VALUES (";
    $sql .= "'" . $partidos[$i]['name'] . "','" . $partidos[$i]['acronym']. "','" . $partidos[$i]['logo']. "','" . $partidos[$i]['colour']. "','" . $partidos[$i]['totalVotos']. "','" . $partidos[$i]['totalEscanyos']."'";
    $sql .= ");";
}

if ($conn->multi_query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "new record created successfully . Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . " < br>" . $conn->error;
}

$conn->close();
?> 