<?php
require_once __DIR__ . '/../../../src/chapter16/question16.05/FactorialZeros.php';

class FactorialZerosTest extends \PHPUnit\Framework\TestCase {

    public function testGetTrailingZeros() {
        $this->assertEquals(0, FactorialZeros::getTrailingZeros(1)); // 1! = 1
        $this->assertEquals(0, FactorialZeros::getTrailingZeros(2)); // 2! = 2
        $this->assertEquals(0, FactorialZeros::getTrailingZeros(3)); // 3! = 6
        $this->assertEquals(0, FactorialZeros::getTrailingZeros(4)); // 4! = 24
        $this->assertEquals(1, FactorialZeros::getTrailingZeros(5)); // 5! = 120
        $this->assertEquals(1, FactorialZeros::getTrailingZeros(6)); // 6! = 720
        $this->assertEquals(1, FactorialZeros::getTrailingZeros(7)); // 7! = 5040
        $this->assertEquals(1, FactorialZeros::getTrailingZeros(8)); // 8! = 40320
        $this->assertEquals(1, FactorialZeros::getTrailingZeros(9)); // 9! = 362880
        $this->assertEquals(2, FactorialZeros::getTrailingZeros(10)); // 10! = 3628800
        $this->assertEquals(2, FactorialZeros::getTrailingZeros(11)); // 11! = 39916800
        $this->assertEquals(2, FactorialZeros::getTrailingZeros(12)); // 12! = 479001600
        $this->assertEquals(2, FactorialZeros::getTrailingZeros(13)); // 13! = 6227020800
        $this->assertEquals(2, FactorialZeros::getTrailingZeros(14)); // 14! = 87178291200
        $this->assertEquals(3, FactorialZeros::getTrailingZeros(15)); // 15! = 1307674368000
        $this->assertEquals(3, FactorialZeros::getTrailingZeros(16)); // 16! = 20922789888000
        $this->assertEquals(3, FactorialZeros::getTrailingZeros(17)); // 17! = 355687428096000
        $this->assertEquals(3, FactorialZeros::getTrailingZeros(18)); // 18! = 6402373705728000
        $this->assertEquals(3, FactorialZeros::getTrailingZeros(19)); // 19! = 121645100408832000
        $this->assertEquals(4, FactorialZeros::getTrailingZeros(20)); // 20! = 2432902008176640000
        $this->assertEquals(6, FactorialZeros::getTrailingZeros(25)); // 25! = 15511210043330985984000000
        $this->assertEquals(9, FactorialZeros::getTrailingZeros(40)); // 40! = 815915283247897734345611269596115894272000000000
    }
}
