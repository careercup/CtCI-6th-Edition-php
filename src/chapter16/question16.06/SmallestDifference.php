<?php

class SmallestDifference {
    public static function getSmallestDifference(array &$a, array &$b) {
        $aLength = count($a);
        $bLength = count($b);
        if ($aLength == 0 || $bLength == 0) {
            return null;
        }
        sort($a);
        sort($b);
        $aCursor = 0;
        $bCursor = 0;
        $smallestDifference = null;
        while ($aCursor < $aLength && $bCursor < $bLength) {
            $aValue = $a[$aCursor];
            $bValue = $b[$bCursor];
            // If the values are equal the difference will be zero
            // which is the lowest possible difference.
            if ($aValue == $bValue) {
                return 0;
            }
            $difference = abs($bValue - $aValue);
            if ($smallestDifference === null || $difference < $smallestDifference) {
                $smallestDifference = $difference;
            }
            if ($aValue < $bValue) {
                $aCursor++;
            } else {
                $bCursor++;
            }
        }
        return $smallestDifference;
    }
}