<?php
require_once __DIR__ . '/../../../src/chapter10/question10.02/AnagramGrouper.php';

class AnagramGrouperTest extends \PHPUnit\Framework\TestCase {

    public function testGroupAnagrams() {
        $a = [
            'sale',
            'algorithm',
            'rock',
            'logarithm',
            'cat',
            'act',
            'cherry',
            'apple',
            'seal',
            'banana',
            'cork',
            'ales'
        ];

        $grouped = AnagramGrouper::groupAnagrams($a);

        $expected = [
            'sale',
            'seal',
            'ales',
            'algorithm',
            'logarithm',
            'rock',
            'cork',
            'cat',
            'act',
            'cherry',
            'apple',
            'banana'
        ];
        $this->assertEquals($expected, $grouped);
    }
}
