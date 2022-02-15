<?php
error_reporting(E_ERROR | E_PARSE);

if (isset($_GET['hotelId'])) {

    $api = "http://localhost/PHP/AHernandez/DataBases/Hoteles/Controladores/c_habitaciones.php?hotelId=" . $_GET['hotelId'];

    $api = json_decode(file_get_contents($api));

    $hotel = $api->hotel;
    $habitaciones=$api->habitaciones;

    include_once("../Vista/habitacion.php");


}