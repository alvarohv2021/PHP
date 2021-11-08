<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="N_perfects.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function getDivisors($num)
    {
        $divisores=array();
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i == 0) {

                $divisores[] = $i;
            }
        }
        return $divisores;
    }

    function isPerfectNum($num)
    {
        $j = 0;
        $i = 1;
        $sum=0;

        while ($j < $num) {

            $divisores = getDivisors($i);
            //var_dump($divisores);

    //        $sum=array_sum($divisores);
            foreach ($divisores as $perf) {
                if ($num%$perf) {
                    $sum += $perf;

                    echo "<br>" . $sum;
                }
           }
            echo "<br>";
            if ($sum == $i) {
                echo $i . " es perfecto<br>";
                $j++;
            }
            $i++;
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        isPerfectNum($num);
    }
    ?>
</div>
</body>
</html>
