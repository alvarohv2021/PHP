<?php
include_once("../Entidades/hotel.php");
include_once("../Modelo/modelo.php");
session_start();

$arrayObjsHoteles = listaObjsHotel();
if (isset($_GET['sesion'])){
    if ($_GET['sesion']=='false'){
        $_SESSION['usuario']=null;
    }
}
include_once("../Vista/lista.php");
?>