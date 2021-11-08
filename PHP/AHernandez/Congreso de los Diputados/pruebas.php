<?php
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";

$partidos = json_decode(file_get_contents($api_url . "parties"), true);
$provincias = json_decode(file_get_contents($api_url . "districts"), true);
$resultados = json_decode(file_get_contents($api_url . "results"), true);
$arrayObjetos = crearObjeto($resultados);//array de objetos

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
$soloProvincias=provincias($provincias);
?>