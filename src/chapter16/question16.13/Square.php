<?php namespace bisect_squares;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Point.php';

class Square {
    private $bottomLeft;
    private $size;

    public function __construct(Point $bottomLeft, $size) {
        $this->bottomLeft = $bottomLeft;
        $this->size = $size;
    }

    public function getBottomLeft() {
        return $this->bottomLeft;
    }

    public function getSize() {
        return $this->size;
    }

    public function getCenter() {
        return new Point(
            $this->bottomLeft->getX() + $this->size / 2,
            $this->bottomLeft->getY() + $this->size / 2
        );
    }

    public function __toString() {
        return $this->size . ' x ' . $this->size . ' Square, Bottom Left @ ' . $this->bottomLeft;
    }
}