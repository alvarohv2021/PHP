<html lang="es">
<head>
    <title>Get divisors</title>
</head>
<body>
<form method="post" action="Divisores.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);
        for ($i = 1; $i < $num; $i++) {
            if ($num % $i == 0) {
                echo "<br>Es divisible entre: ",$i;
            }
        }
    }
    ?>
</div>
</body>
</html>