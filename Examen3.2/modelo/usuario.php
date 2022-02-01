<?php
include_once("../BD/BD.php");
session_start();

function comprobarUsuario($email, $password)
{
    global $coon;
    $query = $coon->query("Select * from user where mail='" . $email . "'");

    if ($query->num_rows == 0) {
        return false;
    }

    $temp = $query->fetch_all(MYSQLI_ASSOC);
    $temp = $temp[0];

    if (password_verify($password, $temp['password'])) {
        $_SESSION['userId'] = $temp['user_id'];
        return true;
    }


}

function registrarUsuario($email, $password)
{
    if (!comprobarUsuario($email, $password)) {
        global $coon;
        $query = $coon->query("Insert into user (mail,password) values ('" . $email . "'," . password_hash($password, PASSWORD_DEFAULT) . ")");
        return true;
    }
}