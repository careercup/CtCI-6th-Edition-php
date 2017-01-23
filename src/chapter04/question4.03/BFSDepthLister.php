<?php
require_once __DIR__ . '/../../lib/BinaryTreeNode.php';
require_once __DIR__ . '/../../lib/LinkedList.php';

class BFSDepthLister {
    public static function getDepths(BinaryTreeNode $n) {
        $depths = [];
        $q = new LinkedList();
        $q->add($n);
        $depthCache = [ $n->getData() => 0 ];
        $visited = [ $n->getData() => 1 ];
        while (!$q->isEmpty()) {
            $node = $q->removeFirst();
            $depth = $depthCache[$node->getData()];
            if (!array_key_exists($depth, $depths)) {
                $depths[$depth] = new LinkedList();
            }
            $depths[$depth]->add($node);
            $left = $node->getLeft();
            if ($left !== null && !array_key_exists($left->getData(), $visited)) {
                $visited[$left->getData()] = 1;
                $depthCache[$left->getData()] = $depth + 1;
                $q->add($left);
            }
            $right = $node->getRight();
            if ($right !== null && !array_key_exists($right->getData(), $visited)) {
                $visited[$right->getData()] = 1;
                $depthCache[$right->getData()] = $depth + 1;
                $q->add($right);
            }
        }
        return $depths;
    }
}
