<?php
include_once("../Modelo/modelo.php");
if (isset($_POST['password'])) {
    if ($_POST['password'] == $_POST['cPassword']) {
        $cPassword = false;

        if (isset($_POST['name']) & isset($_POST['email'])) {
            $insertado = insertarUsuarios($_POST['name'], $_POST['email'], $_POST['password']);
            if ($insertado) {
                header("Location: ../Controladores/c_lista.php");
            } else {
                $alertRegistro = true;
            }
        }

    } else {
        $cPassword = true;
    }
}
include_once("../Vista/registro.php");
?>