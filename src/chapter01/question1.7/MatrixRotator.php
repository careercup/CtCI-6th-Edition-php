<?php

class MatrixRotator {
    public static function rotate(array &$matrix) {
        // process 1 layer of the matrix at a time
        // starting from the outside and moving inwards
        for ($layer=0, $layers=floor(count($matrix)/2), $begin=0, $end=count($matrix)-1; $layer<$layers; $layer++, $begin++, $end--) {
            for ($i=$begin, $j=$end; $i<$end; $i++, $j--) {
                // perform a 4-way swap of values in the current layer
                $tmp = $matrix[$begin][$i];
                $matrix[$begin][$i] = $matrix[$j][$begin];
                $matrix[$j][$begin] = $matrix[$end][$j];
                $matrix[$end][$j] = $matrix[$i][$end];
                $matrix[$i][$end] = $tmp;
            }
        }
    }
}
