<?php
$server="sql480.main-hosting.eu";
$user="u850300514_ahernandez";
$password="x43470242N";
$bdName="u850300514_ahernandez";

$conn= new mysqli($server,$user,$password,$bdName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}