<?php
require_once __DIR__ . '/../../../src/chapter05/question5.6/Conversion.php';

class ConversionTest extends \PHPUnit\Framework\TestCase {

    public function testGetBitFlipCount() {
        $this->assertEquals(2, Conversion::getBitFlipCount(29, 15));
    }
}
