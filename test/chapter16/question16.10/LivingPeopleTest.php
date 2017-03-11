<?php
require_once __DIR__ . '/../../../src/chapter16/question16.10/HashMapLivingPeople.php';
require_once __DIR__ . '/../../../src/chapter16/question16.10/SortingLivingPeople.php';

class LivingPeopleTest extends \PHPUnit\Framework\TestCase {

    public function testGetYearWithMostLivingPeople() {
        $people = [
            new Person(1900),
            new Person(1908, 1909),
            new Person(1908, 1908),
            new Person(1920, 1991),
            new Person(1950, 1990),
            new Person(1990),
            new Person(1985, 2015),
            new Person(2000),
        ];
        $this->assertEquals(1990, HashMapLivingPeople::getYearWithMostLivingPeople($people, 2016));
        $this->assertEquals(1990, SortingLivingPeople::getYearWithMostLivingPeople($people));
    }
}
