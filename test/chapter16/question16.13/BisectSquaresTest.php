<?php

require_once __DIR__ . '/../../../src/chapter16/question16.13/BisectSquares.php';

class BisectSquaresTest extends \PHPUnit\Framework\TestCase {

    public function testGetBisectingLine() {
        $square1 = new Square(new \Geom\Point(0, 0), 2);
        $square2 = new Square(new \Geom\Point(6, 6), 2);
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals('y = x', (string) $line);
    }

    public function testGetBisectingLineEqual() {
        $square1 = new Square(new \Geom\Point(1, 1), 5);
        $square2 = new Square(new \Geom\Point(1, 1), 5);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(3.5, 1), new \Geom\Point(3.5, 6));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLineConcentric() {
        $square1 = new Square(new \Geom\Point(1, 1), 5);
        $square2 = new Square(new \Geom\Point(2, 2), 3);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(3.5, 1), new \Geom\Point(3.5, 6));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLinePartiallyOverlappingSideBySide() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(8, 10), 10);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(8, 15), new \Geom\Point(20, 15));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLinePartiallyOverlappingCorners() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(8, 7), 7);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(8 + 7/9, 7), new \Geom\Point(18 + 8/9, 20));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLinePartiallyOverlappingOnTopOfEachOther() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(8, 7), 15);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(8, 22), new \Geom\Point(23, 7));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLineNotOverlappingSideBySide() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(19, 25), 4);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(12.5, 10), new \Geom\Point(22, 29));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLineNotOverlappingOnTopOfEachOther() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(4, 4), 3);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(4, 4), new \Geom\Point(20, 20));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }

    public function testGetBisectingLineContained() {
        $square1 = new Square(new \Geom\Point(10, 10), 10);
        $square2 = new Square(new \Geom\Point(12, 14), 3);
        $expectedLine = \Geom\Line::buildFromPoints(new \Geom\Point(10, 16 + 2/3), new \Geom\Point(20, 13 + 1/3));
        $line = BisectSquares::getBisectingLine($square1, $square2);
        $this->assertEquals($expectedLine, $line);
    }
}
