<?php

class PalindromePermutationChecker {
    public static function isPalindromePermutation($str) {
        $str = strtolower(trim($str));
        $charCounts = array_count_values(str_split($str));
        $oddCount = 0;
        foreach ($charCounts as $char => $count) {
            if ($count % 2 !== 0 && ++$oddCount > 1) {
                return false;
            }
        }
        return true;
    }
}
