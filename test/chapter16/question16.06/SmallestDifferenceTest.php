<?php
require_once __DIR__ . '/../../../src/chapter16/question16.06/SmallestDifference.php';

class SmallestDifferenceTest extends \PHPUnit\Framework\TestCase {

    public function testGetSmallestDifferenceBookTestCase() {
        $a = [ 1, 3, 15, 11, 2 ];
        $b = [ 23, 127, 235, 19, 8 ];
        $this->assertEquals(3, SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithEqualValues() {
        $a = [ 1, 2, 3, 4, 6 ];
        $b = [ 5, 6, 80, 90, 100, 1000, 1001 ];
        $this->assertEquals(0, SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithNonOverlappingRanges() {
        $a = [ 13, 11, 10, 12 ];
        $b = [ 21, 20, 99  ];
        $this->assertEquals(7, SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithZeroLengthArray() {
        $a = [ 4, 7 ];
        $b = [];
        $this->assertNull(SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithLongerFirstArray() {
        $a = [ 54, 99, 1, 37, 39  ];
        $b = [ 100 ];
        $this->assertEquals(1, SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithLongerSecondArray() {
        $a = [ 100 ];
        $b = [ 54, 99, 1, 37, 39  ];
        $this->assertEquals(1, SmallestDifference::getSmallestDifference($a, $b));
    }

    public function testGetSmallestDifferenceWithDuplicateValues() {
        $a = [ 76, 34, 34, 34, 77 ];
        $b = [ 90, 32, 80, 32 ];
        $this->assertEquals(2, SmallestDifference::getSmallestDifference($a, $b));
    }
}
