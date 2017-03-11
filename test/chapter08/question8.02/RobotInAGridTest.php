<?php
require_once __DIR__ . '/../../../src/chapter08/question8.02/RobotInAGrid.php';

class RobotInAGridTest extends \PHPUnit\Framework\TestCase {

    public function testRobotInAGrid3x3() {
        $grid = [
            [ 0, 1, 0 ],
            [ 0, 0, 0 ],
            [ 0, 1, 0 ]
        ];
        $robotInAGrid = new RobotInAGrid($grid);
        $solution = $robotInAGrid->getSolution();
        $expectedSolution = [ 'd', 'r', 'r', 'd' ];
        $this->assertEquals($expectedSolution, $solution);
    }

    public function testRobotInAGrid5x6() {
        $grid = [
            [ 0, 0, 0, 1, 0 ],
            [ 0, 1, 0, 1, 0 ],
            [ 0, 1, 0, 0, 0 ],
            [ 0, 1, 0, 1, 0 ],
            [ 0, 1, 0, 1, 0 ],
            [ 0, 1, 0, 0, 1 ],
            [ 0, 1, 0, 0, 0 ]
        ];
        $robotInAGrid = new RobotInAGrid($grid);
        $solution = $robotInAGrid->getSolution();
        $expectedSolution = [ 'r', 'r', 'd', 'd', 'd', 'd', 'd', 'r', 'd', 'r' ];
        $this->assertEquals($expectedSolution, $solution);
    }

    public function testRobotInAGridWithNoSolution() {
        $grid = [
            [ 0, 0, 0, 0 ],
            [ 0, 1, 0, 1 ],
            [ 0, 0, 0, 1 ],
            [ 0, 0, 1, 0 ]
        ];
        $robotInAGrid = new RobotInAGrid($grid);
        $solution = $robotInAGrid->getSolution();
        $this->assertNull($solution);
    }

    public function testRobotInAGrid1x1() {
        $grid = [ [ 0 ] ];
        $robotInAGrid = new RobotInAGrid($grid);
        $solution = $robotInAGrid->getSolution();
        $expectedSolution = [];
        $this->assertEquals($expectedSolution, $solution);
    }
}
