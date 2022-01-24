<?php
require_once("../BD/BD.php");
require_once("../Entidades/Hotel.php");
require_once("../Entidades/Habitacion.php");

function listaObjsHotel()
{
    global $conn;

    $query = $conn->query("SELECT * FROM hoteles");
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
    global $conn;
    $query = $conn->query("SELECT * FROM hoteles where id =" . $hotelId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    $habitaciones = new hotel($temp['id'], $temp['nombre'],
        $temp['ubicacion'], $temp['valoracion'], $temp['imagen']);


    return $habitaciones;
}

function arrayObjsHabitacion($hotelId)
{
    global $conn;
    $query = $conn->query("SELECT * FROM habitaciones where id_hotel =" . $hotelId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($temp); $i++) {
        $habitaciones[$i] = new Habitacion($temp[$i]['id'], $hotelId, $temp[$i]['numero_huespedes'],
            $temp[$i]['numero_habitacion'], $temp[$i]['id_reserva'], $temp[$i]['imagen'], $temp[$i]['precio']);
    }

    return $habitaciones;
}

function comprobarUsuario($nombre, $password)
{
    global $conn;

    $query = $conn->query("SELECT Username,Pasword FROM Usuarios where Username ='" . $nombre . "'");

    //comprobacion del numero de filas que devuleve la query
    if ($query->num_rows == 0) {
        return false;
    }
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    //hasheamos la pasword y la comprobamos con la que hay en la base de datos haseada
    $password_hased = $temp['Pasword'];
    if (password_verify($password, $password_hased) == true) {
        $_SESSION['usuario'] = $nombre;
        return true;
    } else {
        return false;
    }
}

function insertarUsuarios($nombre, $email, $password)
{
    global $conn;

    if (!comprobarUsuario($nombre, $password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into Usuarios(Email,Username,Pasword) values ('" . $email . "','" . $nombre . "','" . $password . "')";
        $conn->query($sql);
        $_SESSION['usuario'] = $nombre;
        return true;
    } else {
        return false;
    }
}