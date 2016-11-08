<?php

class Calculator {
    public static function calculate($expression) {
        $terms = self::parse($expression);

        $operators = [
            '/' => function($term1, $term2) {
                return $term1 / $term2;
            },
            '*' => function($term1, $term2) {
                return $term1 * $term2;
            },
            '-' => function($term1, $term2) {
                return $term1 - $term2;
            },
            '+' => function($term1, $term2) {
                return $term1 + $term2;
            }
        ];
        foreach ($operators as $operator => $func) {
            $processed = [];
            $len = count($terms);
            $term = $len > 0 ? $terms[0] : null;
            for ($i=2; $i<$len; $i+=2) {
                if ($terms[$i-1] == $operator) {
                    $term = $func($term, $terms[$i]);
                } else {
                    $processed[] = $term;
                    $processed[] = $terms[$i-1];
                    $term = $terms[$i];
                }
            }
            if ($term !== null) {
                $processed[] = $term;
            }
            $terms = $processed;
        }
        return count($terms) == 1 ? $terms[0] : null;
    }

    protected static function parse($expression) {
        $terms = [];
        $digitBuffer = '';
        $nextTokenCouldBeANegativeSign = true;
        for ($i=0, $len=strlen($expression); $i<$len; $i++) {
            $ch = $expression[$i];
            if (ctype_space($ch)) {
                continue;
            } elseif (ctype_digit($ch) || $ch == '-' && $nextTokenCouldBeANegativeSign) {
                $digitBuffer .= $ch;
                $nextTokenCouldBeANegativeSign = false;
            } elseif (self::isOperator($ch)) {
                if (strlen($digitBuffer) > 0) {
                    $terms[] = (int) $digitBuffer;
                    $digitBuffer = '';
                }
                $terms[] = $ch;
                $nextTokenCouldBeANegativeSign = true;
            } else {
                throw new InvalidArgumentException('Unable to parse expression ' . $expression);
            }
        }
        if (strlen($digitBuffer) > 0) {
             $terms[] = (int) $digitBuffer;
        }
        return $terms;
    }

    protected static function isOperator($ch) {
        return $ch == '+' || $ch == '-' || $ch == '*' || $ch == '/';
    }
}