<?php
require_once("../BD/BD.php");
require_once("../Entidades/Hotel.php");
require_once("../Entidades/Habitacion.php");

function listaObjsHotel()
{
    global $coon;

    $query = $coon->query("SELECT * FROM hoteles");
    $arrayHoteles = $query->fetch_all(MYSQLI_ASSOC);

    $arrayObjsHoteles = [];

    for ($i = 0; $i < count($arrayHoteles); $i++) {

        $arrayObjsHoteles[$i] = new Hotel($arrayHoteles[$i]["id"], $arrayHoteles[$i]["nombre"]
            , $arrayHoteles[$i]["ubicacion"]
            , $arrayHoteles[$i]["valoracion"], $arrayHoteles[$i]["imagen"]);

    }

    return $arrayObjsHoteles;
}

function objHotel($hotelId)
{
    global $coon;
    $query = $coon->query("SELECT * FROM hoteles where id =" . $hotelId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    $habitaciones = new hotel($temp['id'], $temp['nombre'],
        $temp['ubicacion'], $temp['valoracion'], $temp['imagen']);


    return $habitaciones;
}

function arrayObjsHabitacion($hotelId)
{
    global $coon;
    $query = $coon->query("SELECT * FROM habitaciones where id_hotel =" . $hotelId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($temp); $i++) {
        $habitaciones[$i] = new Habitacion($temp[$i]['id'], $hotelId, $temp[$i]['numero_huespedes'],
            $temp[$i]['numero_habitacion'], $temp[$i]['imagen'], $temp[$i]['precio']);
    }

    return $habitaciones;
}



function idUsuario($nombre)
{

    global $coon;
    $query = $coon->query("Select id from Usuarios where Username='" . $nombre . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    return $temp['id'];

}