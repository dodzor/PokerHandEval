<?php

namespace PokerHandEval\Responsible;

use PokerHandEval\Handler;
use PokerHandEval\Hand;

class FullHouse extends Handler
{
    private $rank;

    public function __construct($rank, Handler $handler = null)
    {
        parent::__construct($handler);

        $this->rank = $rank;
    }

    protected function proccessing(Hand $hand)
    {
        if ($hand->getRank() == $this->rank && isset($this->rank)) {
            return $this->rank;
        }
        return null;
    }
}