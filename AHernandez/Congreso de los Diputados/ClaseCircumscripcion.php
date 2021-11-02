<?php
class Circumscripcion
{

    private $partidos, $provincias, $resultados,$escaños;

    public function __construct($partidos, $provincias, $resultados)
    {
        $this->partidos = $partidos;
        $this->provincias = $provincias;
        $this->resultados = $resultados;
    }

    public function getEscaños()
    {
        return $this->escaños;
    }

    public function setEscaños($escaños)
    {
        $this->escaños = $escaños;
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
}//Clase que nos creara objetos
?>