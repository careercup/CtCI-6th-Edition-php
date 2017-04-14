<?php

class MapUniquenessDetector {
    public static function isUnique($str) {
        $charMap = array_count_values(str_split($str));
        for ($i = 0, $length = strlen($str); $i < $length; ++$i) {
            if ($charMap[$str[$i]] > 1) {
                return false;
            }
        }
        return true;
    }
}
