<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="NumerosPrimos.php">
    <label>
        NNumeroPrimosumber:
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
        return $divisores;
    }

    function isPrimeNum($num){
        $i=0;
        $j=0;
        while ($i<$num){
            $divisores=getDivisors($j);
            if (sizeof($divisores)==2){
                echo "<br>-{$divisores[1]}";
                $i++;
            }
            $j++;
        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        echo "Los {$num} primeros numeros primos son:";
        isPrimeNum($num);
    }
    ?>
</div>
</body>
</html>