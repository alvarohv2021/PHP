<?php
$server="localhost";
$user="root";
$password="2609Ahv*";
$bdName="Hoteles";

$conn= new mysqli($server,$user,$password,$bdName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}