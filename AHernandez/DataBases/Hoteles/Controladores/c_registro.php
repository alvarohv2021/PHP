<?php
include_once("../Modelo/m_usuario.php");

if (isset($_POST['password'])) {
    if ($_POST['password'] == $_POST['cPassword']) {
        $cPassword = false;

        if (isset($_POST['name']) & isset($_POST['email'])) {
            $usuario = insertarUsuarios($_POST['name'], $_POST['email'], $_POST['password']);
        }

    } else {
        return $cPassword = true;
    }
}
?>