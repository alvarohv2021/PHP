<?php
include 'funciones.php';
global $arrayOBJ_Peliculas;
?>
<html>
<head>
    <link href="estilos/main.css" type="text/css" rel="stylesheet">
</head>

<h1>Peliculas</h1>
<div class="todo">
    <table>
        <?php
        for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
            $pelicula = $arrayOBJ_Peliculas[$i];
            if ($i % 2 == 0) {
                $color = "grey";
            } else {
                $color = "white";
            }
            echo '<title>Ranking</title>
            <tr style="background-color: ' . $color . '">
                <td class="foto"><img src=Fotos/' . $pelicula->getFoto() . '></td>
                <td class="id">' . ($i + 1) . '.</td>
                <td class="nombre"><a href="mainPelicula.php?PeliculaId='.$pelicula->getId().'"> ' . $pelicula->getName() . '</a> (' . $pelicula->getEstreno() . ')</td>
                <td class="clasificacion">' . $pelicula->getCalificacion() . '</td>
            </tr>';
        }

        ?>
    </table>
</div>
</html>

