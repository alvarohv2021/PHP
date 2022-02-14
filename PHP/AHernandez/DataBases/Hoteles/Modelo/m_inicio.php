<?php
include_once("../BD/BD.php");
include_once("../Entidades/Usuario.php");

function comprobarUsuario($nombre, $password)
{
    global $coon;

    $query = $coon->query("SELECT * FROM Usuarios where Username ='" . $nombre . "'");

    //comprobacion del numero de filas que devuleve la query
    if ($query->num_rows == 0) {
        return new Usuario(0,"-","-","-");
    }

    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];
    //hasheamos la pasword y la comprobamos con la que hay en la base de datos haseada
    $password_hased = $temp['Pasword'];

    if (password_verify($password, $password_hased) == true) {
        return new Usuario($temp['id'], $temp['Username'], $temp['Pasword'], $temp['Email']);
    } else {
        return new Usuario(0,"-","-","-");
    }
}