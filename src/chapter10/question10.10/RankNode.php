<?php
class RankNode
{
    private $leftSize = 0;
    private $left;
    private $right;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function insert($num)
    {
        if ($num <= $this->data) {
            if ($this->left == null)
                $this->left = new RankNode($num);
            else
                $this->left->insert($num);
            $this->leftSize++;
        }
        else {
            if ($this->right == null)
                $this->right = new RankNode($num);
            else
                $this->right->insert($num);
        }
    }

    public function getRank($num)
    {
        if ($num < $this->data) {
            if ($this->left == null)
                return -1;
            return $this->left->getRank($num);
        }
        elseif ($num > $this->data) {
            if ($this->right == null)
                return $this->leftSize + 1;
            $rightRank = $this->right->getRank($num);
            if ($rightRank == -1)
                return -1;

            return $this->leftSize + 1 + $rightRank;
        }
        else
            return $this->leftSize;
    }
}
