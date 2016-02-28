<?php

class ArithmeticNumberSwapper {
    public static function swap(&$a, &$b) {
        if ($a == $b) {
            return;
        }
        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;
    }
}