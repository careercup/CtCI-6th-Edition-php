<?php

class LettersAndNumbers {

    public static function getLongestSubArrayOfEqualLettersAndNumbers(array &$arr) {
        if (empty($arr)) {
            return [];
        }
        // Hash map where they keys are the differences between the count of letters and numbers
        // and the values are arrays of the indexes of $arr at which those differences occur
        // as counted from the beginning of the array
        $diffMap = [ 0 => [ -1 ] ]; // initialize

        $diff = self::isDigit($arr[0]) ? -1 : 1;

        $maxSpan = null;
        $diffAtMaxSpan = null;
        for ($i=1, $length=count($arr); $i<$length; $i++) {
            $diff = self::isDigit($arr[$i]) ? $diff - 1 : $diff + 1;
            if (!array_key_exists($diff, $diffMap)) {
                $diffMap[$diff] = [ $i ];
            } else {
                array_push($diffMap[$diff], $i);
                $span = $i - $diffMap[$diff][0];
                if ($maxSpan === null || $span > $maxSpan) {
                    $maxSpan = $span;
                    $diffAtMaxSpan = $diff;
                }
            }
        }
        if ($diffAtMaxSpan === null) {
            return [];
        }
        $indexBeforeStartIndex = $diffMap[$diffAtMaxSpan][0];
        $endIndex = array_pop($diffMap[$diffAtMaxSpan]);
        return array_slice($arr, $indexBeforeStartIndex + 1, $endIndex - $indexBeforeStartIndex);
    }

    protected static function isDigit($value) {
        return is_numeric($value) || ctype_digit($value) ? true : false;
    }
}