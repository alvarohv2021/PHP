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
    function getDivisors($num){
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                $divisores[] = $i;
            }
        }
        return $divisores;
    }

    function isPerfectNum($num){
        //TODO: YOUR CODE HERE
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        //TODO: YOUR CODE HERE
    }
    ?>
</div>
</body>
</html>
