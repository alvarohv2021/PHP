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
if (isset($_GET['peliculaId'])){
    if ($_GET['owned']==true){
        returnFilm($_GET['peliculaId']);
    }else{
        var_dump($_SESSION['userId']);
        getFilm($_GET['peliculaId'],$_SESSION['userId']);
    }
    header("Location: c_main.php");
}

include_once("../vista/main.php");