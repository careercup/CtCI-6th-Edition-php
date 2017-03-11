<?php
require_once __DIR__ . '/../../../src/chapter16/question16.16/SubSort.php';

class SubSortTest extends \PHPUnit\Framework\TestCase {

    public function testGetRangeIndexes() {
        $arr = [ 1, 2, 4, 7, 10, 11, 7, 12, 6, 7, 16, 18, 19 ];
        $expected = [ 3, 9 ];
        $this->assertEquals($expected, SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexes2() {
        $arr = [ 1, 2, 4, 7, 10, 11, 3, 12, 6, 7, 16, 18, 19 ];
        $expected = [ 2, 9 ];
        $this->assertEquals($expected, SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexesWithSortedArray() {
        $arr = [ -10, 0, 10, 20, 30, 99 ];
        $this->assertNull(SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexesWithCompletelyUnsortedArray() {
        $arr = [ 99, 0, 20, 10, 30, -10 ];
        $expected = [ 0, count($arr)-1 ];
        $this->assertEquals($expected, SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexesWithTwoElementArray() {
        $arr = [ 8, -8 ];
        $expected = [ 0, 1 ];
        $this->assertEquals($expected, SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexesWithSingleElementArray() {
        $arr = [ 8 ];
        $this->assertNull(SubSort::getRangeIndexes($arr));
    }

    public function testGetRangeIndexesWithEmptyArray() {
        $arr = [];
        $this->assertNull(SubSort::getRangeIndexes($arr));
    }
}
