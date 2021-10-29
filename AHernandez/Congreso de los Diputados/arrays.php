<?php

$provincias = array('Alava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Avila', 'Badajoz', 'Barcelona', 'Burgos', 'Cáceres',
    'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Ceuta', 'Córdoba', 'La Coruña', 'Cuenca', 'Gerona', 'Granada', 'Guadalajara',
    'Guipúzcoa', 'Huelva', 'Huesca', 'Islas Baleares', 'Jaén', 'León', 'Lérida', 'Lugo', 'Madrid', 'Málaga', 'Melilla', 'Murcia', 'Navarra',
    'Orense', 'Palencia', 'Las Palmas', 'Pontevedra', 'La Rioja', 'Salamanca', 'Segovia', 'Sevilla', 'Soria', 'Tarragona',
    'Santa Cruz de Tenerife', 'Teruel', 'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza');
$partidos = array("PP", "PSOE", "Podemos", "Vox", "Pacma");

function ordenarCircumscripcion($provincias, $partidos)
{
    $circunscripcion = array($provincias => array());
    for ($i = 0; $i < count($provincias); $i++) {
        for ($j = 0; $j < count($partidos); $j++) {
            $circunscripcion[$provincias[$i]][] = $partidos[$j];
        }
    }
    return $circunscripcion;
}
if (isset($_GET["sortingCriteria"])) {

    if ($_GET["sortingCriteria"] == "Circumscripcion") {
        $ordenado= ordenarCircumscripcion($provincias,$partidos);

    } elseif ($_GET["sortingCriteria"] == "Partidos") {
        $ordenado= ordenarCircumscripcion($partidos,$provincias);
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <style type="text/css">
        table,tr,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
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
            <form class="d-flex" action="arrays.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Sorting criteria</option>
                    <option value="Circumscripcion">Circumscripcion</option>
                    <option value="Partidos">Partidos</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<table>
<?php
for ($i = 0; $i < count($ordenado); $i++) {
    echo "<tr>";
    echo "<td>".$provincias[$i]."</td>";
    for ($j = 0; $j < count($ordenado[$provincias[$i]]); $j++) {

        echo "<td>".$ordenado[$provincias[$i]][$j]."</td>";
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>