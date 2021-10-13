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
        $comb=(256**$num);
        echo $comb." Combinaciones posibles";
        $comb=(256**$num)/1000;
        echo "<br>".$comb." Segundos restante";
        echo "<br>".$comb=(($comb/60)/24)/30;
        echo " Meses restantes";
    }
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        crack($num);

    }
    ?>
</div>
</body>
</html>
