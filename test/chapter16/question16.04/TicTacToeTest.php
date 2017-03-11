<?php
require_once __DIR__ . '/../../../src/chapter16/question16.04/TicTacToe.php';

class TicTacToeTest extends \PHPUnit\Framework\TestCase {

    public function testIsXWinnerVertical() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 2));
        $this->assertEquals('x', $ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $expected = "x | o |  " . "\n"
                  . "--+---+--" . "\n"
                  . "x |   | o" . "\n"
                  . "--+---+--" . "\n"
                  . "x |   |  " . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsOWinnerVertical() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 2));
        $this->assertEquals('o', $ticTacToe->makeMoveAndGetWinner('o', 2, 0));
        $expected = "o |   | x" . "\n"
                  . "--+---+--" . "\n"
                  . "o | x |  " . "\n"
                  . "--+---+--" . "\n"
                  . "o |   | x" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsXWinnerHorizontal() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 0));
        $this->assertEquals('x', $ticTacToe->makeMoveAndGetWinner('x', 2, 2));
        $expected = "o | o |  " . "\n"
                  . "--+---+--" . "\n"
                  . "  |   |  " . "\n"
                  . "--+---+--" . "\n"
                  . "x | x | x" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsOWinnerHorizontal() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 2));
        $this->assertEquals('o', $ticTacToe->makeMoveAndGetWinner('o', 1, 2));
        $expected = "  |   | x" . "\n"
                  . "--+---+--" . "\n"
                  . "o | o | o" . "\n"
                  . "--+---+--" . "\n"
                  . "x |   | x" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsXWinnerDiagonalTopLeftToBottomRight() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 1));
        $this->assertEquals('x', $ticTacToe->makeMoveAndGetWinner('x', 0, 0));
        $expected = "x | o | o" . "\n"
                  . "--+---+--" . "\n"
                  . "  | x |  " . "\n"
                  . "--+---+--" . "\n"
                  . "  |   | x" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsOWinnerDiagonalTopLeftToBottomRight() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $this->assertEquals('o', $ticTacToe->makeMoveAndGetWinner('o', 2, 2));
        $expected = "o | x | x" . "\n"
                  . "--+---+--" . "\n"
                  . "  | o |  " . "\n"
                  . "--+---+--" . "\n"
                  . "x |   | o" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsXWinnerDiagonalBottomLeftToTopRight() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 2, 1));
        $this->assertEquals('x', $ticTacToe->makeMoveAndGetWinner('x', 0, 2));
        $expected = "  | o | x" . "\n"
                  . "--+---+--" . "\n"
                  . "  | x |  " . "\n"
                  . "--+---+--" . "\n"
                  . "x | o |  " . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIsOWinnerDiagonalBottomLeftToTopRight() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 2));
        $this->assertEquals('o', $ticTacToe->makeMoveAndGetWinner('o', 2, 0));
        $expected = "x |   | o" . "\n"
                  . "--+---+--" . "\n"
                  . "  | o | x" . "\n"
                  . "--+---+--" . "\n"
                  . "o |   | x" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testTieGame() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 0, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 0, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 2, 2));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 2, 0));
        $expected = "x | o | x" . "\n"
                  . "--+---+--" . "\n"
                  . "o | o | x" . "\n"
                  . "--+---+--" . "\n"
                  . "x | x | o" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function test5x5Game() {
        $ticTacToe = new TicTacToe(5);
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 3, 3));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 4, 4));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 3, 4));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 4, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 3, 0));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 3, 1));
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('o', 1, 4));
        $this->assertEquals('x', $ticTacToe->makeMoveAndGetWinner('x', 3, 2));
        $expected = "  |   |   |   |  " . "\n"
                  . "--+---+---+---+--" . "\n"
                  . "  | o |   |   | o" . "\n"
                  . "--+---+---+---+--" . "\n"
                  . "  |   |   |   |  " . "\n"
                  . "--+---+---+---+--" . "\n"
                  . "x | x | x | x | x" . "\n"
                  . "--+---+---+---+--" . "\n"
                  . "o |   |   |   | o" . "\n";
        $this->assertEquals($expected, (string) $ticTacToe);
    }

    public function testIllegalMove() {
        $ticTacToe = new TicTacToe();
        $this->assertNull($ticTacToe->makeMoveAndGetWinner('x', 1, 1));
        $this->setExpectedException('InvalidArgumentException');
        $ticTacToe->makeMoveAndGetWinner('o', 1, 1);
    }
}
