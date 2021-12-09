<?php
include 'funciones.php';
global $arrayOBJ_Peliculas;
echo '<style>
ul{
list-style-type: none;
}
</style>';
/*echo '<pre>';
var_dump($arrayOBJ_Peliculas);
echo '</pre>';*/

echo '<h1>Peliculas</h1>';
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
    echo '<title>Ranking</title>
<div>
    <ul class="id">
        <li><img src=>' . $pelicula->getFoto().'</li>
    </ul>
</div>';
}
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
    echo '<title>Ranking</title>
<div>
    <ul class="id">
        <li>' . $pelicula->getId().'</li>
    </ul>
</div>';
}
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
echo '
<div>
    <ul class="name">
        <li><a href="google.com"> ' . $pelicula->getName() . '</a></li>
    </ul>
</div>';
}
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
echo '
<div>
    <ul class="estreno">
        <li>('.$pelicula->getEstreno().')</li>
    </ul>
</div>';
}
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
    echo '
<div>
    <ul class="calificacion">
        <li>'.$pelicula->getCalificacion().'</li>
    </ul>
</div>';
}


?>
