<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'DoublyLinkedListNodeWithKey.php';

class LRUCache {
    private $capacity;
    private $map;
    private $head;
    private $tail;
    private $size;

    public function __construct($capacity) {
        $this->capacity = $capacity;
        $this->map = [];
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function getSize() {
        return $this->size;
    }

    public function get($key) {
        if (!array_key_exists($key, $this->map)) {
            return null;
        }
        $node = $this->map[$key];
        $this->resetTail($node);
        if (self::removeFromListUnlessHead($node)) {
            $this->setHead($node);
        }
        return $node->getData();
    }

    public function set($key, $data) {
        if (array_key_exists($key, $this->map)) {
            $node = $this->map[$key];
            $this->resetTail($node);
            if (self::removeFromListUnlessHead($node)) {
                $this->setHead($node);
            }
            $node->setData($data);
        } else {
            $node = new DoublyLinkedListNodeWithKey($key, $data);
            $this->setHead($node);
            $this->map[$key] = $node;
            $this->size++;
        }
        // trim the tail
        while ($this->size > $this->capacity) {
            unset($this->map[$this->tail->getKey()]);
            $this->tail = $this->tail->getPrevious();
            if ($this->tail != null) {
                $this->tail->setNext(null);
            }
            $this->size--;
        }
    }

    protected function setHead(DoublyLinkedListNodeWithKey $node) {
        $node->setNext($this->head);
        $node->setPrevious(null);
        if ($this->head !== null) {
            $this->head->setPrevious($node);
        } else {
            $this->tail = $node;
        }
        $this->head = $node;
    }

    protected function resetTail(DoublyLinkedListNodeWithKey $node) {
        if ($node->getNext() === null) {
            $this->tail = $node->getPrevious();
            if ($this->tail === null) {
                $this->tail = $this->head;
            } else {
                $this->tail->setNext(null);
            }
        }
    }

    protected static function removeFromListUnlessHead(DoublyLinkedListNodeWithKey $node) {
        $previous = $node->getPrevious();
        if ($previous === null) {
            return false;
        }
        $next = $node->getNext();
        if ($next !== null) {
            $previous->setNext($next);
            $next->setPrevious($previous);
            $node->setNext(null);
        } else {
            $previous->setNext(null);
        }
        $node->setPrevious(null);
        return true;
    }
}