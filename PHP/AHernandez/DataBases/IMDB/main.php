<?php
include 'funciones.php';
global $arrayOBJ_Peliculas;

/*echo '<pre>';
var_dump($arrayOBJ_Peliculas);
echo '</pre>';*/

echo '<h1>Peliculas</h1>';
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula=$arrayOBJ_Peliculas[$i];
    echo '<ul>
    <li>'.$pelicula->getId().' '.$pelicula->getName().' ('.$pelicula->getEstreno().')</li>
</ul>';
}
?>
