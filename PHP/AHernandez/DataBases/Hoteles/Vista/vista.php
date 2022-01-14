<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoteles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div>
    <div class="row">
        <?php
        for ($i = 0; $i < count($arrayObjsHoteles); $i++) {
            ?>
            <div class="card col-sm-12 card col-md-6 col-lg-3">
                <img class="card-img-top" src="<?php echo $arrayObjsHoteles[$i]->getImagen() ?>" alt="Card image cap"
                     style="height: 60%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $arrayObjsHoteles[$i]->getNombre() ?></h4>
                    <p class="card-text text-success"><?php echo $arrayObjsHoteles[$i]->getPrecio() ?>€</p>
                    <p class="card-text float-left"><?php echo $arrayObjsHoteles[$i]->getUbicacion() ?></p>
                    <p class="card-text float-right"><?php echo $arrayObjsHoteles[$i]->getValoracion() ?> &#11088;</p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>