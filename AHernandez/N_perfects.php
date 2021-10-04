<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfects.php">
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
        for ($i = 1; $i <= $num; $i++) {

            $divisores[] = $i % $num;

        }
        return $divisores;
    }

    function isPerfectNum($num)
    {

        $i = 0;
        $j = 0;
        $sum = 0;
        while ($i < $num) {

            $divisores = getDivisors($j);

            $sum = $divisores[$i] + $sum;


        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE
    }
    ?>
</div>
</body>
</html>
