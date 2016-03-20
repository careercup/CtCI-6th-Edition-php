<?php

class SumSwap {

    public static function findValuesToSwapForSameSum(array &$arr1, array &$arr2) {
        $sum1 = 0;
        foreach ($arr1 as $key => $value) {
            $sum1 += $value;
        }
        $map = [];
        $sum2 = 0;
        foreach ($arr2 as $key => $value) {
            $map[$value] = $key;
            $sum2 += $value;
        }
        $diff = $sum2 - $sum1;
        if ($diff % 2 != 0) {
            return null;
        }
        foreach ($arr1 as $key => $value) {
            $complementaryValue = ($diff + 2 * $value) / 2;
            if (array_key_exists($complementaryValue, $map)) {
                return [ $value, $complementaryValue ];
            }
        }
        return null;
    }
}