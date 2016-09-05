<?php

class WordDistance {
    private static $wordMaps = [];

    protected static function buildWordMap($file) {
        $handle = @fopen($file, 'r');
        if (!$handle) {
            throw new RuntimeException('File not found: ' . $file);
        }
        $wordMap = [];
        $buffer = '';
        $wordIndex = 0;
        while (!feof($handle)) {
            $ch = fread($handle, 1);
            if (ctype_alpha($ch)) {
                $buffer .= strtolower($ch);
            } elseif ($buffer !== '') {
                if (!array_key_exists($buffer, $wordMap)) {
                    $wordMap[$buffer] = [];
                }
                $wordMap[$buffer][] = $wordIndex++;
                $buffer = '';
            }
        }
        if ($buffer !== '') {
            if (!array_key_exists($buffer, $wordMap)) {
                $wordMap[$buffer] = [];
            }
            $wordMap[$buffer][] = $wordIndex++;
        }
        fclose($handle);
        return $wordMap;
    }

    public static function getWordDistance($file, $word1, $word2) {
        if (!array_key_exists($file, self::$wordMaps)) {
            self::$wordMaps[$file] = self::buildWordMap($file);
        }
        $wordMap = self::$wordMaps[$file];
        $word1 = strtolower(trim($word1));
        $word2 = strtolower(trim($word2));
        if (!array_key_exists($word1, $wordMap) || !array_key_exists($word2, $wordMap)) {
            return -1;
        }
        if ($word1 == $word2) {
            return 0;
        }
        $word1Positions = $wordMap[$word1];
        $word2Positions = $wordMap[$word2];

        $word1Count = count($word1Positions);
        $word2Count = count($word2Positions);

        $minDistance = null;
        $i = 0;
        $j = 0;
        while ($i < $word1Count && $j < $word2Count) {
            $distance = abs($word1Positions[$i] - $word2Positions[$j]);
            if ($minDistance === null || $distance < $minDistance) {
                $minDistance = $distance;
            }
            if ($word1Positions[$i] < $word2Positions[$j]) {
                $i++;
            } else {
                $j++;
            }
        }
        return $minDistance;
    }
}
