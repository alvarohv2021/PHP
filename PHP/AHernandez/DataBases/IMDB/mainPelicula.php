<?php
include("funciones.php");
global $arrayOBJ_Peliculas;

$peliculaId = 0;

if (isset($_GET["PeliculaId"])) {
    $peliculaId = $_GET["PeliculaId"] - 1;
}
$pelicula = $arrayOBJ_Peliculas[$peliculaId];

?>
<html>
<head>
    <title><?php echo $pelicula->getName() ?></title>
    <link href="estilos/plicula.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1><?php echo $pelicula->getName() ?></h1>
<p><?php echo $pelicula->getEstreno() ?></p>
<div>
    <img src="Fotos/<?php echo $pelicula->getFoto() ?>">
</div>
<?php



?>
</body>
</html>
