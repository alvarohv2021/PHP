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
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * @return mixed
     */
    public function getNumeroHuespedes()
    {
        return $this->numeroHuespedes;
    }

    /**
     * @return mixed
     */
    public function getNumeroHabitacion()
    {
        return $this->numeroHabitacion;
    }

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }



}