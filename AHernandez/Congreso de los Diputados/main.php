<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

include("ClaseCircumscripcion.php");
include("ClasePartidos.php");
include("ClaseProvincias.php");

$resultados = json_decode(file_get_contents($api_url . "results"), true);
$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);

$arrayCircumscripcion = crearObjetoCircumscripcion($resultados);//array de objetos
$arrayPartidos = crearObjetoPartidos($partidos);//array de objetos
$arrayProvincias = crearObjetoProvincias($provincias);//array de objetos

$soloProvincias = provincias($provincias);//devulve un array que solo contiene las provincias

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="tablas.css" title="style"/>
    <title>Document</title>
    <style type="text/css">
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            padding: 3px;
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="main.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Selecciona Circumscripcion</option>
                    <?php //Pone todas las provincias como options dentro de la nav
                    global $soloProvincias;
                    for ($i = 0; $i < count($soloProvincias); $i++) {
                        echo "<option value='" . $soloProvincias[$i] . "'>" . $soloProvincias[$i] . "</option>";
                    }
                    ?>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<?php

function crearObjetoCircumscripcion($resultados)//creamos el array de objetos y le introducimos valores
{
    for ($i = 0; $i < count($resultados); $i++) {
        $resultado_obj[$i] = new Circumscripcion($resultados[$i]['party'], $resultados[$i]['district'], $resultados[$i]['votes']);
    }
    return $resultado_obj;
}

function crearObjetoPartidos($partidos)//creamos el array de objetos y le introducimos valores
{
    for ($i = 0; $i < count($partidos); $i++) {
        $resultado_obj[$i] = new Partidos($partidos[$i]['id'], $partidos[$i]['name'], $partidos[$i]['acronym'], $partidos[$i]['logo'], $partidos[$i]['colour']);
    }
    return $resultado_obj;
}

function crearObjetoProvincias($provincias)//creamos el array de objetos y le introducimos valores
{
    for ($i = 0; $i < count($provincias); $i++) {
        $resultado_obj[$i] = new Provincias($provincias[$i]['id'], $provincias[$i]['name'], $provincias[$i]['delegates']);
    }
    return $resultado_obj;
}

function provincias($provincias)//creacion de una rray que solo contiene el nombre de las provincias
{
    for ($i = 0; $i < count($provincias); $i++) {
        $soloProvincias[$i] = $provincias[$i]['name'];
    }
    return $soloProvincias;
}

function tablaProvincia($provincia)//Crea una tabla con con los datos de la provincia introducida
{
    global $arrayCircumscripcion;
    echo "<br><table>";
    echo "<tr>";
    echo "<th>Circumscripcion</th>";
    echo "<th>Partido</th>";
    echo "<th>Votos</th>";
    echo "<th>Escaños</th>";
    echo "</tr>";
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        echo "<tr>";
        if ($arrayCircumscripcion[$i]->getProvincias() == $provincia) {
            echo "<td>" . $arrayCircumscripcion[$i]->getProvincias() . "</td>";
            echo "<td>" . $arrayCircumscripcion[$i]->getPartidos() . "</td>";
            echo "<td>" . $arrayCircumscripcion[$i]->getResultados() . "</td>";
            echo "<td>" . $arrayCircumscripcion[$i]->getEscanos() . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

}

function RepartirEscaños($provincia, $arrayCircumscripcion)

{
    global $arrayProvincias;
    $totalEscanos = getDelegatesByProvince($arrayProvincias, $provincia);
    $arrayVotos = getVotesByProvinces($arrayCircumscripcion, $provincia);
    $escanos = [];
    $posicion = 0;

    for ($i = 0; $i < $totalEscanos; $i++) {
        $mayor = 0;
        for ($j = 0; $j < count($arrayVotos); $j++) {
            $escanos[]=0;
            if ($arrayVotos[$j] > $mayor) {
                $mayor = $arrayVotos[$j];
                $posicion = $j;
            }
        }
        $arrayVotos[$posicion] = $arrayVotos[$posicion] / 2;
        $escanos[$posicion] = $escanos[$posicion] + 1;
    }
    $posicion = 0;
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        if ($arrayCircumscripcion[$i]->getProvincias() == $provincia) {

            $arrayCircumscripcion[$i]->setEscanos($escanos[$posicion]);
            $posicion++;
        }
    }
}

function getDelegatesByProvince($arrayProvincias, $provincia)
{

    for ($i = 0; $i < count($arrayProvincias); $i++) {//Sacamos el numero total de escaños de la provincia seleccionada
        if ($provincia == $arrayProvincias[$i]->getname()) {
            $totalEscaños = $arrayProvincias[$i]->getDelegates();
        }
    }
    return $totalEscaños;
}//devuelve las delegaciones de la provincia introducida

function getVotesByProvinces($arrayCircumscripcion, $provincia)
{
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {//Sacamos el numero total de escaños de la provincia seleccionada
        if ($provincia == $arrayCircumscripcion[$i]->getProvincias()) {
            $votosProvincia[] = $arrayCircumscripcion[$i]->getResultados();
        }
    }

    return $votosProvincia;
}

if (isset($_GET["sortingCriteria"])) {
    for ($i = 0; i < count($soloProvincias); $i++) {
        if ($_GET["sortingCriteria"] == $arrayCircumscripcion[$i]->getProvincias()) {//recibe el valor introducido por la nav bar
            //envia el valor recibido a una funcion que creara un tabla con los datos de esa provincia.
            RepartirEscaños($arrayCircumscripcion[$i]->getProvincias(), $arrayCircumscripcion);
            tablaProvincia($arrayCircumscripcion[$i]->getProvincias());


            break;
        }
    }
}
?>
</body>
