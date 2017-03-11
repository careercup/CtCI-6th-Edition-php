<?php
require_once __DIR__ . '/../../../src/chapter16/question16.11/DivingBoard.php';

class DivingBoardTest extends \PHPUnit\Framework\TestCase {

    public function testGetPossibleLengthsK5() {
        $k = 5;
        $shorter = 2;
        $longer = 3;
        $expected = [ 10, 11, 12, 13, 14, 15 ];
        $this->assertEquals($expected, DivingBoard::getPossibleLengths($k, $shorter, $longer));
    }

    public function testGetPossibleLengthsK12() {
        $k = 12;
        $shorter = 1;
        $longer = 3;
        $expected = [ 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36 ];
        $this->assertEquals($expected, DivingBoard::getPossibleLengths($k, $shorter, $longer));
    }

    public function testGetPossibleLengthsWithShorterGreaterThanLonger() {
        $this->setExpectedException('InvalidArgumentException');
        $k = 5;
        $shorter = 4;
        $longer = 3;
        DivingBoard::getPossibleLengths($k, $shorter, $longer);
    }
}
