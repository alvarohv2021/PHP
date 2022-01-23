<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spain Travels</title>
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

<!--********************Contenido Principal*********************-->
<div>
    <div class="row">
        <?php
        for ($i = 0; $i < count($arrayObjsHoteles); $i++) {
            ?>
            <div class="card col-sm-12 card col-md-6 col-lg-3">
                <img class="card-img-top" src="<?php echo $arrayObjsHoteles[$i]->getImagen() ?>" alt="Card image cap"
                     style="height: 60%">
                <div class="card-body row">
                    <h4 class="card-title col-12"><?php echo $arrayObjsHoteles[$i]->getNombre() ?></h4>
                    <p class="card-text text-success col-12"><?php echo $arrayObjsHoteles[$i]->getPrecio() ?>€</p>
                    <p class="card-text float-left col-10"><?php echo $arrayObjsHoteles[$i]->getUbicacion() ?></p>
                    <p class="card-text float-right col-2"><?php echo $arrayObjsHoteles[$i]->getValoracion() ?> &#11088;</p>
                    <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white" href="../Controladores/c_habitacion.php?habitacionId=<?php echo $arrayObjsHoteles[$i]->getId() ?>"
                               class="card-link">Habitaciones</a></button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>