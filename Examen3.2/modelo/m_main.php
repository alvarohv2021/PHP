<?php
include_once("../BD/BD.php");
include_once("../entidades/film.php");

function myFilms($userId)
{
    global $coon;
    $query = $coon->query("select * from film where user_id=" . $userId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
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
    $query = $coon->query("Select * from film where user_id!=" . $userId . " or user_id is null ORDER BY RAND(1234) LIMIT 20");
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($temp); $i++) {
        $otherFilms[] = new film($temp[$i]['film_id'], $temp[$i]['title'], $temp[$i]['description'],
            $temp[$i]['release_year'], $temp[$i]['language_id'], $temp[$i]['length'], $temp[$i]['rating']
            , "", "", $temp[$i]['user_id']);
    }

    return $otherFilms;

}

function setActors($film)
{
    global $coon;
    $query = $coon->query("Select actor.first_name,actor.last_name from film 
    join film_actor on film_actor.film_id = film.film_id 
    join actor on actor.actor_id=film_actor.actor_id 
    where film.film_id=" . $film->getId());
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($temp); $i++) {
        $actores[] = $temp[$i]['first_name'] . " " . $temp[$i]['last_name'];

    }
    $film->setActors($actores);
}

function setCategories($film)
{
    global $coon;
    $query = $coon->query("SELECT category.name FROM film 
    join film_category on film_category.film_id = film.film_id
    join category on category.category_id=film_category.category_id 
    where film.film_id=" . $film->getId());
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    for ($i = 0; $i < count($temp); $i++) {
        $categories[] = $temp[$i]['name'];

    }
    $film->setCategories($categories);

}

function returnFilm($filmId){

    global $coon;
    $query=$coon->query("update film set user_id=null where film_id=".$filmId);

}

function getFilm($filmId,$userId){

    global $coon;
    $query=$coon->query("update film set user_id=".$userId." where film_id=".$filmId);

}