<?php

/**
 * This solution emulates the classic column by column add and carry algorithm
 * that you were taught in grade school. Instead of decimal digits, binary digits
 * are used. There is a more elegant algorithm which separates the add and carry
 * operations and is closer to the way computers actually add numbers.
 *
 * It's worth noting that thanks to two's complement representation of negative
 * numbers, this algorithm works with negative numbers too.
 */
class AddWithoutPlus {

    public static function add($a, $b) {
        $sum = 0;
        $carry = 0;
        $mask = 1;
        $nextBitOn = false;
        while ($a != 0 || $b != 0) {
            $d1 = (($a & $mask) == 0) ? 0 : 1;
            $d2 = (($b & $mask) == 0) ? 0 : 1;
            if ($d1 == 1) {
                if ($d2 == 1) {
                    if ($carry == 1) {
                        $nextBitOn = true;
                        // $carry stays at 1
                    } else {
                        $nextBitOn = false;
                        $carry = 1;
                    }
                } else {
                    if ($carry == 1) {
                        $nextBitOn = false;
                        // $carry stays at 1
                    } else {
                        $nextBitOn = true;
                        // $carry stays at 0
                    }
                }
            } else if ($d2 == 1) {
                if ($carry == 1) {
                    $nextBitOn = false;
                    // $carry stays at 1
                } else {
                    $nextBitOn = true;
                    // $carry stays at 0
                }
            } else if ($carry == 1) {
                $nextBitOn = true;
                $carry = 0;
            } else {
                $nextBitOn = false;
                // $carry stays at 0
            }
            if ($nextBitOn) {
                $sum |= $mask;
            }
            $notMask = ~$mask;
            $a = $a & $notMask;
            $b = $b & $notMask;
            $mask = $mask << 1;
        }
        if ($carry == 1) {
            $sum |= $mask;
        }
        return $sum;
    }
}