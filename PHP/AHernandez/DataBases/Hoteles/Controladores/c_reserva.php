<?php
include_once("../Modelo/modelo.php");
session_start();

$idUsuario = idUsuario($_SESSION['usuario']);
$habitacion = objHabitacion($_GET['idHabitacion']);

if (isset($_POST['entrada'])){
$entrada=strtotime($_POST['entrada']);
$salida=strtotime($_POST['salida']);

    if ($entrada>=$salida){
        $fecha=false;
    }else{
        $fecha=true;
    }
}
include_once("../Vista/reserva.php")
?>