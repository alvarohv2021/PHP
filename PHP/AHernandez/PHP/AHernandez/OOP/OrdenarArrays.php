<?php

$array = [
    $a = [7, "alvaro"],
    $b = [5, "Pedro"],
    $c = [3, "Luis"],
    $d = [9, "Miguel"],
    $e = [1, "Alberto"],
    $f = [0, "Marc"],
    $g = [8, "Carlos"],
    $h = [6, "Juan"],
    $k = [2, "Felipe"],
    $l = [4, "Manolo"],
];
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array); $j++) {
        if ($array[$i] < $array[$j]) {
            $aux = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $aux;
        }
    }
}
?>