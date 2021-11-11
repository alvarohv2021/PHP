<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);

function mapCities($countries, $cities)
{
    for ($i = 0; $i < count($countries); $i++) {
        for ($j = 0; $j < count($cities); $j++) {
            if ($countries[$i]['Code'] == $cities[$j]['CountryCode']) {

                $cities[$j]['CountryName'] = $countries[$i]['Name'];

            }
        }
    }
    return $cities;
}

function mapCountries($citiesWName, $countries)
{
    //TODO: Your code here
    for ($i = 0; $i < count($countries); $i++) {
        for ($j = 0; $j < count($citiesWName); $j++) {
            if ($countries[$i]['Code'] == $citiesWName[$j]['CountryCode']) {

                $countries[$i][]=$citiesWName[$j];

            }
        }
    }
    return $countries;

}

/*var_dump(mapCities());
var_dump(mapCountries());*/
$world=mapCountries(mapCities($countries, $cities), $countries);
var_dump($world);

//var_dump($cities);
?>