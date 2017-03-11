<?php
require_once __DIR__ . '/../../../src/chapter10/question10.11/PeaksAndValleys.php';

class PeaksAndValleysTest extends \PHPUnit\Framework\TestCase {

    public function testSortAlternatingPeaksAndValleys() {
        $nums = [ 5, 3, 1, 2, 3 ];
        PeaksAndValleys::sortAlternatingPeaksAndValleys($nums);
        $this->assertPeaksAndValleys($nums);
    }

    public function testSortAlternatingPeaksAndValleys2() {
        $nums = [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ];
        PeaksAndValleys::sortAlternatingPeaksAndValleys($nums);
        $this->assertPeaksAndValleys($nums);
    }

    public function testSortAlternatingPeaksAndValleys3() {
        $nums = [ 5, 5, 5, 5, 6, 6, 6 ];
        PeaksAndValleys::sortAlternatingPeaksAndValleys($nums);
        $this->assertPeaksAndValleys($nums);
    }

    public function testSortAlternatingPeaksAndValleys4() {
        $nums = [ 423, 23, 22, 21, 2, 3, 4, 3, 123, 2, 32, 23, 4, 32, 2, 432, 2, 1 ];
        PeaksAndValleys::sortAlternatingPeaksAndValleys($nums);
        $this->assertPeaksAndValleys($nums);
    }

    protected function assertPeaksAndValleys(array &$nums) {
        for ($i=1, $length=count($nums); $i<$length; $i++) {
            if ($i % 2 == 0) {
                $this->assertTrue($nums[$i-1] >= $nums[$i]);
            } else {
                $this->assertTrue($nums[$i-1] <= $nums[$i]);
            }
        }
    }
}
