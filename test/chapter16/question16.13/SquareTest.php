<?php namespace bisect_squares;

require_once __DIR__ . '/../../../src/chapter16/question16.13/Square.php';

class SquareTest extends \PHPUnit_Framework_TestCase {

    public function testToString() {
        $square = new Square(new Point(8, 5), 3);
        $this->assertEquals('3 x 3 Square, Bottom Left @ (8,5)', (string) $square);
    }

    public function testGetters() {
        $point = new Point(8, 5);
        $square = new Square($point, 3);
        $this->assertEquals($point, $square->getBottomLeft());
        $this->assertEquals(3, $square->getSize());
    }
}
