<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<style>
    p {
        background-color: #212738;
    }
</style>
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
            for ($f=$num;$f>=$i;$f--){
                echo'&nbsp';
            }
            for ($j = 1; $j <= $i;$j++) {
                echo "<span style='color:skyblue'>*</span>";
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
