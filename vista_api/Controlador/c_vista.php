<?php
$api="http://localhost/controladores_api/Controladores/c_api.php";
$mostrar=json_decode(file_get_contents($api),true);
var_dump($mostrar);

include_once("../Vista/llamada.php");