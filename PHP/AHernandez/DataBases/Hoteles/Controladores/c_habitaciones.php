<?php
if (isset($_GET['hotelId'])) {

    include_once("../Modelo/modelo.php");
    $habitaciones = arrayObjsHabitacion($_GET['hotelId']);
    $hotel = objHotel($_GET['hotelId']);


    $devolver = array(
        "habitaciones" => $habitaciones,
        "hotel" => $hotel
    );

    echo json_encode($devolver);

    /* if (isset($_POST['salida']) && isset($_POST['entrada'])) {
         $entrada=$_POST['entrada'];
         $salida=$_POST['salida'];
         if ($entrada<$salida){
             echo "Entrada: ",$_POST['entrada'],"<br>Salida: ",$_POST['salida'];
         }else{
             $fechaMal=true;
         }
     }*/


}
?>