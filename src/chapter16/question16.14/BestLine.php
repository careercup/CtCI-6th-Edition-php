<?php
require_once __DIR__ . '/../../lib/Line.php';

class BestLine {
    public static function getBestLine(array $points) {
        $lines = [];
        $highestPointCount = 0;
        $bestLine = null;
        for ($i=0, $max=count($points); $i<$max-1; $i++) {
            for ($j=$i+1; $j<$max; $j++) {
                $p1 = $points[$i];
                $p2 = $points[$j];
                $line = \Geom\Line::buildFromPoints($p1, $p2);
                $lineEquation = (string) $line;
                if (!array_key_exists($lineEquation, $lines)) {
                    $lines[$lineEquation] = [];
                }
                $lines[$lineEquation][(string) $p1] = 1;
                $lines[$lineEquation][(string) $p2] = 1;
                $pointCount = count($lines[$lineEquation]);
                if ($pointCount > $highestPointCount) {
                    $highestPointCount = $pointCount;
                    $bestLine = $line;
                }
            }
        }
        return $bestLine;
    }
}