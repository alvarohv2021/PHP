<?php
error_reporting(0);//Hace que en Windows no salgna mensajes de warning
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

include("ClaseCircumscripcion.php");
include("ClasePartidos.php");
include("ClaseProvincias.php");

//*************************************************************

$servername = "localhost";
$username = "root";
$password = "2609Ahv*";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$queryResult = "SELECT * FROM Resultados";
$resultResult = $conn->query($queryResult);
$resultados_asociativo = $resultResult->fetch_all(MYSQLI_ASSOC);

$queryProv = "SELECT * FROM Provincias";
$resultProv = $conn->query($queryProv);
$provincias_asociativo = $resultProv->fetch_all(MYSQLI_ASSOC);

$queryPart = "SELECT * FROM Partidos";
$resultPart = $conn->query($queryPart);
$partidos_asociativo = $resultPart->fetch_all(MYSQLI_ASSOC);

//*************************************************************

$resultados = $resultados_asociativo;
$partidos = $partidos_asociativo;
$provincias = $provincias_asociativo;

$arrayCircumscripcion = crearObjetoCircumscripcion($resultados);//array de objetos
$arrayPartidos = crearObjetoPartidos($partidos);//array de objetos
$arrayProvincias = crearObjetoProvincias($provincias);//array de objetos
getAllEscanos($arrayProvincias, $arrayCircumscripcion);


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
            <form class="d-flex" action="mainBD.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Selecciona Circumscripcion</option>
                    <option selected value="Generales">Resultados Generales</option>
                    <option selected value="Provincia">Filtrar por Provincia</option>
                    <option selected value="Partido">Filtrar por Partido</option>
                </select>

                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<?php
function optionSelected($sortedObj, $criteria)
{
    echo "<form class='d-flex' action='mainBD.php'>";
    echo "<select class='form-control me-2 form-select' aria-label='Sorting criteria' name='sortingCriteriaProvincias'>";
    //Pone todas las provincias como options dentro de la nav
    echo "<option value='unsorted'>Seleccione " . $criteria . "</option>";
    for ($i = 0; $i < count($sortedObj); $i++) {
        echo "<option value='" . $sortedObj[$i]->getName() . "'>" . $sortedObj[$i]->getName() . "</option>";
    }
    echo "</select>";
    echo "<button class='btn btn-outline-success' type='submit'>Sort</button>";
    echo "</form>";
}

