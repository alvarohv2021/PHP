<?php
include("funciones.php");
global $arrayOBJ_Peliculas, $arrayOBJ_Actores;

if (isset($_GET["actorId"])) {
    $actorId = $_GET["actorId"] - 1;
}
$actor = $arrayOBJ_Actores[$actorId];

?>
<html>
<head>
    <title><?php echo $actor->getName() ?></title>
    <link href="estilos/actor.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1><?php echo $actor->getName() ?></h1>
<h3><?php echo $actor->getNacimiento() ?></h3>
<div class="filmografia">
    <img class="portada" src="<?php echo $actor->getFoto() ?>">
    <h4>Coocido por:</h4>
</div>
</body>
</html>