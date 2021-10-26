<?php

function ordenarVotos($votosPartidos)
{
    for ($i = 0; $i < count($votosPartidos); $i++) {//recorre el array buscando el mayor num de votos
        for ($j = 1; $j <= count($votosPartidos); $j++) {
            if ($votosPartidos[$i] < $votosPartidos[$j]) {

                $aux = 0;
                $votosPartidos[$i] = $aux;
                $votosPartidos[$i] = $votosPartidos[$j];
                $votosPartidos[$j] = $aux;

            }
        }
    }
    return $votosPartidos;
}

function asignarEscaños($numEscaños, $votosPartidos)
{
    $maxVotos = 0;
    $partido = 0;
    for ($i = 0; $i < $numEscaños; $i++) {

        for ($j = 0; $j < count($votosPartidos); $j++) {
            if ($votosPartidos[$j] > $maxVotos) {
                $maxVotos = $votosPartidos[$j];
                $partido = $j;
            }
        }


    }
}

?>
