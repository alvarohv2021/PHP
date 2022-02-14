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
        $iniciado = "../Controladores/c_reserva.php?habitacion=";
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
            <h1><a class="text-light" href="../Controladores/llamar_api.php" style="text-decoration: none">Spain Travels</a></h1>
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
<div class="container-fluid mt-2">
    <div class="row">
        <?php for ($i = 0; $i < count($habitaciones); $i++) { ?>
            <div class="card col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <img class="card-img-top" src="<?php echo $habitaciones[$i]->imagen ?>" alt="Card image cap"
                     style="height: 60%">
                <form method="post" action="<?php
                if ($inici) {
                    echo $iniciado . $habitaciones[$i];
                } else {
                    echo $iniciado;
                } ?>">
                    <div class="card-body">
                        <div class="row">

                            <h4 class="card-title col-12"><?php echo $hotel->nombre ?></h4>
                            <p class="col-6">Precio la Noche</p>
                            <p class="card-text text-success col-6 text-right"><?php echo $habitaciones[$i]->precio ?>
                                €</p>
                            <p class="col-6">Nº huespedes:</p>
                            <p class="card-text float-left col-6 text-right"><?php echo $habitaciones[$i]->numeroHuespedes ?></p>
                            <!--
                            <label for="entrada">De:</label>
                            <input type="date" id="entrada" name="entrada">
                            <label for="entrada">A:</label>
                            <input type="date" id="entrada" name="entrada">
                            -->
                            <button type="submit" class="btn btn-success col-12">Reservar</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

<!--***********************Reserva de la fecha**********************************-->
<?php if ($fechaMal == true) { ?>
    <script>
        alert("La fecha de entrada es despues que la de salida")
    </script>
<?php } ?>
</body>