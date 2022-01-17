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
    <div class="row bg-danger">
        <div class="col-8">
            <h1 class="text-light">Spain Travels</h1>
        </div>
        <div class="col-2 pt-3">
            <?php
            if ($_SESSION['usuario'] != null) {
                echo "<p>" . $_SESSION['usuario'] . "</p>";
            } else {
            ?>
            <a href='../Controladores/c_inicio.php' class='text-light' style='text-decoration: none'><p>Iniciar
                    Sesion</p></a>
        </div>
        <div class="col-2 pt-3">
            <a href='../Controladores/c_registro.php' class='text-light' style='text-decoration: none'><p>Registrarse</p>
            </a>

            <?php
            }
            ?>
        </div>
    </div>
</div>
</body>