<?php
include_once("../BD/BD.php");
session_start();
function comprobarUsuario($email, $passord)
{
    global $coon;

    $query = $coon->query("select * from users where Mail='" . $email . "'");
    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    if ($query->num_rows==0){
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
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query = $coon->query("insert into users (Mail, Password)
        values ('" . $email . "','" . $password . "')");
        return true;
    }else{
        return false;
    }
}

function myCountries($userId){
    global $coon;

    $query=$coon->query("Select * from countries where UserId=".$userId);
    $temp=$query->fetch_all(MYSQLI_ASSOC);
    $temp=$temp[0];

    $countries=new
}
?>
