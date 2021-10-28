<?php

class escaños{
    private $partido,$provincia,$votos;

    public function __construct($partido, $provincia, $votos)
    {
        $this->partido = $partido;
        $this->provincia = $provincia;
        $this->votos = $votos;
    }

    public function getPartido()
    {
        return $this->partido;
    }

    public function setPartido($partido)
    {
        $this->partido = $partido;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getVotos()
    {
        return $this->votos;
    }

    public function setVotos($votos)
    {
        $this->votos = $votos;
    }

}

?>
