<?php
include_once("../Modelo/m_inicio.php");

if (isset($_GET['userName'])&& isset($_GET['password'])){
    $usuario=comprobarUsuario($_GET['userName'], $_GET['password']);
    echo json_encode($usuario);
}
?>