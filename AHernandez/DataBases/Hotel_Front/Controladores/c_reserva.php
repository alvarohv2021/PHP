<?php
session_start();
$api="http://localhost/PHP/AHernandez/DataBases/Hoteles/Controladores/c_reserva.php?usuario=".$_SESSION['Usuario']."&habitacion=".$_GET['habitacion'];

json_decode(file_get_contents($api));

include_once("../Vista/reserva.php")
?>