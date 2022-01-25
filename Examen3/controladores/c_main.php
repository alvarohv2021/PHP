<?php
include_once("../modelo/modelo.php");
session_start();
if (isset($_SESSION['id'])) {
    $myCountries = myCountries($_SESSION['id']);

    for ($i = 0; $i < count($myCountries); $i++) {
        $countryLanguages = countrylanguages($myCountries[$i]->getCode());
        $numCities = numCities($myCountries[$i]->getCode());
    }

    $oterCountries[] = otherCountries($_SESSION['id']);

    for ($i = 0; $i < count($oterCountries); $i++) {
        $countryLanguages[$i] = countrylanguages($oterCountries[$i]->getCode());
        $numCities[$i] = numCities($oterCountries[$i]->getCode());
    }

    $mail = getMailUsuario($_SESSION['id']);

}
include_once("../vista/main.php");
?>