<?php
session_start();
$api = "http://localhost/PHP/AHernandez/DataBases/Hoteles/Controladores/c_inicio.php?userName=" . $_POST['name'] . "&password=" . $_POST['password'];

$usuario = json_decode(file_get_contents($api));

if (isset($usuario)&& $usuario->id!=0) {

    $_SESSION['Usuario'] = $usuario;
    header("Location: ../Controladores/llamar_api.php");

}
include_once("../Vista/inicio.php");