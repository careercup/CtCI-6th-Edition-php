<?php
require_once __DIR__ . "/RankNode.php";
class RankFromStream
{
    private $root;
    public function __construct($arr=null)
    {
        if ($arr != null) {
            if (!is_array($arr))
                throw new InvalidArgumentException("The stream should be an array.");
            foreach ($arr as $num) {
                $this->track($num);
            }
        }
    }

    public function track($num)
    {
        if ($this->root == null)
            $this->root = new RankNode($num);
        else
            $this->root->insert($num);

    }

    public function getRankOfNumber($num)
    {
        return $this->root->getRank($num);
    }
}
