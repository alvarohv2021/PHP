<?php
include("funciones.php");
global $arrayOBJ_Peliculas, $arrayOBJ_Actores;

if (isset($_GET["PeliculaId"])) {
    $peliculaId = $_GET["PeliculaId"] - 1;
}
$pelicula = $arrayOBJ_Peliculas[$peliculaId];


//saco el id de los actores que participan en la pelicula con el id "$peliculaId"
//para asi poder busacrlos en la array de objetos de Actores y tener acceso a todos sus metodos
$idActores = arrayIdActoresDePelicula($peliculaId + 1);
?>
<html>
<head>
    <title><?php echo $pelicula->getName() ?></title>
    <link href="estilos/plicula.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1><?php echo $pelicula->getName() ?></h1>
<table class="center">
    <tr>
        <td><?php echo $pelicula->getDirector() ?> ·</td>
        <td><?php echo $pelicula->getEstreno() ?></td>
    </tr>
</table>
<div>
    <img class="portada" src="Fotos/<?php echo $pelicula->getFoto() ?>">
</div>
<table class="center">
    <tr>
        <?php
        for ($i = 0; $i < count($pelicula->getGeneros()); $i++) {
            echo '<td class="circle">' . $pelicula->getGeneros()[$i] . '</td>';
        }
        ?>
    </tr>
</table>
<p><?php echo $pelicula->getCalificacion() ?></p>
<table class="center">
    <tr>
        <?php
        for ($i = 0; $i < count($idActores); $i++) {
            $idActor = $idActores[$i];
            echo '
            <td>
                <a href="pagina_actor.php?actorId=' . $arrayOBJ_Actores[$idActor - 1]->getId() . '">
                    <img class="actor" src=' . $arrayOBJ_Actores[$idActor - 1]->getFoto() . '>
                </a>
            </td>';
        }
        echo '</tr><tr>';
        for ($i = 0; $i < count($idActores); $i++) {
            $idActor = $idActores[$i];
            echo '<td><p>' . $pelicula->getActores()[$i] . '</p></td>';
        }
        ?>
    </tr>
</table>
</body>
</html>