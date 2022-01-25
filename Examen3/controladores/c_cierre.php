<?php

if (isset($_SESSION['id'])){
    $_SESSION['id']=null;
}
header("Location:c_iniciar.php");
?>