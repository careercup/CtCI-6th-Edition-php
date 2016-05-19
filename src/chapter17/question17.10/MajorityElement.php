<?php

class MajorityElement {

    public static function getMajorityElement(array &$a) {
        $candidate = self::getMajorityElementCandidate($a);
        return $candidate != -1 && self::isMajorityElement($a, $candidate) ? $candidate : -1;
    }

    protected static function getMajorityElementCandidate(array &$a) {
        $candidate = -1;
        for ($i=0, $equal=0, $unequal=0, $length=count($a); $i<$length; $i++) {
            if ($candidate == -1) {
                $candidate = $a[$i];
            }
            if ($a[$i] == $candidate) {
                $equal++;
            } else {
                $unequal++;
            }
            if ($unequal >= $equal) {
                $candidate = -1;
                $equal = 0;
                $unequal = 0;
            } elseif ($equal + $equal > $length) {
                return $candidate;
            }
        }
        return $candidate;
    }

    protected static function isMajorityElement(array &$a, $n) {
        $length = count($a);
        $count = 0;
        for ($i=0; $i<$length; $i++) {
            if ($a[$i] == $n) {
                $count++;
            }
        }
        return $count + $count > $length ? true : false;
    }
}
