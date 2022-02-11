<?php
$api="http://localhost/PHP/AHernandez/DataBases/Hoteles/Controladores/crear_api.php";
$arrayObjsHoteles=json_decode(file_get_contents($api));

include_once("../Vista/lista.php");