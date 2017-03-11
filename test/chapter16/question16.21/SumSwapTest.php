<?php
require_once __DIR__ . '/../../../src/chapter16/question16.21/SumSwap.php';

class SumSwapTest extends \PHPUnit\Framework\TestCase {

    public function testFindValuesToSwapForSameSum() {
        $arr1 = [ 4, 1, 2, 1, 1, 2 ];
        $arr2 = [ 3, 6, 3, 3 ];
        $valuesToSwap = SumSwap::findValuesToSwapForSameSum($arr1, $arr2);
        $this->assertNotNull($valuesToSwap);
        $a = $valuesToSwap[0];
        $b = $valuesToSwap[1];
        $this->assertTrue(in_array($a, $arr1), $a . ' is not in input array #1!');
        $this->assertTrue(in_array($b, $arr2), $b . ' is not in input array #2!');
        $this->assertEquals(self::sum($arr1) - $a + $b, self::sum($arr2) - $b + $a);
    }

    public function testFindValuesToSwapForSameSum2() {
        $arr1 = [ 3, 6, 3, 3 ];
        $arr2 = [ 4, 1, 2, 1, 1, 2 ];
        $valuesToSwap = SumSwap::findValuesToSwapForSameSum($arr1, $arr2);
        $this->assertNotNull($valuesToSwap);
        $a = $valuesToSwap[0];
        $b = $valuesToSwap[1];
        $this->assertTrue(in_array($a, $arr1), $a . ' is not in input array #1!');
        $this->assertTrue(in_array($b, $arr2), $b . ' is not in input array #2!');
        $this->assertEquals(self::sum($arr1) - $a + $b, self::sum($arr2) - $b + $a);
    }

    public function testFindValuesToSwapForSameSumZeroDifference() {
        $arr1 = [ 1, 2, 3, 4 ];
        $arr2 = [ 4, 3, 2, 1 ];
        $valuesToSwap = SumSwap::findValuesToSwapForSameSum($arr1, $arr2);
        $this->assertNotNull($valuesToSwap);
        $a = $valuesToSwap[0];
        $b = $valuesToSwap[1];
        $this->assertTrue(in_array($a, $arr1), $a . ' is not in input array #1!');
        $this->assertTrue(in_array($b, $arr2), $b . ' is not in input array #2!');
        $this->assertEquals(self::sum($arr1) - $a + $b, self::sum($arr2) - $b + $a);
    }

    public function testFindValuesToSwapForSameSumZeroDifferenceCannotSwap() {
        $arr1 = [ 1, 2, 3, 4 ];
        $arr2 = [ 10 ];
        $valuesToSwap = SumSwap::findValuesToSwapForSameSum($arr1, $arr2);
        $this->assertNull($valuesToSwap);
    }

    public function testFindValuesToSwapForSameSumOddDifference() {
        $arr1 = [ 1, 2, 3, 5 ];
        $arr2 = [ 1, 2, 2, 3 ];
        $valuesToSwap = SumSwap::findValuesToSwapForSameSum($arr1, $arr2);
        $this->assertNull($valuesToSwap);
    }

    protected static function sum(array &$arr) {
        $sum = 0;
        foreach ($arr as $value) {
            $sum += $value;
        }
        return $sum;
    }
}
