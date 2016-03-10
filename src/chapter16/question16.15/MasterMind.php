<?php

class MasterMind {
    public static function getMoveResult(array &$guess, array &$solution) {
        $hits = 0;
        $ususedGuessBalls = [];
        $unusedSolutionSlots = [];
        for ($i=0, $length=count($solution); $i<$length; $i++) {
            if ($solution[$i] == $guess[$i]) {
                $hits++;
            } else {
                // build a hash map of the unused balls in the guess
                self::increment($ususedGuessBalls, $guess[$i]);
                // build a hash map of the unused slots in the solution
                self::increment($unusedSolutionSlots, $solution[$i]);
            }
        }
        $pseudoHits = 0;
        foreach ($ususedGuessBalls as $color => $unusedBallCount) {
            if (array_key_exists($color, $unusedSolutionSlots)) {
                $pseudoHits += min($unusedBallCount, $unusedSolutionSlots[$color]);
            }
        }
        return [ 'hits' => $hits, 'pseudo-hits' => $pseudoHits ];
    }

    private static function increment(array &$map, $key) {
        if (!array_key_exists($key, $map)) {
            $map[$key] = 0;
        }
        $map[$key]++;
    }
}