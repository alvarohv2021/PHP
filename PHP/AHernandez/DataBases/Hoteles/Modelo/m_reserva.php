<?php
function comprobarReserva($entrada, $salida, $idHabitacion)
{
    global $coon;

    //Select que comprueba si hay una reserva entre las fechas introducidas sobre la habitacion especificada
    $query = $coon->query("select * from reserva where idHabitacion=" . $idHabitacion . " and 
    Entrada between '" . $entrada . "' and '" . $salida . "' or
    Salida between '" . $entrada . "' and '" . $salida . "' or
    '" . $entrada . "' between Entrada and Salida");

    if ($query->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}

function reservar($idHabitacion, $idUsuario, $entrada, $salida)
{
    global $coon;

    $entrada = date("Y-m-d", $entrada);
    $salida = date("Y-m-d", $salida);

    $query = $coon->query("insert into reserva (idHabitacion,idUsuario,Entrada,Salida) values (" . $idHabitacion . "," . $idUsuario . ",'" . $entrada . "','" . $salida . "')");
}