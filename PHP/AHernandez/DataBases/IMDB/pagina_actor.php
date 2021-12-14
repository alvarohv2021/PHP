<?php
include("funciones.php");
global $arrayOBJ_Peliculas;

if (isset($_GET["actorId"])) {
    $actorId = $_GET["actorId"] - 1;
}
if (isset($_GET["PeliculaId"])) {
    $peliculaId = $_GET["PeliculaId"];
}

$pelicula = $arrayOBJ_Peliculas[$peliculaId];
$actores = $pelicula->getActores();
for ($i = 0; $i < count($actores); $i++) {
    if (intval($actores[$i]->getId()) == $actorId+1) {
        $actor = $actores[$i];
    }
}

/*echo '<pre>';
var_dump($actor);
echo '</pre>';*/

?>
<html>
<head>
    <title><?php echo $actor->getName() ?></title>
    <link href="estilos/actor.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1><?php echo $actor->getName() ?></h1>
<h3><?php echo $actor->getNacimiento() ?></h3>
<table class="center">
    <tr>
        <td><img class="portada" src="<?php echo $actor->getFoto() ?>"></td>
    </tr>
    <tr>
        <td style="text-align: center"><h4>Filmografia</h4></td>
    </tr>
</table>
<table class="center">
    <tr>
        <?php
        $peliculasDelActor = $actor->getPeliculasId();
        for ($i = 0; $i < count($peliculasDelActor); $i++) {
            $pelicula = $arrayOBJ_Peliculas[$peliculasDelActor[$i] - 1];

            echo "
                <td>
                    <a href='pagina_pelicula.php?PeliculaId=" . $pelicula->getId() . "'>
                        <img class='cartelera' src='Fotos/" . $pelicula->getFoto() . "'>
                    </a>
                </td>";
        }
        echo "</tr><tr>";
        for ($i = 0; $i < count($peliculasDelActor); $i++) {
            $pelicula = $arrayOBJ_Peliculas[$peliculasDelActor[$i] - 1];

            echo "<td>" . $pelicula->getName() . "</td>";
        }
        ?>
    </tr>
</table>
</body>
</html>