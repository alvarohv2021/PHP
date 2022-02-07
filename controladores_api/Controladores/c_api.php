<?php
include_once ("../BD/BD.php");

global $coon;
$query=$coon->query("select * from countries");
$temp=$query->fetch_all(MYSQLI_ASSOC);
//var_dump($temp);

echo json_encode($temp);
