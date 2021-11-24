<html lang="es">
<head>
    <title>Password</title>
</head>
<body >
<form method="post" action="Password.php">
    <label>
        Password:
        <input type="text" name="num" placeholder="Enter Your Password"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php


    function crack($num){
        $tamaño=strlen($num);//Numero de caracteres
        $comb=pow(256,$tamaño);//Combinaciones posibles
        echo " Con una contraseña de ".$tamaño." caracteres hay:".$comb." combinaciones posibles";
        $comb=$comb/1000;//Se pueden probar 1000 combinaiones por segundo
        echo "<br>".floor($comb%60)." Segundos ";
        $comb=($comb/60);
        echo "<br>".floor($comb%60)." Minutos";
        floor($comb=($comb/60));
        echo "<br>".floor($comb%24)." Horas";
        floor($comb=($comb/24));
        echo "<br>".floor($comb%365)." Dias";
        echo "<br>".floor($comb=($comb/365))." Años";
    }
    if (isset($_POST["num"])) {
        $num = ($_POST["num"]);
        crack($num);

    }
    ?>
</div>
</body>
</html>
