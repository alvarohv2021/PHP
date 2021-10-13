<?php

$array = [7, 5, 3, 9, 1, 0, 8, 6, 2];
var_dump($array);
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array); $j++) {
        if ($array[$i] < $array[$j]) {
            $aux = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $aux;
        }
    }
}
var_dump($array);
?>