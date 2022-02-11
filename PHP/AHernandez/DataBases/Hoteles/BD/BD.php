<?php
$server="localhost";
$user="root";
$password="2609Ahv*";
$bdName="Hoteles";

$coon= new mysqli($server,$user,$password,$bdName);

if ($coon->connect_error) {
    die("Connection failed: " . $coon->connect_error);
}