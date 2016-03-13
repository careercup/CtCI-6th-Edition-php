<?php

class ContiguousSequence {
    public static function getLargestSum(array &$arr) {
        $sum = 0;
        $maxSum = 0;
        foreach ($arr as $value) {
            $sum += $value;
            if ($sum > $maxSum) {
                $maxSum = $sum;
            } elseif ($sum < 0) {
                $sum = 0;
            }
        }
        return $maxSum;
    }
}