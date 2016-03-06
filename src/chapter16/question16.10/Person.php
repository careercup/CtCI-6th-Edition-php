<?php

class Person {
    private $birthYear;
    private $deathYear;

    public function __construct($birthYear, $deathYear=null) {
        $this->birthYear = $birthYear;
        $this->deathYear = $deathYear;
    }

    public function getBirthYear() {
        return $this->birthYear;
    }

    public function getDeathYear() {
        return $this->deathYear;
    }
}