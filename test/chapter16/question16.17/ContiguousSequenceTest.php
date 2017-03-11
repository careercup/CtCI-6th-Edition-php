<?php
require_once __DIR__ . '/../../../src/chapter16/question16.17/ContiguousSequence.php';

class ContiguousSequenceTest extends \PHPUnit\Framework\TestCase {

    public function testGetLargestSum() {
        $arr = [ 2, -8, 3, -2, 4, -10 ];
        // The contiguous sequence with the largest sum is 3, -2, 4
        $this->assertEquals(5, ContiguousSequence::getLargestSum($arr));
    }

    public function testGetLargestSumWithAscendingSequence() {
        $arr = [ 1, 2, 4 ];
        $this->assertEquals(7, ContiguousSequence::getLargestSum($arr));
    }

    public function testGetLargestSumWithDescendingSequence() {
        $arr = [ 4, 2, 1 ];
        $this->assertEquals(7, ContiguousSequence::getLargestSum($arr));
    }

    public function testGetLargestSumWithAllNegativeNumbers() {
        $arr = [ -4, -2, -6 ];
        // The contiguous sequence with the largest sum is the empty set
        $this->assertEquals(0, ContiguousSequence::getLargestSum($arr));
    }

    public function testGetLargestSumWithZeroAsHighestElement() {
        $arr = [ -4, -2, 0, -6 ];
        $this->assertEquals(0, ContiguousSequence::getLargestSum($arr));
    }
}
