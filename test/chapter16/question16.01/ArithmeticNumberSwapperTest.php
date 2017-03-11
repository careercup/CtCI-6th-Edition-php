<?php
require_once __DIR__ . '/../../../src/chapter16/question16.01/ArithmeticNumberSwapper.php';

class ArithmeticNumberSwapperTest extends \PHPUnit\Framework\TestCase {

    public function testSwap() {
        $a = 23762;
        $b = 7823;
        ArithmeticNumberSwapper::swap($a, $b);
        $this->assertEquals(7823, $a);
        $this->assertEquals(23762, $b);
    }

    public function testSwapWithOneNegativeNumber() {
        $a = 67;
        $b = -36743;
        ArithmeticNumberSwapper::swap($a, $b);
        $this->assertEquals(-36743, $a);
        $this->assertEquals(67, $b);
    }

    public function testSwapWithTwoNegativeNumbers() {
        $a = -4;
        $b = -1788712;
        ArithmeticNumberSwapper::swap($a, $b);
        $this->assertEquals(-1788712, $a);
        $this->assertEquals(-4, $b);
    }

    public function testSwapWithSameVariable() {
        $a = 100;
        ArithmeticNumberSwapper::swap($a, $a);
        $this->assertEquals(100, $a);
    }
}
