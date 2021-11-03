<?php
class Circumscripcion
{

    private $partidos, $provincias, $resultados,$escanos;

    public function __construct($partidos, $provincias, $resultados)
    {
        $this->partidos = $partidos;
        $this->provincias = $provincias;
        $this->resultados = $resultados;
    }

    public function getEscanos()
    {
        return $this->escanos;
    }

    public function setEscanos($escaños)
    {
        $this->escanos = $escaños;
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