<?php

class StrposOneAwayChecker {
    public static function isOneOrZeroAway($str1, $str2) {
        if (abs(strlen($str1) - strlen($str2)) > 1) {
            return false;
        }

        $diffCount = 0;

        for ($i = 0, $length = strlen($str1); $i < $length; $i++) {
            if (strpos($str2, $str1[$i]) === false && ++$diffCount > 1) {
                return false;
            }
        }

        return true;
    }
}
