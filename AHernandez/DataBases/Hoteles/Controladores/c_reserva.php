<?php
include_once("../Modelo/m_reserva.php");
include_once("../Modelo/modelo.php");
session_start();

//Paso la cadena string que contiene la fecha a formato Unix,lo cual me da
//un int que puedo comparar
$usuario = $_GET['usuario'];
$habitacion = $_GET['habitacion'];

if (isset($_POST['entrada'])) {
    $entrada = strtotime($_POST['entrada']);
    $salida = strtotime($_POST['salida']);

    if ($entrada >= $salida) {
        $fecha = false;
    } else if (comprobarReserva($_POST['entrada'], $_POST['salida'], $habitacion->getId())) {
        $fecha = true;
        $pillada = true;
    } else {
        $fecha = true;
        reservar($habitacion->getId(), $usuario->getId(), $entrada, $salida);
    }


}

include_once("../Vista/reserva.php")
?>