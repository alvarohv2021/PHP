<?php
include_once("../modelo/modelo.php");
session_start();
if (isset($_SESSION['id'])) {
    $myCountries = myCountries($_SESSION['id']);

    for ($i = 0; $i < count($myCountries); $i++) {
        $countryLanguages = countrylanguages($myCountries[$i]->getCode());
        $numCities = numCities($myCountries[$i]->getCode());
    }
    $mail = getMailUsuario($_SESSION['id']);

    $oterCountries[] = otherCountries($_SESSION['id']);
    for ($i = 0; $i < count($oterCountries[0]); $i++) {

        $countryLanguages[$i] = countrylanguages($oterCountries[0][$i]->getCode());
        $numCities[$i] = numCities($oterCountries[0][$i]->getCode());
    }

    $mail = getMailUsuario($_SESSION['id']);

}
include_once("../vista/main.php");
?>