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
//*************Tabla de Personajes, sin episodios*****************
/*$sql = "CREATE TABLE  Characters(
id INT(6) UNSIGNED PRIMARY KEY,
name varchar (30),
status varchar (10),
species varchar (30),
type varchar (30),
gender varchar (30),
origin int(5),
location int(5),
image varchar(100),
created varchar (100)
)";*/

//**************Tabla de Episodios, sin personajes*****************
/*$sql="CREATE TABLE  Episodes(
id INT(6) UNSIGNED PRIMARY KEY,
name varchar (100),
air_date varchar (30),
episode varchar (30),
created varchar (100)
)";*/

//**************Tabla de Ubicaciones, sin residentes*****************
/*$sql="CREATE TABLE  Locations(
id INT(6) UNSIGNED PRIMARY KEY,
name varchar (100),
type varchar (30),
dimension varchar (30),
created varchar (100)
)";*/


//************Tabla NM de id's de charactars y episodes*************
$sql="CREATE TABLE  IDsEpisodesCharacters(
id INT,
character_id int,
episodes_id int ,
PRIMARY KEY(id),
FOREIGN KEY (character_id)
    REFERENCES Characters (id),
FOREIGN KEY (episodes_id)
    REFERENCES Episodes (id)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>