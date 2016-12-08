<?php

require_once __DIR__ . '/../../lib/DoublyLinkedListNode.php';

class DoublyLinkedListNodeWithKey extends DoublyLinkedListNode {
    private $key;

    public function __construct($key, $data = null) {
        parent::__construct($data);
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }
}