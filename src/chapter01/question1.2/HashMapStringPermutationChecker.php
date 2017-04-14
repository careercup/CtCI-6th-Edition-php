<?php

class HashMapStringPermutationChecker {
    public static function isPermutation($str1, $str2) {
        if (strlen($str1) !== strlen($str2)) {
            return false;
        }
        $charCounts1 = array_count_values(str_split($str1));
        $charCounts2 = array_count_values(str_split($str2));
        foreach ($charCounts1 as $char => $count) {
            if (!array_key_exists($char, $charCounts2) || $charCounts2[$char] !== $count) {
                return false;
            }
        }
        return true;
    }
}
