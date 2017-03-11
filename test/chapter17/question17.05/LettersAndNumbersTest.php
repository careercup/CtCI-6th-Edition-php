<?php
require_once __DIR__ . '/../../../src/chapter17/question17.05/LettersAndNumbers.php';

class LettersAndNumbersTest extends \PHPUnit\Framework\TestCase {

    public function testGetLongestSubArrayOfEqualLettersAndNumbersFromBeginning() {
        $arr = [ 'a', 'b', 0, 6, 'c', 'd', 'e', 'f' ];
        $expected = [ 'a', 'b', 0, 6 ];
        $this->assertEquals($expected, LettersAndNumbers::getLongestSubArrayOfEqualLettersAndNumbers($arr));
    }

    public function testGetLongestSubArrayOfEqualLettersAndNumbersFromEnd() {
        $arr = [ 'a', 'b', 'c', 'd', 'e', 'f', 0, 6 ];
        $expected = [ 'e', 'f', 0, 6 ];
        $this->assertEquals($expected, LettersAndNumbers::getLongestSubArrayOfEqualLettersAndNumbers($arr));
    }

    public function testGetLongestSubArrayOfEqualLettersAndNumbersInMiddle() {
        $arr = [ 'a', 'b', 'c', 'd', 0, 6, 'e', 'f', 'g', 'h' ];
        $expected = [ 'c', 'd', 0, 6 ];
        $this->assertEquals($expected, LettersAndNumbers::getLongestSubArrayOfEqualLettersAndNumbers($arr));
    }

    public function testGetLongestSubArrayOfEqualLettersAndNumbersWithNoNumbers() {
        $arr = [ 'a', 'b', 'c', 'd', 'e', 'f' ];
        $expected = [];
        $this->assertEquals($expected, LettersAndNumbers::getLongestSubArrayOfEqualLettersAndNumbers($arr));
    }

    public function testGetLongestSubArrayOfEqualLettersAndNumbersWithEmptyArray() {
        $arr = [];
        $expected = [];
        $this->assertEquals($expected, LettersAndNumbers::getLongestSubArrayOfEqualLettersAndNumbers($arr));
    }
}