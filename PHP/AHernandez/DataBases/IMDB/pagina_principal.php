<?php
error_reporting(E_ERROR | E_PARSE);
include 'funciones.php';
global $arrayOBJ_Peliculas;
session_start();
?>
<html>
<head>
    <link href="estilos/main.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
    if ($_SESSION["Username"] != null) {
        echo "<a href='pagina_InicioS.php'><div class='login'><p> Logout </p></div></a>";
        echo "<div class='login'><p>" . $_SESSION["Username"] . "</p></div>";
    }else{
        echo "<a href='pagina_InicioS.php'><div class='login'><p> Login </p></div></a>";
        echo "<a href='pagina_Registro.php'><div class='login'><p> Sign Up </p></div></a>";
    }
    ?>
<h1>Peliculas</h1>
<div class="todo">
    <table>
        <?php
        for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
            $pelicula = $arrayOBJ_Peliculas[$i];
            if ($i % 2 == 0) {
                $color = "grey";
            } else {

                $color = "#212738";

            }
            echo '<title>Ranking</title>
            <tr style="background-color: ' . $color . '">
                <td class="foto"><img src=Fotos/' . $pelicula->getFoto() . '></td>
                <td class="id">' . ($i + 1) . '.</td>
                <td class="nombre"><a href="pagina_pelicula.php?PeliculaId=' . $pelicula->getId() . '"> ' . $pelicula->getName() . '</a> (' . $pelicula->getEstreno() . ')</td>
                <td class="clasificacion">' . $pelicula->getCalificacion() . '</td>
            </tr>';
        }
        ?>
    </table>
</div>
</body>
</html>