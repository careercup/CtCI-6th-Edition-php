<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Person.php';

class HashMapLivingPeople {
    public static function getYearWithMostLivingPeople(array &$people, $currentYear=null) {
        if ($currentYear === null) {
            $currentYear = date('Y');
        }
        $livingPeopleHashMap = [];
        $maxLivingPeople = 0;
        $yearWithMaxLivingPeople = null;
        foreach ($people as $person) {
            $endYear = $person->getDeathYear();
            if ($endYear === null) {
                $endYear = $currentYear;
            }
            for ($year=$person->getBirthYear(); $year<=$endYear; $year++) {
                if (!array_key_exists($year, $livingPeopleHashMap)) {
                    $livingPeopleHashMap[$year] = 0;
                }
                $livingPeople = ++$livingPeopleHashMap[$year];
                if ($livingPeople > $maxLivingPeople) {
                    $maxLivingPeople = $livingPeople;
                    $yearWithMaxLivingPeople = $year;
                }
            }
        }
        return $yearWithMaxLivingPeople;
    }
}