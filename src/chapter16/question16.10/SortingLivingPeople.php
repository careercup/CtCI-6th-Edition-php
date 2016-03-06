<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Person.php';

class SortingLivingPeople {
    public static function getYearWithMostLivingPeople(array &$people) {
        $yearDeltaEvents = [];
        foreach ($people as $person) {
            $birthYear = $person->getBirthYear();
            if (!array_key_exists($birthYear, $yearDeltaEvents)) {
                $yearDeltaEvents[$birthYear] = 0;
            }
            $yearDeltaEvents[$birthYear]++; // count of people increases in this year

            $deathYear = $person->getDeathYear();
            if ($deathYear !== null) {
                $yearAfterDeath = $deathYear + 1;
                if (!array_key_exists($yearAfterDeath, $yearDeltaEvents)) {
                    $yearDeltaEvents[$yearAfterDeath] = 0;
                }
                $yearDeltaEvents[$yearAfterDeath]--;  // count of people decreases in this year
            }
        }
        ksort($yearDeltaEvents); // sort by years
        $livingPeople = 0;
        $maxLivingPeople = 0;
        $yearWithMaxLivingPeople = null;
        foreach ($yearDeltaEvents as $year => $delta) {
            $livingPeople += $delta;
            if ($livingPeople > $maxLivingPeople) {
                $maxLivingPeople = $livingPeople;
                $yearWithMaxLivingPeople = $year;
            }
        }
        return $yearWithMaxLivingPeople;
    }
}