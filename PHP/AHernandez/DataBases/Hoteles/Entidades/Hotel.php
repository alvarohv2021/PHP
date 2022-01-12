<?php

class Hotel
{
private $id,$nombre,$precio,$ubicacion,$valoracion;

    /**
     * @param $nombre
     * @param $precio
     * @param $ubicacion
     * @param $valoracion
     */
    public function __construct($id,$nombre, $precio, $ubicacion, $valoracion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->ubicacion = $ubicacion;
        $this->valoracion = $valoracion;
    }

}