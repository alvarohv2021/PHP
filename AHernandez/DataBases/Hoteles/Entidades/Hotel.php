<?php

class Hotel
{
    public $id, $nombre, $ubicacion, $valoracion, $imagen;

    /**
     * @param $nombre
     * @param $precio
     * @param $ubicacion
     * @param $valoracion
     */
    public function __construct($id, $nombre, $ubicacion, $valoracion, $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->valoracion = $valoracion;
        $this->imagen = $imagen;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function getValoracion()
    {
        return $this->valoracion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
}