<?php
$servername = "localhost";
$username = "root";
$password = "2609Ahv*";
$dbname = "Mallorcasa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query_countries = "Select * FROM countries";
$result_countries = $conn->query($query_countries);
$countries_asociativo = $result_countries->fetch_all(MYSQLI_ASSOC);

$query_states = "Select * FROM states";
$result_states = $conn->query($query_states);
$states_asociativo = $result_states->fetch_all(MYSQLI_ASSOC);

$query_cities = "Select * FROM cities";
$result_cities = $conn->query($query_cities);
$cities_asociativo = $result_cities->fetch_all(MYSQLI_ASSOC);

$query_neighborhoods = "Select * FROM neighborhoods";
$result_neighborhoods = $conn->query($query_neighborhoods);
$neighborhoods_asociativo = $result_neighborhoods->fetch_all(MYSQLI_ASSOC);

$query_multimedias = "Select * FROM multimedias";
$result_multimedias = $conn->query($query_multimedias);
$multimedias_asociativo = $result_multimedias->fetch_all(MYSQLI_ASSOC);

$query_properties = "Select * FROM properties";
$result_properties = $conn->query($query_properties);
$properties_asociativo = $result_properties->fetch_all(MYSQLI_ASSOC);


$countries = $countries_asociativo;
$states = $states_asociativo;
$cities = $cities_asociativo;
$neighborhoods = $neighborhoods_asociativo;
$multimedias = $multimedias_asociativo;
$properties = $properties_asociativo;

function obj_countries($countries)
{
    for ($i = 0; $i < count($countries); $i++) {
        $resultado_obj[$i] = new Countries($countries[$i]['id'], $countries[$i]['name']);
    }
    return $resultado_obj;
}

function obj_cities($cities)
{
    for ($i = 0; $i < count($cities); $i++) {
        $resultado_obj[$i] = new Cities($cities[$i]['id'], $cities[$i]['name']);
    }
    return $resultado_obj;
}

$cities_obj=obj_cities($cities);

//$countries_obj = Countries::crearObjetoCountries($countries);

var_dump($cities_obj);

// No he sido capaz de crear un simple objeto en más de 2h
$conn->close();
?>