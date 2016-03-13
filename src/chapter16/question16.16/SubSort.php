<?php

class SubSort {
    public static function getRangeIndexes(array &$arr) {
        // scan from the left until we find an unsorted element
        $left = null;
        for ($i=1, $length=count($arr); $i<$length; $i++) {
            if ($arr[$i] < $arr[$i-1]) {
                $left = $i;
                break;
            }
        }
        if ($left === null) {
            // the array is completely sorted
            return null;
        }
        // scan from the the right until we find an unsorted element
        $right = null;
        for ($i=$length-2; $i>=0; $i--) {
            if ($arr[$i] > $arr[$i+1]) {
                $right = $i;
                break;
            }
        }
        // find the min and max values of the middle segment
        // include values from the extreme ends of the left and right segments
        $min = $arr[$right+1];
        $max = $arr[$left-1];
        for ($i=$left; $i<=$right; $i++) {
            if ($arr[$i] < $min) {
                $min = $arr[$i];
            }
            if ($arr[$i] > $max) {
                $max = $arr[$i];
            }
        }
        // expand the middle range up to the min value
        $shrunkenLeft = 0;
        for ($i=$left-1; $i>=0; $i--) {
            if ($arr[$i] <= $min) {
                $shrunkenLeft = $i+1;
                break;
            }
        }
        // expand the middle range up to the max value
        $shrunkenRight = $length-1;
        for ($i=$right+1; $i<$length; $i++) {
            if ($arr[$i] >= $max) {
                $shrunkenRight = $i-1;
                break;
            }
        }
        return [ $shrunkenLeft, $shrunkenRight ];
    }
}