<?php
require_once __DIR__ . '/../../../src/chapter17/question17.10/MajorityElement.php';

class MajorityElementTest extends \PHPUnit\Framework\TestCase {

    public function testGetMajorityElement() {
        $a = [ 1, 2, 5, 9, 5, 9, 5, 5, 5 ];
        $this->assertEquals(5, MajorityElement::getMajorityElement($a));
    }

    public function testNoGetMajorityElement() {
        $a = [ 1, 2, 5, 9, 5, 9, 99, 99, 99 ];
        $this->assertEquals(-1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithZeroElemnts() {
        $a = [];
        $this->assertEquals(-1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithOneElemnt() {
        $a = [ 50 ];
        $this->assertEquals(50, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithTwoElemnts() {
        $a = [ 50, 60 ];
        $this->assertEquals(-1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithThreeElemnts() {
        $a = [ 50, 60,  60 ];
        $this->assertEquals(60, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithMajorityAtBeginning() {
        $a = [ 9, 9, 9, 9, 3, 3, 3, 3, 3, 9, 9 ];
        $this->assertEquals(9, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithTie() {
        $a = [ 9, 9, 9, 9, 3, 3, 3, 3, 3, 9, 3, 9 ];
        $this->assertEquals(-1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithMajorityAtEnd() {
        $a = [ 3, 5, 3, 9, 5, 3, 3, 9, 9, 9, 9, 9, 9 ];
        $this->assertEquals(9, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithMajorityAtEnd2() {
        $a = [ 0, 0, 1, 2, 2, 0, 1, 0, 1, 1, 1, 1, 1 ];
        $this->assertEquals(1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithCheckerPatternEven() {
        $a = [ 2, 4, 2, 4, 2, 4 ];
        $this->assertEquals(-1, MajorityElement::getMajorityElement($a));
    }

    public function testGetMajorityElementWithCheckerPatternOdd() {
        $a = [ 2, 4, 2, 4, 2 ];
        $this->assertEquals(2, MajorityElement::getMajorityElement($a));
    }
}
