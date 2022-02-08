<?php
include_once ("../BD/BD.php");

global $coon;
$query=$coon->query("select * from hoteles");
$temp=$query->fetch_all(MYSQLI_ASSOC);


echo json_encode($temp);