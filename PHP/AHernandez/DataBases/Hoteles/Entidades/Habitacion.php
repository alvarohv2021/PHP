<?php

class Habitacion
{
private $id,$idHotel,$numeroHuespedes,$numeroHabitacion,$idReserva,$imagen,$precio;

    /**
     * @param $id
     * @param $idHotel
     * @param $numeroHuespedes
     * @param $numeroHabitacion
     * @param $idReserva
     * @param $imagen
     * @param $precio
     */

    public function __construct($id, $idHotel, $numeroHuespedes, $numeroHabitacion, $idReserva, $imagen, $precio)
    {
        $this->id = $id;
        $this->idHotel = $idHotel;
        $this->numeroHuespedes = $numeroHuespedes;
        $this->numeroHabitacion = $numeroHabitacion;
        $this->idReserva = $idReserva;
        $this->imagen = $imagen;
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * @param mixed $idHotel
     */
    public function setIdHotel($idHotel): void
    {
        $this->idHotel = $idHotel;
    }

    /**
     * @return mixed
     */
    public function getNumeroHuespedes()
    {
        return $this->numeroHuespedes;
    }

    /**
     * @param mixed $numeroHuespedes
     */
    public function setNumeroHuespedes($numeroHuespedes): void
    {
        $this->numeroHuespedes = $numeroHuespedes;
    }

    /**
     * @return mixed
     */
    public function getNumeroHabitacion()
    {
        return $this->numeroHabitacion;
    }

    /**
     * @param mixed $numeroHabitacion
     */
    public function setNumeroHabitacion($numeroHabitacion): void
    {
        $this->numeroHabitacion = $numeroHabitacion;
    }

    /**
     * @return int
     */
    public function getIdReserva(): int
    {
        return $this->idReserva;
    }

    /**
     * @param int $idReserva
     */
    public function setIdReserva(int $idReserva): void
    {
        $this->idReserva = $idReserva;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

}