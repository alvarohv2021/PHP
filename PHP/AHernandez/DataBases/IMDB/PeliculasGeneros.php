<?php

class PeliculaGenero
{
    private $id, $idPelicula, $idGenero;

    public function __construct($id, $IdPelicula, $IdGenero)
    {
        $this->id = $id;
        $this->idPelicula = $IdPelicula;
        $this->idGenero = $IdGenero;
    }

}