<?php

class Pelicula
{

    private $id, $name, $estreno, $Director, $Trailer, $Foto, $Calificacion;

    public function __construct($id, $name, $estreno, $Director, $Trailer, $Foto, $Calificacion)
    {
        $this->id = $id;
        $this->name = $name;
        $this->estreno = $estreno;
        $this->Director = $Director;
        $this->Trailer = $Trailer;
        $this->Foto = $Foto;
        $this->Calificacion = $Calificacion;
        $this->Actores = [];
        $this->Generos = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getDirector()
    {
        return $this->Director;
    }

    public function setDirector($Director): void
    {
        $this->Director = $Director;
    }

    public function getActores(): array
    {
        return $this->Actores;
    }

    public function setActores(array $Actores): void
    {
        $this->Actores = $Actores;
    }

    public function getGeneros(): array
    {
        return $this->Generos;
    }

    public function setGeneros(array $Generos): void
    {
        $this->Generos = $Generos;
    }


}