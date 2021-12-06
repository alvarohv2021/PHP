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

}