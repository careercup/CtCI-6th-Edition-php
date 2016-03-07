<?php namespace bisect_squares;

require_once __DIR__ . '/../../../src/chapter16/question16.13/Line.php';

class LineTest extends \PHPUnit_Framework_TestCase {

    public function testToString() {
        $this->assertEquals('y = x', (string) new Line(1, 0));
        $this->assertEquals('y = -x', (string) new Line(-1, 0));
        $this->assertEquals('y = -2x + 6', (string) new Line(-2, 6));
        $this->assertEquals('y = 2x - 6', (string) new Line(2, -6));
    }

    public function testHorizontalLineToString() {
        $this->assertEquals('y = 9', (string) new Line(0, 9));
    }

    public function testVerticalLineToString() {
        $this->assertEquals('x = 9', (string) new Line(null, 9));
    }
}
