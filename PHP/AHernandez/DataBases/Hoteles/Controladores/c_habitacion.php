<?php
if (isset($_GET['habitacionId'])) {

    include_once("../Modelo/modelo.php");
    $hotel = objHotel($_GET['habitacionId']);

    include_once("../Vista/habitacion.php");

}