<?php
require_once __DIR__ . '/../../../src/chapter10/question10.10/RankFromStream.php';
use PHPUnit\Framework\TestCase;

class RankFromStreamTest extends TestCase
{
    public function testGetRankOfNumber()
    {
        $stream = new RankFromStream(array(20,15,25,10,23,5,13,24));
        $this->assertEquals(3, $stream->getRankOfNumber(15));
        $this->assertEquals(6, $stream->getRankOfNumber(24));
        $this->assertEquals(-1, $stream->getRankOfNumber(22));
    }

    /**
     * @depends testGetRankOfNumber
     */
    public function testTrack()
    {
        $stream = new RankFromStream();
        $stream->track(20);
        $this->assertEquals(0, $stream->getRankOfNumber(20));
        $stream->track(15);
        $this->assertEquals(0, $stream->getRankOfNumber(15));
        $this->assertEquals(1, $stream->getRankOfNumber(20));
        $stream->track(25);
        $this->assertEquals(2, $stream->getRankOfNumber(25));
    }
}
