<?php
include("funciones.php");
global $arrayOBJ_Peliculas;

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
        $Actores=$arrayOBJ_Peliculas[$peliculaId]->getActores();
        for ($i = 0; $i < count($Actores); $i++) {
            $Actor = $Actores[$i];
            echo '
            <td>
                <a href="pagina_actor.php?actorId=' . $Actor->getId() . '&PeliculaId='.$peliculaId.'">
                    <img class="actor" src=' . $Actor->getFoto() . '>
                </a>
            </td>';
        }
        echo '</tr><tr>';
        for ($i = 0; $i < count($Actores); $i++) {
            $idActor = $Actores[$i];
            echo '<td><p>' . $Actores[$i]->getName() . '</p></td>';
        }
        ?>
    </tr>
</table>
</body>
</html>