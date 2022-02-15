<?php
if (isset($_POST['password'])) {
    if ($_POST['password'] == $_POST['cPassword']) {
        $cPassword = false;

        if (isset($_POST['name']) & isset($_POST['email'])) {

            if ($usuario) {


            } else {
                $alertRegistro = true;
            }
        }

    } else {
        $cPassword = true;
    }
}