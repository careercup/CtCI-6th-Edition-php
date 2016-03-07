<?php namespace bisect_squares;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Line.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Square.php';

class BisectSquares {
    public static function getBisectingLine(Square $square1, Square $square2) {
        $center1 = $square1->getCenter();
        $center2 = $square2->getCenter();
        if ($center1 == $center2) {
            // vertical line
            return new Line(null, $center1->getX());
        }
        return Line::buildFromPoints($center1, $center2);
    }
}