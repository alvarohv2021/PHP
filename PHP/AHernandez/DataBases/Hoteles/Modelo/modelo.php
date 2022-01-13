<?php
require_once ("../BD/BD.php");
require_once ("../Entidades/Hotel.php");

function crearObjHotel(){
    global $conn;

    $query =$conn->query("SELECT * FROM hoteles");
    $arrayHoteles=$query->fetch_all(MYSQLI_ASSOC);

    $arrayObjHoteles=[];

    for ($i=0;$i<count($arrayHoteles);$i++){

        $arrayObjHoteles[$i]=new Hotel($arrayHoteles[$i]["id"],$arrayHoteles[$i]["nombre"]
        ,$arrayHoteles[$i]["precio"],$arrayHoteles[$i]["ubicacion"]
            ,$arrayHoteles[$i]["valoracion"],$arrayHoteles[$i]["imagen"]);

    }

    return $arrayHoteles;
}