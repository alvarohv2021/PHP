<?php
include_once ("../modelo/modelo.php");
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    if (registarUsuario($_POST['email'], $_POST['password'])) {
        comprobarUsuario($_POST['email'], $_POST['password']);
        header("Location: ../vista/c_main.php");
    }
}
include_once("../vista/registro.php");
?>