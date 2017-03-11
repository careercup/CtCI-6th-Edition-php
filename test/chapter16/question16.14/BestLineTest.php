<?php
require_once __DIR__ . '/../../../src/chapter16/question16.14/BestLine.php';

class BestLineTest extends \PHPUnit\Framework\TestCase {

    public function testBestLine() {
        $points = [
            new \Geom\Point(0, 0),
            new \Geom\Point(10, 4),
            new \Geom\Point(3, 3),
            new \Geom\Point(8, 8)
        ];
        $bestLine = BestLine::getBestLine($points);
        $this->assertEquals('y = x', (string) $bestLine);
    }

    public function testBestVerticalLine() {
        $points = [
            new \Geom\Point(4, 0),
            new \Geom\Point(2, 2),
            new \Geom\Point(3, 8),
            new \Geom\Point(2, 10),
            new \Geom\Point(2, 11)
        ];
        $bestLine = BestLine::getBestLine($points);
        $this->assertEquals('x = 2', (string) $bestLine);
    }

    public function testBestHorizontalLine() {
        $points = [
            new \Geom\Point(0, 3),
            new \Geom\Point(1, 2),
            new \Geom\Point(5, 3),
            new \Geom\Point(7, 10),
            new \Geom\Point(17, 3)
        ];
        $bestLine = BestLine::getBestLine($points);
        $this->assertEquals('y = 3', (string) $bestLine);
    }
}
