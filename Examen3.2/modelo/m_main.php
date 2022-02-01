<?php
include_once("../BD/BD.php");
include_once("../entidades/film.php");

function myFilms($userId)
{
    global $coon;
    $query = $coon->query("select * from film where user_id=" . $userId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    var_dump($temp);
    for ($i = 0; $i < count($temp); $i++) {
        $film[] = new film($temp[$i]['film_id'], $temp[$i]['title'], $temp[$i]['description'],
            $temp[$i]['release_year'], $temp[$i]['language_id'], $temp[$i]['length'], $temp[$i]['rating']
            , "", "", $temp[$i]['user_id']);
    }
    return $film;
}

function otherFilms($userId)
{
    global $coon;
    $query = $coon->query("Select * from film where user_id!=" . $userId . " or user_id is null");
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    var_dump(count($temp));

    for ($i = 0; $i < count($temp); $i++) {
        $otherFilms[] = new film($temp[$i]['film_id'], $temp[$i]['title'], $temp[$i]['description'],
            $temp[$i]['release_year'], $temp[$i]['language_id'], $temp[$i]['length'], $temp[$i]['rating']
            , "", "",$temp[$i]['user_id']);
    }

    return $otherFilms;

}

function setActors($filmId){
    global $coon;
    $query=$coon->query("Select actor.first_name from film 
    join film_actor on film_actor.film_id = film.film_id 
    join actor on actor.actor_id=film_actor.actor_id 
    where film.film_id=".$filmId);
    $temp=$query->fetch_all(MYSQLI_ASSOC);


    var_dump($temp);
}