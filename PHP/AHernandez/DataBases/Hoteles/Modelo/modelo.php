<?php
require_once("../BD/BD.php");
require_once("../Entidades/Hotel.php");
session_start();

function listaObjsHotel()
{
    global $conn;

    $query = $conn->query("SELECT * FROM hoteles");
    $arrayHoteles = $query->fetch_all(MYSQLI_ASSOC);

    $arrayObjsHoteles = [];

    for ($i = 0; $i < count($arrayHoteles); $i++) {

        $arrayObjsHoteles[$i] = new Hotel($arrayHoteles[$i]["id"], $arrayHoteles[$i]["nombre"]
            , $arrayHoteles[$i]["precio"], $arrayHoteles[$i]["ubicacion"]
            , $arrayHoteles[$i]["valoracion"], $arrayHoteles[$i]["imagen"]);

    }

    return $arrayObjsHoteles;
}

function objHotel($hotelId)
{
    global $conn;
    $query = $conn->query("SELECT * FROM hoteles where id =" . $hotelId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    $hotel = new Hotel($temp['id'], $temp['nombre'], $temp['precio'], $temp['ubicacion']
        , $temp['valoracion'], $temp['imagen']);


    return $hotel;
}

function comprobarUsuario($nombre, $password)
{
    global $conn;

    $query = $conn->query("SELECT Username,Pasword FROM Usuarios where Username ='" . $nombre . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    $password_hased = $temp['Pasword'];

    if (password_verify($password, $password_hased) == true) {
        $_SESSION['usuario'] = $nombre;
        return true;
    } else {
        return false;
    }
}