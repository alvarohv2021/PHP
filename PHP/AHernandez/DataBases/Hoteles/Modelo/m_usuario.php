<?php
include_once("../BD/BD.php");
include_once("../Entidades/Usuario.php");

function insertarUsuarios($nombre, $email, $password)
{
    global $coon;

    $usuario=comprobarUsuario($nombre, $password);

    if ($usuario->getId()==0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into Usuarios(Email,Username,Pasword) values ('" . $email . "','" . $nombre . "','" . $password . "')";
        $coon->query($sql);
        return true;
    } else {
        return comprobarUsuario($nombre, $password);
    }
}