<?php

class Hotel
{
private $id,$nombre,$precio,$ubicacion,$valoracion,$imagen;

    /**
     * @param $nombre
     * @param $precio
     * @param $ubicacion
     * @param $valoracion
     */
    public function __construct($id,$nombre, $precio, $ubicacion, $valoracion,$imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->ubicacion = $ubicacion;
        $this->valoracion = $valoracion;
        $this->imagen=$imagen;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
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