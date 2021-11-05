<?php

class Partidos{
    private $id,$name,$acronym,$logo,$colour,$totalVotos,$totalEscanos;

    public function __construct($id, $name, $acronym, $logo, $colour)
    {
        $this->id = $id;
        $this->name = $name;
        $this->acronym = $acronym;
        $this->logo = $logo;
        $this->colour = $colour;
    }

    public function getTotalVotos()
    {
        return $this->totalVotos;
    }

    public function setTotalVotos($totalVotos): void
    {
        $this->totalVotos = $totalVotos;
    }

    public function getTotalEscanos()
    {
        return $this->totalEscanos;
    }

    public function setTotalEscanos($totalEscanos): void
    {
        $this->totalEscanos = $totalEscanos;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAcronym()
    {
        return $this->acronym;
    }

    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getColour()
    {
        return $this->colour;
    }

    public function setColour($colour)
    {
        $this->colour = $colour;
    }



}

?>
