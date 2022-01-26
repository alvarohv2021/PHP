<?php
include_once("../Modelo/modelo.php");
session_start();

//Paso la cadena string que contiene la fecha a formato Unix,lo cual me da
//un int que puedo comparar
$idUsuario = idUsuario($_SESSION['usuario']);
$habitacion = objHabitacion($_GET['idHabitacion']);

if (isset($_POST['entrada'])) {
    $entrada = strtotime($_POST['entrada']);
    $salida = strtotime($_POST['salida']);

    if ($entrada >= $salida) {
        $fecha = false;
    } else if (comprobarReserva($_POST['entrada'], $_POST['salida'], $habitacion->getId())) {
        $pillada = true;
    } else {
        $fecha=true;
        reservar($habitacion->getId(), $idUsuario, $entrada, $salida);
    }


}
include_once("../Vista/reserva.php")
?>