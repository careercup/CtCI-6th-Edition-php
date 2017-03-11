<?php
require_once __DIR__ . '/../../../src/chapter17/question17.01/AddWithoutPlus.php';

if (!defined('PHP_INT_MIN')) {
    define('PHP_INT_MIN', -PHP_INT_MAX - 1);
}

class AddWithoutPlusTest extends \PHPUnit\Framework\TestCase {

    public function getTestCases() {
        $testCases = [];
        for ($i=-16; $i<=16; $i++) {
            for ($j=-16; $j<=16; $j++) {
                $testCases[] = [ $i, $j, $i + $j ];
            }
        }
        $testCases[] = [ PHP_INT_MAX, PHP_INT_MIN, -1 ];
        $testCases[] = [ PHP_INT_MIN, PHP_INT_MAX, -1 ];
        return $testCases;
    }

    /**
     * @dataProvider getTestCases
     */
    public function testAdd($a, $b, $sum) {
        $this->assertEquals($sum, AddWithoutPlus::add($a, $b));
    }
}
