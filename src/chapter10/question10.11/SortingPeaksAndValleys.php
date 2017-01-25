<?php

class SortingPeaksAndValleys {

    public static function sortAlternatingPeaksAndValleys(array &$nums) {
        sort($nums);
        for ($i=2, $length=count($nums); $i < $length; $i+=2) {
            self::swap($nums, $i-1, $i);
        }
    }

    protected static function swap(array &$nums, $i, $j) {
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;
    }
}