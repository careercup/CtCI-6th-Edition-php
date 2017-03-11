<?php
require_once __DIR__ . '/../../../src/chapter10/question10.08/FindDuplicates.php';

class FindDuplicatesTest extends \PHPUnit\Framework\TestCase {

    public function testPrintDuplicates() {
        $arr = [ 99, 7, 2, 32000, 4, 32, 31, 1, 2, 5, 32, 4, 3, 4, 9, 32000 ];
        ob_start();
        FindDuplicates::printDuplicates($arr);
        $output = ob_get_clean();
        $expectedDuplicates = [ 2, 32, 4, 4, 32000 ];
        $expectedOutput = implode("\n", $expectedDuplicates) . "\n";
        $this->assertEquals($expectedOutput, $output);
    }
}
