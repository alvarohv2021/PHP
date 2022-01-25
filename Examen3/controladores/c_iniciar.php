<?php
include_once("../modelo/modelo.php");
session_start();

if (comprobarUsuario($_POST['email'], $_POST['password'])) {
    header("Location: ../vista/c_main.php");
}

include_once("../vista/inicio.php");
?>