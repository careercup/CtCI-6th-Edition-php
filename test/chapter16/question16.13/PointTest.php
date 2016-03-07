<?php namespace bisect_squares;

require_once __DIR__ . '/../../../src/chapter16/question16.13/Point.php';

class PointTest extends \PHPUnit_Framework_TestCase {

    public function testToString() {
        $point = new Point(8, 5);
        $this->assertEquals('(8,5)', (string) $point);
    }
}
