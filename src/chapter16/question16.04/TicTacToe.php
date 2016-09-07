<?php

class TicTacToe {
    const DEFAULT_DIMENSION = 3;
    private $board;
    private $rowSums;
    private $colSums;
    private $diagonalTopLeftToBottomRightSum;
    private $diagonalBottomLeftToTopRightSum;
    private $n;

    public function __construct($n = self::DEFAULT_DIMENSION) {
        $this->n = $n;
        $this->board = [];
        $this->rowSums = [];
        $this->colSums = [];
        for ($i=0; $i < $this->n; $i++) {
            $this->rowSums[$i] = 0;
            $this->colSums[$i] = 0;
        }
        $this->diagonalTopLeftToBottomRightSum = 0;
        $this->diagonalBottomLeftToTopRightSum = 0;
    }

    public function makeMoveAndGetWinner($player, $row, $col) {
        $this->setMove($player, $row, $col);
        $delta = strtolower($player) == 'x' ? 1 : -1;
        $this->rowSums[$row] += $delta;
        $this->colSums[$col] += $delta;
        if ($row == $col) {
            $this->diagonalTopLeftToBottomRightSum += $delta;
        }
        if ($this->n - 1 - $row == $col) {
            $this->diagonalBottomLeftToTopRightSum += $delta;
        }
        return $this->getWinner($row, $col);
    }

    private function getWinner($row, $col) {
        if ($this->rowSums[$row] == $this->n
            || $this->colSums[$col] == $this->n
            || $this->diagonalTopLeftToBottomRightSum == $this->n
            || $this->diagonalBottomLeftToTopRightSum == $this->n) {
            return 'x';
        } elseif ($this->rowSums[$row] == -$this->n
            || $this->colSums[$col] == -$this->n
            || $this->diagonalTopLeftToBottomRightSum == -$this->n
            || $this->diagonalBottomLeftToTopRightSum == -$this->n) {
            return 'o';
        }
        return null;
    }

    private function setMove($player, $row, $col) {
        if ($this->getMove($row, $col) !== ' ') {
            throw new InvalidArgumentException('position (' . $row . ',' . $col . ') is already occupied');
        }
        if (!array_key_exists($row, $this->board)) {
            $this->board[$row] = [];
        }
        $this->board[$row][$col] = strtolower($player);
    }

    private function getMove($row, $col) {
        return isset($this->board[$row][$col]) ? $this->board[$row][$col] : ' ';
    }

    public function __toString() {
        $ticTacToe = '';
        $horizontalDelimiter = '--' . str_repeat('+---', $this->n - 2) . '+--';
        for ($row = 0; $row < $this->n; $row++) {
            if ($row > 0) {
                $ticTacToe .= $horizontalDelimiter . "\n";
            }
            for ($col = 0; $col < $this->n; $col++) {
                if ($col > 0) {
                    $ticTacToe .= ' | ';
                }
                $ticTacToe .= $this->getMove($row, $col);
            }
            $ticTacToe .= "\n";
        }
        return $ticTacToe;
    }
}