<?php
$servername = "localhost";
$username = "root";
$password = "2609Ahv*";
$dbname = "RyckAndMorty";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$seed = 0242; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);

/*$sql = "";
for ($i = 0; $i < count($characters); $i++) {
    $name[] = $characters[$i]["name"];
    $name[$i] = $conn->real_escape_string($name[$i]);
    $sql .= "INSERT INTO Characters (id,name,status,species,type,gender,origin,location,image,created)VALUES (";
    $sql .="'".$characters[$i]['id']."','". $name[$i]."','" .$characters[$i]['status']."','".$characters[$i]['species']
        ."','".$characters[$i]['type']."','".$characters[$i]['gender']."',".$characters[$i]['origin'].",".$characters[$i]['location']
        .",'".$characters[$i]['image']."','".$characters[$i]['created']."'";
    $sql .= ");";
}*/

/*$sql = "";
for ($i = 0; $i < count($episodes); $i++) {
    $name[] = $episodes[$i]["name"];
    $name[$i] = $conn->real_escape_string($name[$i]);
    $sql .= "INSERT INTO Episodes (id,name,air_date,episode,created)VALUES (";
    $sql .="'".$episodes[$i]['id']."','". $name[$i]."','" .$episodes[$i]['air_date']."','".$episodes[$i]['episode']
        ."','".$episodes[$i]['created']."'";
    $sql .= ");";
}*/

/*$sql = "";
for ($i = 0; $i < count($locations); $i++) {
    $name[] = $locations[$i]["name"];
    $name[$i] = $conn->real_escape_string($name[$i]);
    $sql .= "INSERT INTO Locations (id,name,type,dimension,created)VALUES (";
    $sql .="'".$locations[$i]['id']."','". $name[$i]."','" .$locations[$i]['air_date']."','".$locations[$i]['episode']
        ."','".$locations[$i]['created']."'";
    $sql .= ");";
}*/

$sql = "";
for ($i = 0; $i < count($characters); $i++) {
    for ($j = 0; $j < count($characters[$i]['episodes']); $j++) {
        $sql .= "INSERT INTO IDsEpisodesCharacters (id,character_id,episodes_id)VALUES (";
        $sql .= ($i+1).",'". $characters[$i]['id'] . "','" . $characters[$i]['episodes'][$j]."'";
        $sql .= ");";
    }
}

if ($conn->multi_query($sql) === TRUE) {
    echo "Se realizo correctamente";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>