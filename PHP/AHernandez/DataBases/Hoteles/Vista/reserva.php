<?php

?>

<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Habitaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!--Determina en base ha si hay un usuario o no iniciado, a donde le va ha mandar al intentar
    hacer una reserva-->
    <?php if (isset($_SESSION['usuario'])) {
        $inici = true;
        $iniciado = "../Controladores/c_reserva.php?idHabitacion=";
    } else {
        $inici = false;
        $iniciado = "../Controladores/c_inicio.php";
    }
    ?>
</head>
<body>
<!--**************************Barra Superior**************************-->
<div class="container-fluid mb-2">
    <div class="row bg-danger">
        <div class="col-8">
            <h1><a class="text-light" href="../Controladores/c_lista.php" style="text-decoration: none">Spain Travels</a></h1>
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
            <div class='col-2 pt-3'>
                <a href='../Controladores/c_inicio.php' class='text-light' style='text-decoration: none'>
                    <p>Iniciar Sesion</p></a>
            </div>
            <div class="col-2 pt-3">
                <a href='../Controladores/c_registro.php' class='text-light' style='text-decoration: none'>
                    <p>Registrarse</p></a>
            </div>
        <?php } ?>
    </div>
</div>

<!--**************************Contenido de la pagina**************************-->
<div class="container mt-2">
    <div class="row">
        <div class="card col-6 offset-3">
            <img class="card-img-top" src="<?php echo $habitacion->getImagen() ?>" alt="Card image cap"
                 style="height: 60%">
            <form method="post" action="">
                <div class="card-body">
                    <div class="row">
                        <p class="col-6">Precio la Noche</p>
                        <p class="card-text text-success col-6 text-right"><?php echo $habitacion->getPrecio() ?>
                            €</p>
                        <p class="col-6">Nº huespedes:</p>
                        <p class="card-text float-left col-6 text-right"><?php echo $habitacion->getNumeroHuespedes() ?></p>
                        <label for="entrada" class="col-6">Entrada</label>
                        <input type="date" id="entrada" name="entrada" class="col-6 mb-1" required>
                        <label for="salida" class="col-6">Salida</label>
                        <input type="date" id="salida" name="salida" class="col-6 mb-1" required>
                        <button type="submit" class="btn btn-success col-12">Reservar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--***********************Reserva de la fecha**********************************-->


<!--**************************TO do**************************-->
<!--**************************terminar tabla de habitaciones y rellenar los campos**************************-->
<?php if ($fecha == false) { ?>
    <script>
        alert("La fecha de entrada es posterior a la de salida")
    </script>
<?php }else if ($pillada == true){ ?>
    <script>
        alert("La habitacion esta ocupada durante esas fechas")
    </script>
<?php }else{ ?>
    <script>
        alert("Reserva realizada correctamente")
    </script>
<?php } ?>
</body>