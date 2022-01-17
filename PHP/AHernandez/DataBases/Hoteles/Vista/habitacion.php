<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel <?php echo $hotel->getNombre() ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row bg-info">
        <div class="col-10">
            <h1>Spain Travels</h1>
        </div>
        <div class="col-2 pt-3">
            <?php
            if ($_SESSION['usuario'] != null) {
                echo "<p>" . $_SESSION['usuario'] . "</p>";
            } else {
                echo "<a href='../Controladores/c_inicio.php'  class='text-dark' style='text-decoration: none'><p>Iniciar Sesion</p></a>";
            }
            ?>
        </div>
    </div>
</div>
</body>