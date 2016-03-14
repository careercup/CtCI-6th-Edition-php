<?php

class T9 {
    // The default word list file comes bundled with OSX.
    // On Ubuntu Linux, you can install it with the following command:
    // sudo apt-get install wamerican
    const DEFAULT_WORD_LIST_PATH = '/usr/share/dict/words';
    private static $letterMap = [
        'a' => '2', 'b' => '2', 'c' => '2',
        'd' => '3', 'e' => '3', 'f' => '3',
        'g' => '4', 'h' => '4', 'i' => '4',
        'j' => '5', 'k' => '5', 'l' => '5',
        'm' => '6', 'n' => '6', 'o' => '6',
        'p' => '7', 'q' => '7', 'r' => '7', 's' => '7',
        't' => '8', 'u' => '8', 'v' => '8',
        'w' => '9', 'x' => '9', 'y' => '9', 'z' => '9',
        '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4',
        '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9'
    ];
    private $wordListPath;
    private $numberWordMap;

    public function __construct($wordListPath=self::DEFAULT_WORD_LIST_PATH) {
        $this->wordListPath = $wordListPath;
        $this->numberWordMap = null;
    }

    public  function getT9Words($number) {
        if ($this->numberWordMap === null) {
            $this->init();
        }
        if (!array_key_exists($number, $this->numberWordMap)) {
            return [];
        }
        return $this->numberWordMap[$number];
    }

    protected function init() {
        $handle = @fopen($this->wordListPath, 'r');
        if ($handle === false) {
            throw new RuntimeException('Error reading file: ' . $this->wordListPath);
        }
        $this->numberWordMap = [];
        while (($line = fgets($handle)) !== false) {
            $word = trim($line);
            if (empty($word)) {
                continue;
            }
            $number = self::translateToNumber($word);
            if ($number !== null) {
                if (!array_key_exists($number, $this->numberWordMap)) {
                    $this->numberWordMap[$number] = [];
                }
                array_push($this->numberWordMap[$number], $word);
            }
        }
        fclose($handle);
    }

    public static function translateToNumber($word) {
        $word = strtolower($word);
        $number = '';
        for ($i=0, $length=strlen($word); $i<$length; $i++) {
            $char = $word[$i];
            if (ctype_space($char)) {
                continue;
            }
            if (!array_key_exists($char, self::$letterMap)) {
                return null;
            }
            $number .= self::$letterMap[$char];
        }
        return $number !== '' ? $number : null;
    }
}