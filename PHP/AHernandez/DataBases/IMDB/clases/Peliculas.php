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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getEstreno()
    {
        return $this->estreno;
    }

    public function setEstreno($estreno): void
    {
        $this->estreno = $estreno;
    }

    public function getTrailer()
    {
        return $this->Trailer;
    }

    public function setTrailer($Trailer): void
    {
        $this->Trailer = $Trailer;
    }

    public function getFoto()
    {
        return $this->Foto;
    }

    public function setFoto($Foto): void
    {
        $this->Foto = $Foto;
    }

    public function getCalificacion()
    {
        return $this->Calificacion;
    }

    public function setCalificacion($Calificacion): void
    {
        $this->Calificacion = $Calificacion;
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