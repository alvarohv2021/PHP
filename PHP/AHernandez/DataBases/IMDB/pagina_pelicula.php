<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include("funciones.php");
global $arrayOBJ_Peliculas;

if (isset($_POST["comentario"]) && isset($_GET["PeliculaId"])) {
    insertarComentario($_GET["PeliculaId"], $_SESSION['ID'], $_POST["comentario"]);
    $_POST["comentario"] = null;
}

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
<?php
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
        $Actores = $arrayOBJ_Peliculas[$peliculaId]->getActores();
        for ($i = 0; $i < count($Actores); $i++) {
            $Actor = $Actores[$i];
            echo '
            <td>
                <a href="pagina_actor.php?actorId=' . $Actor->getId() . '&PeliculaId=' . $peliculaId . '">
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
<div>
    <h4>Comentarios:</h4>
    <?php
    $arrayComentariosUsuarios = mostarComentariosDePelicula($_GET["PeliculaId"]);
    for ($i = 0; $i < count($arrayComentariosUsuarios); $i++) {
        echo "<div class='comentarios'>";
        echo "<p>" . $arrayComentariosUsuarios[$i]['Username'] . ":</p>";
        echo "<p>" . $arrayComentariosUsuarios[$i]['comentario'] . "</p>";
        echo "<br>";
        echo "</div>";
    }
    ?>
</div>
<?php
if ($_SESSION["Username"] != null) {
    ?>
    <div>
        <form method="post" action="">
            <textarea name="comentario" rows="5" cols="40" maxlength="500" placeholder="Leave a coment here"
                      required></textarea>
            <input type="submit" value="Send">
        </form>
    </div>

    <?php
}
?>
</body>
</html>