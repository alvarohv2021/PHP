<?php
include_once ("../modelo/usuario.php");

if (isset($_POST['password'])&& isset($_POST['email'])){
    registrarUsuario($_POST['email'],$_POST['password']);
}

include_once ("../vista/SignIn.php");

