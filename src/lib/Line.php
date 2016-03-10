<?php namespace Geom;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Point.php';

/**
 * Line represented by the formula y = mx + b
 * m = slope (null for undefined slope ie. vertical lines)
 * b = y-intercept (or x-intercept in the special case of vertical lines)
 */
class Line {
    private $m;
    private $b;

    public function __construct($m, $b) {
        $this->m = $m;
        $this->b = $b;
    }

    public function __toString() {
        if ($this->m === null) {
            // vertical line with undefined slope
            return 'x = ' . $this->b; // for vertical lines, overload b as the x-intercept
        }
        $str = 'y = ';
        if ($this->m === 0) {
            // horizontal line with zero slope
            $str .= $this->b;
        } else {
            if ($this->m == -1) {
                $str .= '-';
            } elseif ($this->m != 1) {
                $str .= $this->m;
            }
            $str .= 'x';
            if ($this->b > 0) {
                $str .= ' + ' . $this->b;
            } elseif ($this->b < 0) {
                $str .= ' - ' . -$this->b;
            }
        }
        return $str;
    }

    public static function buildFromPoints(Point $p1, Point $p2) {
        // slope = rise/run
        $run = $p2->getX() - $p1->getX();
        if ($run != 0) {
            $rise = $p2->getY() - $p1->getY();
            $m = $rise / $run;
            // formula for a line: y = mx + b
            // solve for b: b = y - mx
            $b = $p1->getY() - $m * $p1->getX();
        } else {
            // vertical line with undefined slope
            $m = null;
            // for vertical lines, overload b as the x-intercept
            $b = $p1->getX();
        }
        return new Line($m, $b);
    }
}