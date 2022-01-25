<?php
include_once("../BD/BD.php");
include_once("../entidades/countrie.php");
session_start();
function comprobarUsuario($email, $passord)
{
    global $coon;

    $query = $coon->query("select * from users where Mail='" . $email . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    if ($query->num_rows == 0) {
        return false;
    }


    $confirmacion = password_verify($passord, $temp['Password']);

    if ($confirmacion) {
        $_SESSION['id'] = $temp['Id'];
        return true;
    }
}

function registarUsuario($email, $password)
{
    global $coon;

    if (!comprobarUsuario($email, $password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $coon->query("insert into users (Mail, Password)
        values ('" . $email . "','" . $password . "')");
        return true;
    } else {
        return false;
    }
}

function getMailUsuario($userId)
{
    global $coon;

    $query = $coon->query("Select Mail from users where Id=" . $userId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    return $temp['Mail'];
}

function myCountries($userId)
{
    global $coon;
    $query = $coon->query("Select * from countries where UserId=" . $userId);
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    $temp = $temp[0];

    $countries[] = new countrie($temp["Code"], $temp["Name"], $temp["Population"], $temp["GNP"]
        , $temp["Capital"], $temp["UserId"]);

    return $countries;
}

function countrylanguages($countryCode)
{
    global $coon;

    $query = $coon->query("SELECT count(*) FROM countrylanguages where CountryCode='" . $countryCode . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    return $temp;
}

function numCities($countryCode)
{
    global $coon;

    $query = $coon->query("SELECT count(*) FROM cities where CountryCode='" . $countryCode . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);

    return $temp;
}

function otherCountries($userId)
{
    global $coon;
    $query = $coon->query("Select * from countries where UserId!=" . $userId." OR UserId IS NULL");
    $temp = $query->fetch_all(MYSQLI_ASSOC);

for ($i=0;$i<count($temp);$i++){

    if ($temp["UserId"]==null){
        $temp[$i]["UserId"]=0;
    }
    $countries[$i] = new countrie($temp[$i]["Code"], $temp[$i]["Name"], $temp[$i]["Population"]
        , $temp[$i]["GNP"], $temp[$i]["Capital"], $temp[$i]["UserId"]);
}

    return $countries;
}
?>
