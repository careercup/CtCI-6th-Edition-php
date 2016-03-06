<?php

class DivingBoard {
    public static function getPossibleLengths($k, $shorter, $longer) {
        if ($shorter >= $longer) {
            throw new InvalidArgumentException('Shorter length must be shorter!');
        }
        $lengths = [];
        for ($longerCount=0; $longerCount<=$k; $longerCount++) {
            $shorterCount = $k - $longerCount;
            // With each successive iteration of the loop, we'll be using
            // 1 more longer plank and 1 less shorter plank, so the total
            // length of the diving board must always be greater than in the previous
            // iteration of the loop. Therefore no duplicates will ever be generated.
            $lengths[] = $longerCount * $longer + $shorterCount * $shorter;
        }
        return $lengths;
    }
}