function crearObjetoCircumscripcion($resultados)//creamos el array de objetos y le introducimos valores
{
    for ($i = 0; $i < count($resultados); $i++) {
        $resultado_obj[$i] = new Circumscripcion($resultados[$i]['party'], $resultados[$i]['district'], intval($resultados[$i]['votes']));
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

function tabla($toSearch, $sortedObj)//Crea una tabla con con los datos de la provincia introducida
{
    echo "<br><table>";
    echo "<tr>";
    echo "<th>Circumscripcion</th>";
    echo "<th>Partido</th>";
    echo "<th>Votos</th>";
    echo "<th>Escaños</th>";
    echo "</tr>";
    echo "</tr>";
    for ($i = 0; $i < count($sortedObj); $i++) {
        echo "<tr>";
        if ($toSearch == "Generales") {

            echo "<td>" . $toSearch . "</td>";
            echo "<td>" . $sortedObj[$i]->getName() . "</td>";
            echo "<td>" . $sortedObj[$i]->getTotalVotos() . "</td>";
            echo "<td>" . $sortedObj[$i]->getTotalEscanos() . "</td>";
            echo "</tr>";
        } else {
            if ($sortedObj[$i]->getProvincias() == $toSearch && $sortedObj[$i]->getProvincias() != null) {
                echo "<td>" . $sortedObj[$i]->getProvincias() . "</td>";
                echo "<td>" . $sortedObj[$i]->getPartidos() . "</td>";
                echo "<td>" . $sortedObj[$i]->getResultados() . "</td>";
                echo "<td>" . $sortedObj[$i]->getEscanos() . "</td>";
                echo "</tr>";
            }
            if ($sortedObj[$i]->getPartidos() == $toSearch && $sortedObj[$i]->getProvincias() != null) {
                echo "<td>" . $sortedObj[$i]->getProvincias() . "</td>";
                echo "<td>" . $sortedObj[$i]->getPartidos() . "</td>";
                echo "<td>" . $sortedObj[$i]->getResultados() . "</td>";
                echo "<td>" . $sortedObj[$i]->getEscanos() . "</td>";

            }
        }

    }
    echo "</table>";

}

function RepartirEscaños($provincia, $arrayCircumscripcion)//funcion que aplica la laey d'Hont a todos los
// partidos de la provincia introducida y le asigna el valor en la posicion escaños


{
    global $arrayProvincias;
    $totalEscanos = getDelegatesByProvince($arrayProvincias, $provincia);//numero total de escaños de la provincia
    $arrayVotos = getVotesByProvinces($arrayCircumscripcion, $provincia);//array con todos los votos de los partidos de la provincia
    $minVotos = array_sum($arrayVotos) * 0.03;
    $divArrayVotos = $arrayVotos;
    $posicion = 0;

    $escanos = [];
    for ($i = 0; $i < count($arrayVotos); $i++) {
        $escanos[] = 0;
    }//rellenamos el array de escaños con el mismo nº de posiciones que tiene arrayVotos

    for ($i = 0; $i < $totalEscanos; $i++) {
        $mayor = 0;
        for ($j = 0; $j < count($arrayVotos); $j++) {
            //sacamos la posicion y el mayor valor de $divarrayVotos
            if ($divArrayVotos[$j] > $mayor && $arrayVotos[$j] > $minVotos) {
                $mayor = $divArrayVotos[$j];
                $posicion = $j;
            }
        }
        $escanos[$posicion] += 1;
        $divArrayVotos[$posicion] = $arrayVotos[$posicion] / ($escanos[$posicion] + 1);
        //dividimos $arrayVotos entre el numero de escaños de esa posicion +1
    }

    $posicion = 0;
    //si no igualamos esta variable a 0 empezará a colocar los escaños a partir-
    // de la posicion del partido que se haya llevado el ultimo escaño.

    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        //asigna los escaños al array de objetos
        if ($arrayCircumscripcion[$i]->getProvincias() == $provincia) {

            $arrayCircumscripcion[$i]->setEscanos($escanos[$posicion]);
            $posicion++;
        }
    }
}

function getDelegatesByProvince($arrayProvincias, $provincia)//Saca el numero total de escaños de la provincia introducida
{

    for ($i = 0; $i < count($arrayProvincias); $i++) {//Sacamos el numero total de escaños de la provincia seleccionada
        if ($provincia == $arrayProvincias[$i]->getname()) {
            $totalEscaños = $arrayProvincias[$i]->getDelegates();
        }
    }
    return $totalEscaños;
}//devuelve las delegaciones de la provincia introducida

function getVotesByProvinces($arrayCircumscripcion, $provincia)//Saca un array del numero de votos por partido de la provincia introducida
{
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {//Sacamos el numero total de escaños de la provincia seleccionada
        if ($provincia == $arrayCircumscripcion[$i]->getProvincias()) {
            $votosProvincia[] = $arrayCircumscripcion[$i]->getResultados();
        }
    }

    return $votosProvincia;
}

function getAllEscanos($arrayProvincias, $arrayCircumscripcion)
{
    for ($i = 0; $i < count($arrayProvincias); $i++) {
        RepartirEscaños($arrayProvincias[$i]->getName(), $arrayCircumscripcion);
    }
}

function rellenarPartidos($arrayPartidos)
//rellena los parametros de TotalVotos y TotalEscanos de la clase de partidos a 0
// para poder hacer operaciones con ellos
{
    for ($i = 0; $i < count($arrayPartidos); $i++) {
        $arrayPartidos[$i]->setTotalVotos(0);
        $arrayPartidos[$i]->setTotalEscanos(0);
    }
}

function totalPartido($arrayCircumscripcion, $arrayPartidos)
//asigna el tota de votos y escaños de todos los partidos en los parametros  TotalVotos y TotalEscanos
{
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        $totalVotos = 0;
        $totalEscanos = 0;
        for ($j = 0; $j < count($arrayPartidos); $j++) {
            if ($arrayCircumscripcion[$i]->getPartidos() == $arrayPartidos[$j]->getName()) {
                $totalVotos = $arrayPartidos[$j]->getTotalVotos();
                $totalEscanos = $arrayPartidos[$j]->getTotalEscanos();

                $totalVotos += $arrayCircumscripcion[$i]->getResultados();
                $totalEscanos += $arrayCircumscripcion[$i]->getEscanos();

                $arrayPartidos[$j]->setTotalVotos($totalVotos);
                $arrayPartidos[$j]->setTotalEscanos($totalEscanos);
            }
        }

    }
}

//getAllEscanos($arrayProvincias, $arrayCircumscripcion);
if (isset($_GET["sortingCriteria"]) || isset($_GET["sortingCriteriaProvincias"])) {

    $criteria = $_GET["sortingCriteria"];
    $criteria2 = $_GET["sortingCriteriaProvincias"];
    if ($_GET["sortingCriteria"] == "Generales") {

        rellenarPartidos($arrayPartidos);
        totalPartido($arrayCircumscripcion, $arrayPartidos);
        tabla($criteria, $arrayPartidos);
    }

    if ($_GET["sortingCriteria"] == "Provincia") {

        optionSelected($arrayProvincias, $criteria);

    }

    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        if ($_GET["sortingCriteriaProvincias"] == $arrayCircumscripcion[$i]->getProvincias()) {
            //recibe el valor introducido por la nav bar
            //envia el valor recibido a una funcion que creara un tabla con los datos de esa provincia.
            tabla($arrayCircumscripcion[$i]->getProvincias(), $arrayCircumscripcion);

            break;
        }
    }

    if ($_GET["sortingCriteria"] == "Partido") {

        optionSelected($arrayPartidos, $criteria);
    }
    for ($i = 0; $i < count($arrayCircumscripcion); $i++) {
        if ($_GET["sortingCriteriaProvincias"] == $arrayCircumscripcion[$i]->getPartidos()) {
            tabla($arrayCircumscripcion[$i]->getPartidos(), $arrayCircumscripcion);

            break;
        }
    }
}
?>
</body>