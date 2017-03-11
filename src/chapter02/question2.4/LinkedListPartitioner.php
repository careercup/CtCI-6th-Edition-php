<?php
require_once __DIR__ . '/../../lib/Node.php';

class LinkedListPartitioner {
    public static function partition(Node $node, $x) {
        // build 2 linked lists: one for the values less than $x
        // and one for the values greater than or equal to $x
        $lowerHead = new Node(0); // placeholder node at the head
        $lowerTail = $lowerHead;
        $upperHead = new Node(0); // placeholder node at the head
        $upperTail = $upperHead;
        while ($node !== null) {
            if ($node->getData() < $x) {
                $lowerTail->setNext($node);
                $lowerTail = $node;
            } else {
                $upperTail->setNext($node);
                $upperTail = $node;
            }
            $node = $node->getNext();
        }
        // attach the upper list to the lower list
        // and discard the placeholder nodes
        $lowerTail->setNext($upperHead->getNext());
        $upperTail->setNext(null);
        return $lowerHead->getNext();
    }
}