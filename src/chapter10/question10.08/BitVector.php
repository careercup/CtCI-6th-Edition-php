<?php

class BitVector {
    const DEFAULT_MAX = 32000;
    private $intSize;
    private $data;

    public function __construct($maxN=self::DEFAULT_MAX) {
        $this->intSize = PHP_INT_SIZE * 8;
        $this->data = [];
        for ($i=0, $capacity=0; $capacity<$maxN; $i++, $capacity += $this->intSize) {
            $this->data[$i] = 0;
        }
    }

    public function get($position) {
        $remainder = $position % $this->intSize;
        $offset = ($position - $remainder) / $this->intSize;
        $bitMask = 1 << $remainder;
        return $this->data[$offset] & $bitMask ? true : false;
    }

    public function set($position, $on=true) {
        $remainder = $position % $this->intSize;
        $offset = ($position - $remainder) / $this->intSize;
        $bitMask = 1 << $remainder;
        if ($on) {
            $this->data[$offset] |= $bitMask;
        } else {
            $this->data[$offset] &= ~$bitMask;
        }
    }
}