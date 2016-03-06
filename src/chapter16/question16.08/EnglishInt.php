<?php

class EnglishInt {
    const ZERO = 'Zero';
    const HUNDRED = 'Hundred';
    const NEGATIVE = 'Negative';
    private static $namesUpToTeens =
        [ 1 => 'One', 2=> 'Two', 3=> 'Three', 4=> 'Four', 5=> 'Five', 6=> 'Six', 7 => 'Seven',
          8 => 'Eight', 9 => 'Nine', 10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen',
          14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
          19 => 'Nineteen' ];
    private static $tens = [ 10 => 'Ten', 20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty',
        50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety' ];
    private static $groups = [ '', 'Thousand', 'Million', 'Billion', 'Trillion' ];

    public static function getEnglishInt($n) {
        if ($n == 0) {
            return self::ZERO;
        }
        $negative = $n < 0;
        if ($negative) {
            $n = -$n;
        }
        $parts = [];
        foreach (self::$groups as $group) {
            $remainder = $n % 1000;
            if ($remainder > 0) {
                $part = self::getHundreds($remainder);
                if (!empty($group)) {
                    array_unshift($parts, $group . (!empty($parts) ? ',' : ''));
                }
                array_unshift($parts, $part);
                $n -= $remainder;
                if ($n == 0) {
                    break;
                }
            }
            $n /= 1000;
        }
        if ($n != 0) {
            throw new InvalidArgumentException('Number out of range: ' . $n);
        }
        if ($negative) {
            array_unshift($parts, self::NEGATIVE);
        }
        return implode(' ', $parts);
    }

    private static function getHundreds($n) {
        $parts = [];
        $tens = $n % 100;
        if ($tens > 0) {
            if ($tens < 20) {
                array_unshift($parts, self::$namesUpToTeens[$tens]);
            } else {
                $ones = $tens % 10;
                if ($ones > 0) {
                    array_unshift($parts, self::$namesUpToTeens[$ones]);
                    $tens -= $ones;
                    $n -= $ones;
                }
                if ($tens > 0) {
                    array_unshift($parts, self::$tens[$tens]);
                }
            }
            $n -= $tens;
        }
        $hundreds = $n % 1000;
        if ($hundreds > 0) {
            array_unshift($parts, self::HUNDRED);
            array_unshift($parts, self::$namesUpToTeens[$hundreds / 100]);
        }
        $n -= $hundreds;
        return implode(' ', $parts);
    }
}