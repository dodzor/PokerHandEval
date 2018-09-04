<?php

namespace PokerHandEval\Responsible;

use PokerHandEval\Card;
use PokerHandEval\Handler;
use PokerHandEval\Hand;

class PairHandler extends Handler
{
    private $rank;

    public function __construct($rank, Handler $handler = null)
    {
        parent::__construct($handler);

        $this->rank = $rank;
    }

    protected function proccessing(Hand $hand)
    {
//        if ($hand->getRank() == $this->rank && isset($this->rank)) {
//            return $this->rank;
//        }

        $numbers = [];

        /**
         * @var  $i
         * @var Card $card
         */
        foreach ($hand->getCards() as $i => $card) {
            $number = $card->getNumber();
            $numbers[] = $number;
        }

        print_r('sorted:' .sort($numbers));
        print_r(PHP_EOL);

        if (count($numbers) !== count(array_unique($numbers))) {
            return $this->rank;
        }

        return null;
    }
}