<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'BitVector.php';

class FindDuplicates {

    public static function printDuplicates(array &$arr, $maxN=BitVector::DEFAULT_MAX) {
        $bitVector = new BitVector($maxN);
        foreach ($arr as $a) {
            $position = $a - 1; // numbers begin at 1, not 0
            if ($bitVector->get($position)) {
                echo $a . "\n";
            } else {
                $bitVector->set($position);
            }
        }
    }
}