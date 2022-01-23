<?php
if (isset($_GET['habitacionId'])) {

    include_once("../Modelo/modelo.php");
    $hotel = objHotel($_GET['habitacionId']);

    //cierre de sesion***************
    if (isset($_GET['sesion'])) {
        if ($_GET['sesion'] == 'false') {
            $_SESSION['usuario'] = null;
        }
    }

    if (isset($_POST['salida']) && isset($_POST['entrada'])) {
        $entrada=$_POST['entrada'];
        $salida=$_POST['salida'];
        if ($entrada<$salida){
            echo "Entrada: ",$_POST['entrada'],"<br>Salida: ",$_POST['salida'];
        }else{
            $fechaMal=true;
        }
    }
    include_once("../Vista/habitacion.php");

}