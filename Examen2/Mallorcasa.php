<?php

include("Countries.php");
include("Cities.php");
include("Multimedias.php");
include("Neighborhood.php");
include("States.php");
include("Propiedades.php");

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

//OBJETOS********************************************************
$countries_obj = crearObjCountries($countries);
$states_obj = crearObjStates($states);
$cities_obj = crearObjCities($cities);
$neighborhoods_obj = crearObjneighborhoods($neighborhoods);
$multimedia_obj=crearObjMultimedias($multimedias);
$properties_obj=crearObjPropiedades($properties,$countries_obj,$states_obj,$cities_obj,$neighborhoods_obj,$multimedia_obj);


function crearObjCountries($countries)
{
    for ($i = 0; $i < count($countries); $i++) {
        $resultado_obj = new Countries($countries[$i]['id'], $countries[$i]['name']);
    }
    return $resultado_obj;
}

function crearObjStates($states)
{
    for ($i = 0; $i < count($states); $i++) {
        $resultado_obj = new States($states[$i]['id'], $states[$i]['name']);
    }
    return $resultado_obj;
}

function crearObjCities($cities)
{
    for ($i = 0; $i < count($cities); $i++) {
        $resultado_obj = new Cities($cities[$i]['id'], $cities[$i]['name']);
    }
    return $resultado_obj;
}

function crearObjNeighborhoods($neighborhoods)
{
    for ($i = 0; $i < count($neighborhoods); $i++) {
        $resultado_obj = new Neighborhood($neighborhoods[$i]['id'], $neighborhoods[$i]['name']);
    }
    return $resultado_obj;
}

function crearObjMultimedias($multimedias)
{
    for ($i = 0; $i < count($multimedias); $i++) {
        $resultado_obj = new Multimedias($multimedias[$i]['id'], $multimedias[$i]['propertyId']
            , $multimedias[$i]['url']);
    }
    return $resultado_obj;
}

function crearObjPropiedades($properties,$countries_obj,$states_obj,$cities_obj,$neighborhoods_obj,$multimedia_obj)
{


    for ($i = 0; $i < count($properties); $i++) {
        $resultado_obj = new Multimedias($properties[$i]['id'], $countries_obj->getId()
            ,$states_obj->getId(),$cities_obj->getId(),$neighborhoods_obj->getId()
            ,$properties[$i]['zipcode'],$properties[$i]['latitude'],$properties[$i]['longitude']
            ,$properties[$i]['date'],$properties[$i]['description'],$properties[$i]['bathrooms']
            ,$properties[$i]['floor'],$properties[$i]['rooms'],$properties[$i]['surface']
            ,$properties[$i]['price']);
    }
    return $resultado_obj;
}


































$conn->close();
?>