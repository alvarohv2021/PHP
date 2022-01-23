<?php
error_reporting(E_ERROR | E_PARSE);
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
<!--**************************Barra Superior**************************-->
<div class="container-fluid mb-2">
    <div class="row bg-danger">
        <div class="col-8">
            <h1 class="text-light">Spain Travels</h1>
        </div>
        <?php if ($_SESSION['usuario'] != null) { ?>
            <div class="col-2 pt-3">
                <p class='text-light'><?php echo $_SESSION['usuario'] ?></p>
            </div>
            <div class='col-2 pt-3'>
                <a href='../Controladores/c_lista.php?sesion=false' class='text-light' style='text-decoration: none'><p>
                        Cerar Sesion</p>
                </a>
            </div>
        <?php } else { ?>
            <!--Por terminar, página de inicio-->

            <div class='col-2 pt-3'>
                <a href='../Controladores/c_inicio.php' class='text-light' style='text-decoration: none'>
                    <p>Iniciar Sesion</p></a>
            </div>
            <div class="col-2 pt-3">
                <!--Por hacer, página de registro-->
                <a href='../Controladores/c_registro.php' class='text-light' style='text-decoration: none'>
                    <p>Registrarse</p></a>
            </div>
        <?php } ?>
    </div>
</div>

<!--**************************Contenido de la pagina**************************-->
<div class="container mt-2">
    <div class="card col-12">
        <img class="card-img-top" src="<?php echo $hotel->getImagen() ?>" alt="Card image cap"
             style="height: 60%">
        <div class="card-body">
            <h4 class="card-title"><?php echo $hotel->getNombre() ?></h4>
            <p class="card-text text-success"><?php echo $hotel->getPrecio() ?>€</p>
            <p class="card-text float-left"><?php echo $hotel->getUbicacion() ?></p>
            <p class="card-text float-right"><?php echo $hotel->getValoracion() ?> &#11088;</p>
        </div>
    </div>

    <!--***********************Reserva de la fecha**********************************-->

    <?php if (isset($_SESSION['usuario'])) { ?>
        <div class="row justify-content-center mt-2">
            <form action="../Controladores/c_habitacion.php" method="post">
                <div class="form-group">
                    <div class="col-12">
                        <label for="entrada">Fecha de entrada:</label>
                        <input type="date" id="entrada" name="entrada">
                    </div>
                    <div class="col-12">
                        <label for="salida">Fecha de salida:</label>
                        <input type="date" id="salida" name="salida">
                    </div>
                    <div class="col-12 offset-3">
                        <input type="submit">
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
</div>

<!--**************************TO DO**************************-->
<!--**************************terminar tabla de habitaciones y rellenar los campos**************************-->
</body>