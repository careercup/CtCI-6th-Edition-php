<?php

class SortedMatrixSearch {

    public static function searchMatrix(array &$matrix, $target, $topStart=0, $leftStart=0, $bottomStart=null, $rightStart=null) {
        if ($bottomStart === null) {
            $bottomStart = count($matrix) - 1;
        }
        if ($rightStart === null) {
            $rightStart = count($matrix) > 0 ? count($matrix[0]) - 1 : 0;
        }
        if ($leftStart > $rightStart || $topStart > $bottomStart) {
            return null;
        }
        $top = $topStart;
        $left = $leftStart;
        $bottom = $bottomStart;
        $right = $rightStart;

        // 2D binary search
        while ($left < $right || $top < $bottom) {
            $horizontalMiddle = $left + self::integerDivision($right - $left, 2);
            $verticalMiddle = $top + self::integerDivision($bottom - $top, 2);
            $value = $matrix[$verticalMiddle][$horizontalMiddle];
            if ($value < $target) {
                $left = $left != $right ? $horizontalMiddle + 1 : $left;
                $top = $top != $bottom ? $verticalMiddle + 1 : $top;
            } else if ($value > $target) {
                $right = $left != $right ? $horizontalMiddle - 1 : $right;
                $bottom = $top != $bottom ? $verticalMiddle - 1 : $bottom;
            } else {
                $left = $right = $horizontalMiddle;
                $top = $bottom = $verticalMiddle;
            }
        }
        if ($matrix[$top][$left] < $target) {
            $result = self::searchMatrix($matrix, $target, $top + 1, $left + 1, $bottomStart, $rightStart);
            if ($result !== null) {
                return $result;
            }
        } else if ($matrix[$top][$left] > $target) {
            $result = self::searchMatrix($matrix, $target, $topStart, $leftStart, $bottom - 1, $right - 1);
            if ($result !== null) {
                return $result;
            }
        } else {
            return [ $top, $left ];
        }
        $result = self::binarySearchHorizontal($matrix, $target, $top, $leftStart, $rightStart);
        if ($result !== null) {
            return $result;
        }
        $result = self::binarySearchVertical($matrix, $target, $left, $topStart, $bottomStart);
        if ($result !== null) {
            return $result;
        }
        $result = self::searchMatrix($matrix, $target, $top + 1, $leftStart, $bottomStart, $left - 1);
        if ($result !== null) {
            return $result;
        }
        $result = self::searchMatrix($matrix, $target, $topStart, $left + 1, $top - 1, $rightStart);
        if ($result !== null) {
            return $result;
        }
        return null;
    }

    protected static function binarySearchHorizontal(array &$matrix, $target, $row, $left, $right) {
        while ($left < $right) {
            $horizontalMiddle = $left + self::integerDivision($right - $left, 2);
            $value = $matrix[$row][$horizontalMiddle];
            if ($value < $target) {
                $left = $horizontalMiddle + 1;
            } else if ($value > $target) {
                $right = $horizontalMiddle - 1;
            } else {
                $left = $right = $horizontalMiddle;
            }
        }
        if ($matrix[$row][$left] == $target) {
            return [ $row, $left ];
        }
        return null;
    }

    protected static function binarySearchVertical(array &$matrix, $target, $col, $top, $bottom) {
        while ($top < $bottom) {
            $verticalMiddle = $top + self::integerDivision($bottom - $top, 2);
            $value = $matrix[$verticalMiddle][$col];
            if ($value < $target) {
                $top = $verticalMiddle + 1;
            } else if ($value > $target) {
                $bottom = $verticalMiddle - 1;
            } else {
                $top = $bottom = $verticalMiddle;
            }
        }
        if ($matrix[$top][$col] == $target) {
            return [ $top, $col ];
        }
        return null;
    }

    private static function integerDivision($numerator, $denominator) {
        $remainder = $numerator % $denominator;
        return ($numerator - $remainder) / $denominator;
    }
}