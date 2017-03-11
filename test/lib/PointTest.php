<?php namespace Geom;

require_once __DIR__ . '/../../src/lib/Point.php';

class PointTest extends \PHPUnit\Framework\TestCase {

    public function testToString() {
        $point = new Point(8, 5);
        $this->assertEquals('(8,5)', (string) $point);
    }
}
