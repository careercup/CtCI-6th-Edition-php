<?php

class FactorialZeros {
    public static function getTrailingZeros($factorialOfNumber) {
        $fiveCount = 0;
        for ($i=5; $i <= $factorialOfNumber; $i *= 5) {
            $remainder = $factorialOfNumber % $i;
            $fiveCount += ($factorialOfNumber - $remainder) / $i;
        }
        return $fiveCount;
    }
}