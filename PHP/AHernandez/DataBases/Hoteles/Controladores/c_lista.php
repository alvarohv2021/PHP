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

if (isset($_POST['name'])&& isset($_POST['password'])){
    if (comprobarUsuario($_POST['name'],$_POST['password'])==false){
        header("Location: ../Controladores/c_inicio.php");
    }
}

include_once("../Vista/lista.php");
?>