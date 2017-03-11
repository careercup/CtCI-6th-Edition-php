<?php
require_once __DIR__ . '/../../../src/chapter08/question8.06/TowersOfHanoi.php';

class TowersOfHanoiTest extends \PHPUnit\Framework\TestCase {

    public function testTowersOfHanoiWithOneRing() {
        $towersOfHanoi = new TowersOfHanoi(1);
        ob_start();
        $towersOfHanoi->solve();
        $output = ob_get_clean();
        $expectedOutput = file_get_contents(__DIR__ . '/resources/1_ring_expected_output.txt');
        $this->assertEquals($expectedOutput, $output);
    }

    public function testTowersOfHanoiWithTwoRings() {
        $towersOfHanoi = new TowersOfHanoi(2);
        ob_start();
        $towersOfHanoi->solve();
        $output = ob_get_clean();
        $expectedOutput = file_get_contents(__DIR__ . '/resources/2_rings_expected_output.txt');
        $this->assertEquals($expectedOutput, $output);
    }

    public function testTowersOfHanoiWithThreeRings() {
        $towersOfHanoi = new TowersOfHanoi(3);
        ob_start();
        $towersOfHanoi->solve();
        $output = ob_get_clean();
        $expectedOutput = file_get_contents(__DIR__ . '/resources/3_rings_expected_output.txt');
        $this->assertEquals($expectedOutput, $output);
    }

    public function testTowersOfHanoiWithFourRings() {
        $towersOfHanoi = new TowersOfHanoi(4);
        ob_start();
        $towersOfHanoi->solve();
        $output = ob_get_clean();
        $expectedOutput = file_get_contents(__DIR__ . '/resources/4_rings_expected_output.txt');
        $this->assertEquals($expectedOutput, $output);
    }
}
