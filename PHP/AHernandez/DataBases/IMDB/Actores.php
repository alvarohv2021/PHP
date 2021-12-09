<?php

class Actor
{
    private $id, $name, $nacimiento, $imagen;

    public function __construct($id, $name, $nacimiento, $imagen)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nacimiento = $nacimiento;
        $this->imagen = $imagen;
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

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($nacimiento): void
    {
        $this->nacimiento = $nacimiento;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }


}