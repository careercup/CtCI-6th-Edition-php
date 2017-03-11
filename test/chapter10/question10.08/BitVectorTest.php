<?php
require_once __DIR__ . '/../../../src/chapter10/question10.08/BitVector.php';

class BitVectorTest extends \PHPUnit\Framework\TestCase {

    public function testBitVector() {
        $bitVector = new BitVector();
        $this->assertFalse($bitVector->get(10000));
        $bitVector->set(10000);
        $this->assertTrue($bitVector->get(10000));
        $bitVector->set(10000, false);
        $this->assertFalse($bitVector->get(10000));
    }
}
