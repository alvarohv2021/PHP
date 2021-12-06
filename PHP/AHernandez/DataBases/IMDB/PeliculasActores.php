<?php

class PeliculaActor
{
    private $id, $idPelicula, $idActor;

    public function __construct($id, $IdPelicula, $IdActor)
    {
        $this->id = $id;
        $this->idPelicula = $IdPelicula;
        $this->idActor = $IdActor;
    }
}