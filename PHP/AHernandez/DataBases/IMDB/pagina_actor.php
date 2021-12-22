<?php
error_reporting(E_ERROR | E_PARSE);
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
<body><?php
if ($_SESSION["Username"] != null) {
    echo "<a href='pagina_principal.php'><div class='login'><p>Home</p></div></a>";
    echo "<a href='pagina_InicioS.php'><div class='login'><p> Logout </p></div></a>";
    echo "<div class='login'><p>" . $_SESSION["Username"] . "</p></div>";
}else{
    echo "<a href='pagina_principal.php'><div class='login'><p>Home</p></div></a>";
    echo "<a href='pagina_InicioS.php'><div class='login'><p> Login </p></div></a>";
    echo "<a href='pagina_Registro.php'><div class='login'><p> Sign Up </p></div></a>";
}
?>

<h1><?php echo $actor->getName() ?></h1>
<h3><?php echo $actor->getNacimiento() ?></h3>
<table class="center">
    <tr>
        <td><img class="portada" src="<?php echo $actor->getFoto() ?>"></td>
    </tr>
    <tr>
        <td style="text-align: center">Filmografia</td>
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