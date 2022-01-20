<?php
include_once("../Modelo/modelo.php");
if (isset($_POST['password'])&&$_POST['password']==$_POST['cPassword']){
    if (isset($_POST['name'])){
        $insertado=insertarUsuarios($_POST['name'],$_POST['email'],$_POST['password']);
    }
}
include_once("../Vista/registro.php");
?>