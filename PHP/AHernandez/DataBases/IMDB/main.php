<?php
include 'funciones.php';
global $arrayOBJ_Peliculas;
echo '<style>

table,td{
border-collapse: collapse;
}

img{
width: 50%;
height: 50%;
}
.id{
width: 5%;
}
.name{
width: 69%;
}
.clasicicacion{
width: 5%;
}

</style>';
/*echo '<pre>';
var_dump($arrayOBJ_Peliculas);
echo '</pre>';*/

echo '
<h1>Peliculas</h1>
<div class="todo">
    <table>';
for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    $pelicula = $arrayOBJ_Peliculas[$i];
if ($i%2==0){
    $color="grey";
}else{
    $color="white";
}
    echo '<title>Ranking</title>
<tr style="background-color: '.$color.'">
    <td class="foto"><img src=Fotos/' . $pelicula->getFoto() . '></td>
    <td class="id"">' . $pelicula->getId() . '</td>
    <td class="name"><a href="google.com"> ' . $pelicula->getName() . '</a> (' . $pelicula->getEstreno() . ')</td>
    <td class="clasificacion">' . $pelicula->getCalificacion() . '</td>
</tr>';

}
echo '</table>
</div>';


?>
