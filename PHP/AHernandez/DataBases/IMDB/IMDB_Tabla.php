<?php
$server = "sql480.main-hosting.eu";
$user = "u850300514_ahernandez";
$password = "x43470242N";
$db="u850300514_ahernandez";

/*$servername = "sql480.main-hosting.eu";
$username = "u850300514_ahernandez";
$password = "x43470242N";*/

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//******************Tabal actores**********************
/*$sql = "CREATE TABLE  Actores(
id INT(6) UNSIGNED auto_increment PRIMARY KEY,
name varchar (30),
nacimiento varchar (30),
imagen varchar(250)
)";*/

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

//****************Tabla Usuarios*********************************
/*$sql="CREATE TABLE Usuarios(
    id INT(6) UNSIGNED auto_increment PRIMARY KEY,
    Email varchar (45),
    Username varchar (45),
    Pasword varchar (45)
)";*/

//**************Tabla Comentarios********************************
$sql="CREATE TABLE Comentarios(
   id INT(6) UNSIGNED auto_increment PRIMARY KEY,
   idPelicula int(6) UNSIGNED,
   idUsuario int(6) UNSIGNED,
   comentario varchar(500)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>