<?php

namespace PokerHandEval;

use PokerHandEval\Responsible\FourOfaKindHandler;
use PokerHandEval\Responsible\FullHouse;
use PokerHandEval\Responsible\HighCardHandler;
use PokerHandEval\Responsible\PairHandler;
use PokerHandEval\Responsible\RoyalFlushHandler;
use PokerHandEval\Responsible\StraightFlushHandler;

class ChainFactory
{
    public function createChain()
    {
//        return new RoyalFlushHandler(1,
//                   new StraightFlushHandler(2,
//                       new FourOfaKindHandler(3,
//                           new FullHouse(4))));

        return new PairHandler(1,
            new HighCardHandler(2));
    }
}