<?php
include_once ("../modelo/usuario.php");
if (isset($_POST['password'])&& isset($_POST['email'])){
    if (comprobarUsuario($_POST['email'],$_POST['password'])){
        header("Location: c_main.php");
    }
}


include_once ("../vista/logIn.php");