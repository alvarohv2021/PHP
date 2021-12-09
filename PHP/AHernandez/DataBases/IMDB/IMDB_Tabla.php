<?php
$server = "localhost";
$user = "root";
$password = "2609Ahv*";
$db="IMDB";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//******************Tabal actores**********************
$sql = "CREATE TABLE  Actores(
id INT(6) UNSIGNED auto_increment PRIMARY KEY,
name varchar (30),
nacimiento varchar (30),
imagen varchar(250)
)";

//******************Tabal Peliculas**********************
/*$sql = "CREATE TABLE  Peliculas(
id INT(6) UNSIGNED PRIMARY KEY,
name varchar (30),
estreno varchar (30),
DirectorID int(6) UNSIGNED,
Trailer varchar(100),
Foto varchar(100)
)";*/
//******************Tabal Directores**********************
/*$sql = "CREATE TABLE  Directores(
id INT(6) UNSIGNED PRIMARY KEY,
name varchar (30),
apellido varchar (30),
nacimiento varchar (30)
)";*/
//******************Tabal Generos**********************
/*$sql = "CREATE TABLE  Generos(
id INT(6) UNSIGNED PRIMARY KEY,
genero varchar (30)
)";*/
//******************Tabal PeliculasActores**********************
/*$sql = "CREATE TABLE  PeliculasActores(
id INT(6) UNSIGNED PRIMARY KEY,
IdPelicula int (6) UNSIGNED,
IdActor int(6) UNSIGNED
)";*/
//******************Tabal PeliculasGeneros**********************
/*$sql = "CREATE TABLE  PeliculasGeneros(
id INT(6) UNSIGNED PRIMARY KEY,
IdPelicula int (6) UNSIGNED,
IdGenero int(6) UNSIGNED
)";*/


if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>