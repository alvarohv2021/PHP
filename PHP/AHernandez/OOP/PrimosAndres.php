<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="PrimosAndres.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function CountDivisors($num){

        $divisores = 0;

        for($i = 1; $i < $num; $i ++) {
            if ($num % $i == 0) {
                $divisores++;
            }
        }
        return $divisores;
    }

    function isPrimeNum($num){

        $count = 0;

        for($i = 2; $count < $num;$i++){
            if (CountDivisors($i) == 1){
                echo '<br>','-',$i;
                $count++;
            }
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        echo "<b>Los {$num} primeros numeros primos son:</b>";
        isPrimeNum($num);

    }
    ?>
</div>
</body>
</html>
