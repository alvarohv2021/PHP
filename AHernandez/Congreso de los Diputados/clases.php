<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);
$resultados = json_decode(file_get_contents($api_url . "results"), true);
$arrayObjetos = crearObjeto($resultados);//array de objetos
$soloProvincias = provincias($provincias);//devulve un array que solo contiene las provincias
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
            <form class="d-flex" action="clases.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Sorting criteria</option>
                    <option value="Circumscripcion">Circumscripcion</option>
                    <option value="Partidos">Partidos</option>
                    <?php //Pone todas las provincias como options dentro de la nav
                    global $soloProvincias;
                    for ($i = 0; $i < count($soloProvincias); $i++) {
                        echo "<option value='".$soloProvincias[$i]."'>".$soloProvincias[$i]."</option>";
                    }
                    ?>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);
$resultados = json_decode(file_get_contents($api_url . "results"), true);
$arrayObjetos = crearObjeto($resultados);//array de objetos
$soloProvincias = provincias($provincias);//devulve un array que solo contiene las provincias

class Circumscripcion
{

    private $partidos, $provincias, $resultados;

    public function __construct($partidos, $provincias, $resultados)
    {
        $this->partidos = $partidos;
        $this->provincias = $provincias;
        $this->resultados = $resultados;
    }

    public function getPartidos()
    {
        return $this->partidos;
    }

    public function setPartidos($partidos)
    {
        $this->partidos = $partidos;
    }

    public function getProvincias()
    {
        return $this->provincias;
    }

    public function setProvincias($provincias)
    {
        $this->provincias = $provincias;
    }

    public function getResultados()
    {
        return $this->resultados;
    }

    public function setResultados($resultados)
    {
        $this->resultados = $resultados;
    }
}

echo ' <link rel="stylesheet" type="text/css" href="tablas.css" title="style" />';
function crearObjeto($resultados)//creamos el array de objetos y le introducimos valores
{
    for ($i = 0; $i < count($resultados); $i++) {
        $resultado_obj[$i] = new Circumscripcion($resultados[$i]['party'], $resultados[$i]['district'], $resultados[$i]['votes']);
    }
    return $resultado_obj;
}

function provincias($provincias)
{
    for ($i = 0; $i < count($provincias); $i++) {
        $soloProvincias[$i] = $provincias[$i]['name'];
    }
    return $soloProvincias;
}


if (isset($_GET["sortingCriteria"])) {

    if ($_GET["sortingCriteria"] == "Circumscripcion") {
        $circumscripcion = ordenarCir($arrayObjetos);

    } elseif ($_GET["sortingCriteria"] == "Partidos") {
        $ordenado = ordenarCircumscripcion($partidos, $provincias);
    }
}
?>
