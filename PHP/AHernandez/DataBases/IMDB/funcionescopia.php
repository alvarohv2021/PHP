<?php
include("clases/Peliculas.php");
include("clases/Actores.php");

//****************Conexion******************
$server = "sql480.main-hosting.eu";
$user = "u850300514_ahernandez";
$password = "x43470242N";
$db = "u850300514_ahernandez";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//**********************Arrays asociativas****************************

$resultPeliculas = $conn->query("SELECT * FROM Peliculas");
$Pelicula_asociativo = $resultPeliculas->fetch_all(MYSQLI_ASSOC);

//**********************Creacion de objetos*******************************
$arrayOBJ_Peliculas = crearArrayObjetosPelicula($Pelicula_asociativo);

function crearArrayObjetosPelicula($arrayPeliculas)
{
    for ($i = 0; $i < count($arrayPeliculas); $i++) {
        $arrayOBJ_Peliculas[$i] = new Pelicula($arrayPeliculas[$i]['id'], $arrayPeliculas[$i]['name'],
            $arrayPeliculas[$i]['estreno'], $arrayPeliculas[$i]['DirectorID'], $arrayPeliculas[$i]['Trailer'],
            $arrayPeliculas[$i]['Foto'], $arrayPeliculas[$i]['Calificacion']);
    }
    return $arrayOBJ_Peliculas;
}

//*******************************Mapeado de datos**************************************

function arrayGenerosDePelicula($idPelicula)
{
    global $coon;
    $sql = "select Generos.genero from Generos
join PeliculasGeneros on Generos.id = PeliculasGeneros.IdGenero
where PeliculasGeneros.IdPelicula = " . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayGenerosDePelicula = $query->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($arrayGenerosDePelicula); $i++) {
        $result[] = $arrayGenerosDePelicula[$i]['genero'];
    }
    return $result;
}

function arrayObjetosActoresDePelicula($idPelicula)
{
    global $coon;
    $sql = "select Actores.* from Actores
join PeliculasActores on Actores.id = PeliculasActores.IdActor
where PeliculasActores.IdPelicula=" . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayActoresDePelicula = $query->fetch_all(MYSQLI_ASSOC);

     echo '<pre>';
     var_dump($arrayActoresDePelicula);
     echo '</pre>';

    for ($i = 0; $i < count($arrayActoresDePelicula); $i++) {
        $result[] = new Actor($arrayActoresDePelicula[$i]['id'], $arrayActoresDePelicula[$i]['name'],
            $arrayActoresDePelicula[$i]['nacimiento'], $arrayActoresDePelicula[$i]['imagen']);
    }
    return $result;
}

function directorPelicula($idPelicula)
{
    global $coon;
    $sql = "select Directores.name from Peliculas
join Directores on Peliculas.DirectorID =Directores.id
where Peliculas.id=" . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayDirectorPelicula = $query->fetch_all(MYSQLI_ASSOC);

    return $directorPelicula = $arrayDirectorPelicula[0]['name'];
}

function insertarArrayActoresYGeneros(Pelicula $pelicula)
{
    $pelicula->setActores(arrayObjetosActoresDePelicula($pelicula->getId()));
    $pelicula->setGeneros(arrayGenerosDePelicula($pelicula->getId()));
    $pelicula->setDirector(directorPelicula($pelicula->getId()));
}

for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    insertarArrayActoresYGeneros($arrayOBJ_Peliculas[$i]);
}
?>