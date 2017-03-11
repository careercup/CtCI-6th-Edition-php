<?php
require_once __DIR__ . '/../../../src/chapter16/question16.25/LRUCache.php';

class LRUCacheTest extends \PHPUnit\Framework\TestCase {

    public function testLRUCacheSizeFive() {
        $cache = new LRUCache(5);
        $this->assertNull($cache->get(1));
        $this->assertEquals(0, $cache->getSize());
        $cache->set(1, 100);
        $this->assertEquals(100, $cache->get(1));
        $this->assertEquals(1, $cache->getSize());
        $cache->set(2, 200);
        $cache->set(3, 300);
        $cache->set(4, 400);
        $cache->set(5, 500);
        $this->assertEquals(5, $cache->getSize());
        $cache->set(6, 600);
        $this->assertNull($cache->get(1));
        $this->assertEquals(5, $cache->getSize());
        $this->assertEquals(300, $cache->get(3));
        $this->assertEquals(200, $cache->get(2));
        $cache->set(3, -300);
        $this->assertEquals(-300, $cache->get(3));
        $cache->set(7, 700);
        $cache->set(8, 800);
        $this->assertEquals(5, $cache->getSize());
        $cache->set(9, 900);
        $this->assertNull($cache->get(6));
    }

    public function testLRUCacheSizeOne() {
        $cache = new LRUCache(1);
        $this->assertNull($cache->get(1));
        $cache->set(1, 100);
        $this->assertEquals(100, $cache->get(1));
        $cache->set(2, 200);
        $this->assertNull($cache->get(1));
        $this->assertEquals(200, $cache->get(2));
    }

    public function testLRUCacheSizeZero() {
        $cache = new LRUCache(0);
        $this->assertNull($cache->get(1));
        $cache->set(1, 100);
        $this->assertNull($cache->get(1));
    }
}
