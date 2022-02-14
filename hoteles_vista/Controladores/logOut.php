<?php
session_start();
//***************cierre de sesion***************
if (isset($_GET['sesion'])) {
    if ($_GET['sesion'] == 'false') {
        $_SESSION['Usuario'] = null;
    }
}
include_once ('../Controladores/llamar_api.php');