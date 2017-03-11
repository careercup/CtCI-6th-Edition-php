<?php
require_once __DIR__ . '/../../../src/chapter16/question16.20/T9.php';

class T9Test extends \PHPUnit\Framework\TestCase {

    public function testGetT9Words() {
        $t9 = new T9(__DIR__ . DIRECTORY_SEPARATOR . 'test_word_list.txt');
        $t9words = $t9->getT9Words(8733);
        $this->assertTrue(in_array('tree', $t9words), '"tree" not found for 8733');
        $this->assertTrue(in_array('used', $t9words), '"used" not found for 8733');
    }

    public function testGetT9WordsWithNoMatches() {
        $t9 = new T9(__DIR__ . DIRECTORY_SEPARATOR . 'test_word_list.txt');
        $t9words = $t9->getT9Words(99);
        $expected = [];
        $this->assertEquals($expected, $t9words);
    }

    public function testGetT9WordsWithInvalidWordListFile() {
        $this->setExpectedException('RuntimeException');
        $t9 = new T9(__DIR__ . DIRECTORY_SEPARATOR . 'missing_word_list.txt');
        $t9->getT9Words(8733);
    }

    public function testTranslateToNumber() {
        $this->assertEquals('8733', T9::translateToNumber('tree'));
    }

    public function testTranslateToNumberWithWhitespace() {
        $this->assertEquals('8294222', T9::translateToNumber('taxi cab'));
    }

    public function testTranslateToNumberWithInvalidChars() {
        $this->assertNull(T9::translateToNumber('@@@'));
    }
}
