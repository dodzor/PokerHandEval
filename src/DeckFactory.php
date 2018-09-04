<?php

namespace PokerHandEval;

use PokerHandEval\Card;

class DeckFactory
{
    CONST count = 52;

    private $deck = [];

    public function createDeck()
    {
        for ($i = 1; $i <= self::count; $i++) {
            $this->deck[] = new Card($i);
        }

        return $this->deck;
    }


}