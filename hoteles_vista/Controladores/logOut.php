<?php
//***************cierre de sesion***************
if (isset($_GET['sesion'])) {
    if ($_GET['sesion'] == 'false') {
        $_SESSION['usuario'] = null;
    }
}