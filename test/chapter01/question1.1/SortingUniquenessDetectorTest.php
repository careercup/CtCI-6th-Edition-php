<?php
require_once __DIR__ . '/../../../src/chapter01/question1.1/SortingUniquenessDetector.php';

class SortingUniquenessDetectorTest extends \PHPUnit\Framework\TestCase {
    public function testIsUnique() {
        $this->assertTrue(SortingUniquenessDetector::isUnique("abcdefg"));
        $this->assertFalse(SortingUniquenessDetector::isUnique("level"));
    }
}
