<?php
require_once __DIR__ . '/../../../src/chapter16/question16.08/EnglishInt.php';

class EnglishIntTest extends \PHPUnit\Framework\TestCase {

    public function getTestCases() {
        return [
            [ 0, 'Zero' ],
            [ 1, 'One' ],
            [ 2, 'Two' ],
            [ 3, 'Three' ],
            [ 4, 'Four' ],
            [ 5, 'Five' ],
            [ 6, 'Six' ],
            [ 7, 'Seven' ],
            [ 8, 'Eight' ],
            [ 9, 'Nine' ],
            [ 10, 'Ten' ],
            [ 11, 'Eleven' ],
            [ 12, 'Twelve' ],
            [ 13, 'Thirteen' ],
            [ 14, 'Fourteen' ],
            [ 15, 'Fifteen' ],
            [ 16, 'Sixteen' ],
            [ 17, 'Seventeen' ],
            [ 18, 'Eighteen' ],
            [ 19, 'Nineteen' ],
            [ 20, 'Twenty' ],
            [ 21, 'Twenty One' ],
            [ 30, 'Thirty' ],
            [ 55, 'Fifty Five' ],
            [ 98, 'Ninety Eight' ],
            [ 100, 'One Hundred' ],
            [ 1234, 'One Thousand, Two Hundred Thirty Four' ],
            [ 645311, 'Six Hundred Forty Five Thousand, Three Hundred Eleven' ],
            [ 100030000, 'One Hundred Million, Thirty Thousand' ],
            [ 18000006, 'Eighteen Million, Six' ],
            [ 610000032999, 'Six Hundred Ten Billion, Thirty Two Thousand, Nine Hundred Ninety Nine' ],
            [ 13000000000000, 'Thirteen Trillion' ],
            [ -1017, 'Negative One Thousand, Seventeen' ]
        ];
    }

    /**
     * @dataProvider getTestCases
     */
    public function testGetEnglishInt($n, $english) {
        $this->assertEquals($english, EnglishInt::getEnglishInt($n));
    }

    public function testNumberOutOfRange() {
        $this->setExpectedException('InvalidArgumentException');
        EnglishInt::getEnglishInt(1000000000000000);
    }
}
