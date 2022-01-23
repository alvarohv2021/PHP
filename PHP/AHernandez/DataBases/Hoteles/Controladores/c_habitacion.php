<?php
if (isset($_GET['habitacionId'])) {

    include_once("../Modelo/modelo.php");
    $hotel = objHotel($_GET['habitacionId']);

    //cierre de sesion***************
    if (isset($_GET['sesion'])){
        if ($_GET['sesion']=='false'){
            $_SESSION['usuario']=null;
        }
    }

    include_once("../Vista/habitacion.php");

}