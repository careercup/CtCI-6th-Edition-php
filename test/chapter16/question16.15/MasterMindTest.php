<?php
require_once __DIR__ . '/../../../src/chapter16/question16.15/MasterMind.php';

class MasterMindTest extends \PHPUnit\Framework\TestCase {

    public function testGetMoveResult() {
        $guess = [ 'G', 'G', 'R', 'R' ];
        $solution = [ 'R', 'G', 'B', 'Y' ];
        $expected = [ 'hits' => 1, 'pseudo-hits' => 1 ];
        $this->assertEquals($expected, MasterMind::getMoveResult($guess, $solution));
    }

    public function testGetMoveResultAllHits() {
        $guess = [ 'R', 'G', 'B', 'Y' ];
        $solution = [ 'R', 'G', 'B', 'Y' ];
        $expected = [ 'hits' => 4, 'pseudo-hits' => 0 ];
        $this->assertEquals($expected, MasterMind::getMoveResult($guess, $solution));
    }

    public function testGetMoveResultAllPseudoHits() {
        $guess = [ 'G', 'G', 'R', 'R' ];
        $solution = [ 'R', 'R', 'G', 'G' ];
        $expected = [ 'hits' => 0, 'pseudo-hits' => 4 ];
        $this->assertEquals($expected, MasterMind::getMoveResult($guess, $solution));
    }
}
