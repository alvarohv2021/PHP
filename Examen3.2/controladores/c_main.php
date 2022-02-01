<?php
include_once("../modelo/m_main.php");
session_start();

if (isset($_SESSION['userId'])) {
    $films=myFilms($_SESSION['userId']);
    for ($i=0;$i<count($films);$i++){
        setActors($films[$i]);
        setCategories($films[$i]);
    }
    $otherFilms=otherFilms($_SESSION['userId']);
    for ($i=0;$i<count($otherFilms);$i++){
        setActors($otherFilms[$i]);
        setCategories($otherFilms[$i]);
    }
}

include_once("../vista/main.php");