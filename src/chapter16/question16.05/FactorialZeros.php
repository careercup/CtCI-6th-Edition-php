<?php

class FactorialZeros {
    public static function getTrailingZeros($factorialOfNumber) {
        // It follows from the definition of a factorial, that
        // the factors of a factorial of n are simply 1, 2, ..., n-1, n.
        // Each time one of these factors is divisible by factors of 10, it
        // results in a trailing zero. The factors of 10 are:
        // 1 * 10 and 2 * 5. The first case is trivial, we
        // simply count the number of factors divisible by 10
        // and the 1 naturally takes care of itself.
        // For the 2nd case, we need to consider when a
        // factor % 10 == 2 can be paired up with a corresponding
        // factor % 10 == 5. Taken together, they will produce
        // a 2 * 5 = 10.
        $remainder = $factorialOfNumber % 10;
        $floored = $factorialOfNumber - $remainder;
        // For each complete walk through of last digit = 1 through last digit = 0
        // we'll produce two leading zeros. One for the 0 and one for a paired up 2 and 5.
        $numberOfTrailingZeros = $floored / 5; // this is ($floored / 10) * 2 simplified
        // For the last partial walk through of last digit = 1 though last digit = 9,
        // we'll only produce a trailing zero if there is both a 2 and a 5.
        if ($remainder >= 5) {
            $numberOfTrailingZeros++;
        }
        return $numberOfTrailingZeros;
    }
}