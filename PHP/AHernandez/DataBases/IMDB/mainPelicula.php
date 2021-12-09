<?php
include ("funciones.php");
include ("Peliculas.php");
global $arrayOBJ_Peliculas;

if (isset($_GET["PeliculaId"])){
$peliculaId=$_GET["PeliculaId"];
}
$pelicula=$arrayOBJ_Peliculas[$peliculaId];

?>
<html>
<head>
    <title><?php $arrayOBJ_Peliculas[$peliculaId]->getName() ?>></title>
</head>
</html>
