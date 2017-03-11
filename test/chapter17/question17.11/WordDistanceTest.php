<?php
require_once __DIR__ . '/../../../src/chapter17/question17.11/WordDistance.php';

class WordDistanceTest extends \PHPUnit\Framework\TestCase {

    public function testGetWordDistance() {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'words.txt';
        $this->assertEquals(1, WordDistance::getWordDistance($file, 'text', 'file'));
        $this->assertEquals(1, WordDistance::getWordDistance($file, 'a', 'text'));
        $this->assertEquals(38, WordDistance::getWordDistance($file, 'just', 'bunch'));
        $this->assertEquals(0, WordDistance::getWordDistance($file, 'text', 'text'));
        $this->assertEquals(-1, WordDistance::getWordDistance($file, 'text', 'never'));
    }

    public function testGetWordDistanceFileNotFound() {
        $this->setExpectedException('RuntimeException');
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'non_existent_file.txt';
        WordDistance::getWordDistance($file, 'text', 'file');
    }
}
