<?php

class PeaksAndValleys {

    public static function sortAlternatingPeaksAndValleys(array &$nums) {
        $length = count($nums);
        for ($i=0; $i+2 < $length; $i+=2) {
            self::fixTriplet($nums, $i);
        }
        if ($i+2 == $length) {
            self::fixPair($nums, $i);
        }
    }

    protected static function fixTriplet(array &$nums, $i) {
        if ($nums[$i] <= $nums[$i+1] && $nums[$i+1] <= $nums[$i+2]) {
            self::swap($nums, $i+1, $i+2);
        } else if ($nums[$i] >= $nums[$i+1] && $nums[$i+1] >= $nums[$i+2]) {
            self::swap($nums, $i, $i+1);
        } else if ($nums[$i] >= $nums[$i+1] && $nums[$i+1] <= $nums[$i+2]) {
            self::swap($nums, $i+1, $nums[$i] > $nums[$i+2] ? $i : $i + 2);
        }
    }

    protected static function fixPair(array &$nums, $i) {
        if ($nums[$i] > $nums[$i+1]) {
            self::swap($nums, $i, $i+1);
        }
    }

    protected static function swap(array &$nums, $i, $j) {
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;
    }
}