<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);
$resultados = json_decode(file_get_contents($api_url . "results"), true);

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
echo "<table>";
for ($i = 0; $i < count($resultados); $i++) {
    $resultado_obj[$i] = new Circumscripcion($resultados[$i]['party'], $resultados[$i]['district'], $resultados[$i]['votes']);
    echo "<tr>";
    for ($j = 0; $j < 1; $j++) {
        echo "<td>" . $resultado_obj[$i]->getProvincias() . "</td>";
        echo "<td>" . $resultado_obj[$i]->getPartidos() . "</td>";
        echo "<td>" . $resultado_obj[$i]->getResultados() . "</td>";

    }
    echo "</tr>";
}
echo "</table>";
?>
