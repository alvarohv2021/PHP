<?php
include_once("../Modelo/modelo.php");
if ($_POST['password']==$_POST['cPassword']){
    $cPassword=true;
    /*
    if (isset($_POST['name'])){
        $insertado=insertarUsuarios($_POST['name'],$_POST['email'],$_POST['password']);
    }
*/
}else{
    $cPassword=false;
}
include_once("../Vista/registro.php");
?>