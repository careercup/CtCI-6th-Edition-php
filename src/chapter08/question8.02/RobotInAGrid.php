<?php

class RobotInAGrid {
    const DOWN = 'd';
    const RIGHT = 'r';
    private $grid;
    private $rows;
    private $columns;

    public function __construct(array &$grid) {
        $this->grid = &$grid;
        $this->rows = count($grid);
        $this->columns = $this->rows > 0 ? count($grid[0]) : 0;
    }

    public function getSolution($r=0, $c=0, array &$solutionCache=[]) {
        if ($r+1 == $this->rows && $c+1 == $this->columns) {
            return [];
        }
        if (array_key_exists($r, $solutionCache) && array_key_exists($c, $solutionCache[$r])) {
            return $solutionCache[$r][$c];
        }
        if ($c+1 < $this->columns && empty($this->grid[$r][$c+1])) {
            $solution = $this->getSolution($r, $c+1, $solutionCache);
            if ($solution !== null) {
                array_unshift($solution, self::RIGHT);
                self::cache($r, $c, $solution, $solutionCache);
                return $solution;
            }
        }
        if ($r+1 < $this->rows && empty($this->grid[$r+1][$c])) {
            $solution = $this->getSolution($r+1, $c, $solutionCache);
            if ($solution !== null) {
                array_unshift($solution, self::DOWN);
                self::cache($r, $c, $solution, $solutionCache);
                return $solution;
            }
        }
        self::cache($r, $c, null, $solutionCache);
        return null;
    }

    private static function cache($r, $c, array $solution=null, array &$solutionCache) {
        if (!array_key_exists($r, $solutionCache)) {
            $solutionCache[$r] = [];
        }
        $solutionCache[$r][$c] = $solution;
    }
}