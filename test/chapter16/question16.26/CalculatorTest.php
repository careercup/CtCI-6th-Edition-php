<?php
require_once __DIR__ . '/../../../src/chapter16/question16.26/Calculator.php';

class CalculatorTest extends \PHPUnit\Framework\TestCase {

    public function testCalculate() {
        $expression = '2 * 3 + 5 / 6 * 3 + 15';
        $this->assertEquals(23.5, Calculator::calculate($expression));
    }

    public function testCalculateWithNegativeNumbers() {
        $expression = '-44 - -22 * 3 + -2';
        $this->assertEquals(20, Calculator::calculate($expression));
    }

    public function testCalculateLongerExpression() {
        $expression = '6/5*3+4*5/2-12/6*3/3+3+3';
        $this->assertEquals(17.6, Calculator::calculate($expression));
    }

    public function testCalculateWithOneTerm() {
        $expression = '99';
        $this->assertEquals(99, Calculator::calculate($expression));
    }

    public function testCalculateEmptyExpression() {
        $expression = '';
        $this->assertNull(Calculator::calculate($expression));
    }

    public function testInvalidInput() {
        $this->setExpectedException('InvalidArgumentException');
        $expression = '2 * 3 + 5 / 6invalid * 3 + 15';
        Calculator::calculate($expression);
    }
}
