<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="NumerosPrimos.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php

    $divisores=[];

    function getDivisors($num){
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {

                $divisores[] = $i;
            }
        }
        echo "<br>";
        return $divisores;
    }

    function isPrimeNum($num){
        $i=0;
        while ($i!=$num){
            $divisores=getDivisors($i);
            if (sizeof($divisores)==2){
                echo $divisores[1];
                $i++;
            }
        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        isPrimeNum($num);
    }
    ?>
</div>
</body>
</html>