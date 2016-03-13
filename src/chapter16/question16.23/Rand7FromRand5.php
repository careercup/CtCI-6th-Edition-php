<?php

class Rand7FromRand5 {

    public static function rand7() {
        do {
            // We can randomly generate bits to construct a binary number.
            // We're looking for a binary number between 000 (0 decimal) and 110 (6 decimal).
            // We can use the rand5() function to generate the first 2 bits.
            // If rand5() gives us more than 2 bits, try again.
            do {
                $r1 = self::rand5();
            } while ($r1 > 3);
            // For the 3rd bit, we can use rand5() again to generate a number between 0 and 4 inclusive.
            // If it's less than 2, consider the bit to off (0).
            // If it's greater than 2, consider the bit to be on (1).
            // If it's equal to 2, try again.
            $sum = $r1;
            do {
                $r2 = self::rand5();
            } while ($r2 == 2);
            if ($r2 > 2) {
                $sum += 4; // 4 decimal = 100 binary
            }
        } while ($sum == 7); // If we generated binary 111, it's out of range, so try again.
        return $sum;
    }

    public static function rand5() {
        return mt_rand(0, 4);
    }
}