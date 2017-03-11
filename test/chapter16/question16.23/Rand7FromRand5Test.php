<?php
require_once __DIR__ . '/../../../src/chapter16/question16.23/Rand7FromRand5.php';

class Rand7FromRand5Test extends \PHPUnit\Framework\TestCase {

    public function testRand7() {
        $n = 7;
        $resultCounts = [];
        $total = 100000;
        for ($i=0; $i<$total; $i++) {
            $number = Rand7FromRand5::rand7();
            $this->assertTrue($number >= 0);
            $this->assertTrue($number < $n);
            if (!array_key_exists($number, $resultCounts)) {
                $resultCounts[$number] = 0;
            }
            $resultCounts[$number]++;
        }
        $this->assertEquals($n, count($resultCounts));
        $expectedCount = $total / $n;
        foreach ($resultCounts as $number => $count) {
            $epsilon = abs($count/$expectedCount - 1);
            $this->assertTrue($epsilon < 0.025, 'Expected a value close to ' . $expectedCount . ' but found ' . $count . ' which is off by ' . ($epsilon * 100) . '%');
        }
    }

    public function testRand5() {
        $n = 5;
        $resultCounts = [];
        $total = 100000;
        for ($i=0; $i<$total; $i++) {
            $number = Rand7FromRand5::rand5();
            $this->assertTrue($number >= 0);
            $this->assertTrue($number < $n);
            if (!array_key_exists($number, $resultCounts)) {
                $resultCounts[$number] = 0;
            }
            $resultCounts[$number]++;
        }
        $this->assertEquals($n, count($resultCounts));
        $expectedCount = $total / $n;
        foreach ($resultCounts as $number => $count) {
            $epsilon = abs($count/$expectedCount - 1);
            $this->assertTrue($epsilon < 0.025, 'Expected a value close to ' . $expectedCount . ' but found ' . $count . ' which is off by ' . ($epsilon * 100) . '%');
        }
    }
}
