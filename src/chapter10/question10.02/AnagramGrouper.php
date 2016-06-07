<?php

class AnagramGrouper {

    protected static function getAnagramKey($str) {
        $letterCounts = [
            'a' => 0, 'b' => 0, 'c' => 0, 'd' => 0, 'e' => 0, 'f' => 0,
            'g' => 0, 'h' => 0, 'i' => 0, 'j' => 0, 'k' => 0, 'l' => 0,
            'm' => 0, 'n' => 0, 'o' => 0, 'p' => 0, 'q' => 0, 'r' => 0,
            's' => 0, 't' => 0, 'u' => 0, 'v' => 0, 'w' => 0, 'x' => 0,
            'y' => 0, 'z' => 0
        ];
        for ($i=0, $len=strlen($str); $i<$len; $i++) {
            $ch = strtolower($str[$i]);
            // skip over any non-alpha chars
            if (array_key_exists($ch, $letterCounts)) {
                $letterCounts[$ch]++;
            }
        }
        // concatenate a string based on the letter counts for all
        // letters appearing at least once. This string will be unique
        // for each group of anagrams.
        $anagramKey = '';
        foreach ($letterCounts as $letter => $count) {
            if ($count > 0) {
                $anagramKey .= $count . $letter;
            }
        }
        return $anagramKey;
    }

    public static function groupAnagrams(array &$a) {
        // place anagrams into buckets
        $buckets = [];
        foreach ($a as $word) {
            $anagramKey = self::getAnagramKey($word);
            if (!array_key_exists($anagramKey, $buckets)) {
                $buckets[$anagramKey] = [];
            }
            $buckets[$anagramKey][] = $word;
        }
        // flatten the buckets of anagrams
        $flattened = [];
        foreach ($buckets as $anagrams) {
            $flattened = array_merge($flattened, $anagrams);
        }
        return $flattened;
    }
}