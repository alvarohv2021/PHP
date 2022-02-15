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

}
?>
