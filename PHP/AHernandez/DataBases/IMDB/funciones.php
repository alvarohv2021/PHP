<?php
include("Peliculas.php");
include("Actores.php");
include("Directores.php");
include("Generos.php");
include("PeliculasActores.php");
include("PeliculasGeneros.php");

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

$resultActores = $conn->query("select * from Actores");
$Actores_asociativo = $resultActores->fetch_all(MYSQLI_ASSOC);

$resultDirectores = $conn->query("select * from Directores");
$Directores_asociativo = $resultDirectores->fetch_all(MYSQLI_ASSOC);

$resultGeneros = $conn->query("select * from Generos");
$Generos_asociativo = $resultGeneros->fetch_all(MYSQLI_ASSOC);

$resultadoPeliculasActores = $conn->query("select * from PeliculasActores");
$PeliculasActores_asociativo = $resultadoPeliculasActores->fetch_all(MYSQLI_ASSOC);

$resultadoPeliculasGeneros = $conn->query("select * from PeliculasGeneros");
$PeliculasGeneros_asociativo = $resultadoPeliculasGeneros->fetch_all(MYSQLI_ASSOC);

//**********************Creacion de objetos*******************************
$arrayOBJ_Peliculas = crearArrayObjetosPelicula($Pelicula_asociativo);
$arrayOBJ_Actores = crearArrayObjetosActor($Actores_asociativo);
$arrayOBJ_Directores = crearArrayObjetosDirector($Directores_asociativo);
$arrayOBJ_Generos = crearArrayObjetosGenero($Generos_asociativo);
$arrayOBJ_PelicualsActores = crearArrayObjetosPelicuaActor($PeliculasActores_asociativo);
$arrayOBJ_PeliculasGeneros = crearArrayObjetosPeliculaGenero($PeliculasGeneros_asociativo);

function crearArrayObjetosPelicula($arrayPeliculas)
{
    for ($i = 0; $i < count($arrayPeliculas); $i++) {
        $arrayOBJ_Peliculas[$i] = new Pelicula($arrayPeliculas[$i]['id'], $arrayPeliculas[$i]['name'],
            $arrayPeliculas[$i]['estreno'], $arrayPeliculas[$i]['DirectorID'], $arrayPeliculas[$i]['Trailer'],
            $arrayPeliculas[$i]['Foto'], $arrayPeliculas[$i]['Calificacion']);
    }
    return $arrayOBJ_Peliculas;
}

function crearArrayObjetosDirector($arrayDirectores)
{
    for ($i = 0; $i < count($arrayDirectores); $i++) {
        $arrayOBJ_Directores[$i] = new Director($arrayDirectores[$i]['id'], $arrayDirectores[$i]['name']);
    }
    return $arrayOBJ_Directores;
}

function crearArrayObjetosActor($arrayActores)
{
    for ($i = 0; $i < count($arrayActores); $i++) {
        $arrayOBJ_Actores[$i] = new Actor($arrayActores[$i]['id'], $arrayActores[$i]['name'],
            $arrayActores[$i]['nacimiento'], $arrayActores[$i]['imagen']);
    }
    return $arrayOBJ_Actores;
}

function crearArrayObjetosGenero($arrayGeneros)
{
    for ($i = 0; $i < count($arrayGeneros); $i++) {
        $arrayOBJ_Generos[$i] = new Genero($arrayGeneros[$i]['id'], $arrayGeneros[$i]['genero']);
    }
    return $arrayOBJ_Generos;
}

function crearArrayObjetosPelicuaActor($arrayPeliculasActores)
{
    for ($i = 0; $i < count($arrayPeliculasActores); $i++) {
        $arrayOBJ_PelicualsActores[$i] = new PeliculaActor($arrayPeliculasActores[$i]['id'],
            $arrayPeliculasActores[$i]['IdPelicula'], $arrayPeliculasActores[$i]['IdActor']);
    }
    return $arrayOBJ_PelicualsActores;
}

function crearArrayObjetosPeliculaGenero($arrayPeliculasGeneros)
{
    for ($i = 0; $i < count($arrayPeliculasGeneros); $i++) {
        $arrayOBJ_PeliculasGeneros[$i] = new PeliculaGenero($arrayPeliculasGeneros[$i]['id'],
            $arrayPeliculasGeneros[$i]['IdPelicula'], $arrayPeliculasGeneros[$i]['IdGenero']);
    }
    return $arrayOBJ_PeliculasGeneros;
}

//*******************************Mapeado de datos**************************************

function arrayGenerosDePelicula($idPelicula)
{
    global $conn;
    $sql = "select Generos.genero from Generos
join PeliculasGeneros on Generos.id = PeliculasGeneros.IdGenero
where PeliculasGeneros.IdPelicula = " . $idPelicula . ";";

    $query = $conn->query($sql);
    $arrayGenerosDePelicula = $query->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($arrayGenerosDePelicula); $i++) {
        $result[] = $arrayGenerosDePelicula[$i]['genero'];
    }

    return $result;

}

function arrayActoresDePelicula($idPelicula)
{
    global $conn;
    $sql = "select Actores.name from Actores
join PeliculasActores on Actores.id = PeliculasActores.IdActor
join Peliculas on Peliculas.id = PeliculasActores.IdPelicula
where Peliculas.id=" . $idPelicula . ";";

    $query = $conn->query($sql);
    $arrayActoresDePelicula = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($arrayActoresDePelicula); $i++) {
        $result[] = $arrayActoresDePelicula[$i]['name'];
    }
    return $result;

}

function directorPelicula($idPelicula)
{
    global $conn;
    $sql = "select Directores.name from Peliculas
join Directores on Peliculas.DirectorID =Directores.id
where Peliculas.id=" . $idPelicula . ";";

    $query = $conn->query($sql);
    $arrayDirectorPelicula=$query->fetch_all(MYSQLI_ASSOC);

    return $directorPelicula=$arrayDirectorPelicula[0]['name'];

}

function insertarAcrrayActoresYGeneros(Pelicula $pelicula)
{
    $pelicula->setActores(arrayGenerosDePelicula($pelicula->getId()));
    $pelicula->setGeneros(arrayActoresDePelicula($pelicula->getId()));
    $pelicula->setDirector(directorPelicula($pelicula->getId()));
}

for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    insertarAcrrayActoresYGeneros($arrayOBJ_Peliculas[$i]);
}
/*echo '<pre>';
var_dump($arrayOBJ_Peliculas);
echo '</pre>';*/
?>