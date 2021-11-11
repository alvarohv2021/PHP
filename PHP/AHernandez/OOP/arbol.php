<html lang="es">
<head>
    <title>Find N prime numbers</title>
    <style>
        body{
            background-color:orange;
        }
    </style>
</head>
<body >
<form method="post" action="arbol.php">
    <label>
        NNumeroPrimosumber:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function lineas($num){
        for ($i = 1; $i <= $num; $i++) {
            for ($f=$num;$f>$i;$f--){
                echo "<span style='color:orange'>*</span>";
            }
            for ($j = 1; $j < $i*2;$j++) {
                echo "<span style='color:darkred'>*</span>";
            }
            echo "<br>";
        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        echo "{$num} lineas <br>";
        lineas($num);
    }
    ?>
</div>
</body>
</html>
