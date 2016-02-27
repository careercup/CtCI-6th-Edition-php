<?php

class TowersOfHanoi {
    private $height;
    private $pegStacks;

    public function __construct($height) {
        $this->height = $height;
        $this->pegStacks = [ [], [], [] ];
        // place all rings on the first peg
        for ($i=$this->height; $i>0; $i--) {
            array_push($this->pegStacks[0], $i);
        }
    }

    public function solve() {
        // print the initial state of the puzzle
        echo $this;
        $this->moveRings($this->height, 0, 1, 2);
    }

    private function moveRings($numberOfRings, $sourcePegIndex, $intermediatePegIndex, $destinationPegIndex) {
        if ($numberOfRings > 1) {
            $this->moveRings($numberOfRings-1, $sourcePegIndex, $destinationPegIndex, $intermediatePegIndex);
        }
        $this->moveRing($sourcePegIndex, $destinationPegIndex);
        // print the state of the puzzle after each ring has been moved
        echo "\n" . $this;
        if ($numberOfRings > 1) {
            $this->moveRings($numberOfRings-1, $intermediatePegIndex, $sourcePegIndex, $destinationPegIndex);
        }
    }

    private function moveRing($sourcePegIndex, $destinationPegIndex) {
        $ring = array_pop($this->pegStacks[$sourcePegIndex]);
        array_push($this->pegStacks[$destinationPegIndex], $ring);
    }

    /**
     * @return string A string representation of the current state of the puzzle
     */
    public function __toString() {
        // 3 temporary holding stacks for rings, while we draw the board
        $tempStacks = [ [], [], [] ];
        $s = '';
        for ($i=$this->height; $i>=0; $i--) {
            for ($j=0; $j<3; $j++) {
                $stackHeight = count($this->pegStacks[$j]);
                if ($i < $stackHeight) {
                    // remove a ring so we'll be able to inspect the next one under it in the stack
                    $ring = array_pop($this->pegStacks[$j]);
                    // store the ring on the temporary stack
                    array_push($tempStacks[$j], $ring);
                    $indent = $this->height - $ring;
                    $middle = str_repeat('#', $ring * 2 + 1);
                } else {
                    $indent = $this->height;
                    $middle = '|';
                }
                $spaces = str_repeat(' ', $indent);
                $s .= $spaces . $middle . $spaces;
            }
            $s .= "\n";
        }
        $base = str_repeat('-', $this->height * 6 + 3);
        $s .= $base . "\n";
        // move all the rings from the temporary stacks back to where they were.
        for ($i=0; $i<3; $i++) {
            while (!empty($tempStacks[$i])) {
                $ring = array_pop($tempStacks[$i]);
                array_push($this->pegStacks[$i], $ring);
            }
        }
        return $s;
    }
}