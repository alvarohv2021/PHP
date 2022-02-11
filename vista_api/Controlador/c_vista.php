<?php
$api="http://localhost/controladores_api/Controladores/c_api.php";
$mostrar=json_decode(file_get_contents($api));

var_dump($mostrar[0]->{'id'});

include_once("../Vista/llamada.php");
