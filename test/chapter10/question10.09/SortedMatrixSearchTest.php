<?php
require_once __DIR__ . '/../../../src/chapter10/question10.09/SortedMatrixSearch.php';

class SortedMatrixSearchTest extends \PHPUnit\Framework\TestCase {

    public function testSortAlternatingPeaksAndValleys() {
        $matrix = [
            [  1,  4,  6,  7,  9, 10 ],
            [  2,  5,  7,  8, 11, 13 ],
            [  4,  6,  8, 10, 12, 15 ],
            [  9, 10, 12, 13, 14, 16 ],
            [ 11, 13, 14, 15, 17, 19 ],
            [ 20, 22, 24, 26, 28, 32 ],
            [ 21, 23, 27, 33, 35, 37 ]
        ];
        foreach ($matrix as $row => &$values) {
            foreach ($values as $col => $value) {
                $coordinates = SortedMatrixSearch::searchMatrix($matrix, $value);
                $r = $coordinates[0];
                $c = $coordinates[1];
                $this->assertEquals($value, $matrix[$r][$c]);
            }
        }
        $this->assertNull(SortedMatrixSearch::searchMatrix($matrix, -1));
        $this->assertNull(SortedMatrixSearch::searchMatrix($matrix, 3));
        $this->assertNull(SortedMatrixSearch::searchMatrix($matrix, 99));
    }
}
