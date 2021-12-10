<?php

class Actor
{
    private $id, $name, $nacimiento, $Foto;

    public function __construct($id, $name, $nacimiento, $Foto)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nacimiento = $nacimiento;
        $this->Foto = $Foto;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getFoto()
    {
        return $this->Foto;
    }

    public function setFoto($Foto): void
    {
        $this->Foto = $Foto;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($nacimiento): void
    {
        $this->nacimiento = $nacimiento;
    }


}