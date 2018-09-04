<?php

namespace PokerHandEval;

class Hand
{
    private $cards = [];
    private $type;

    public function __construct($cards)
    {
        $this->cards = $cards;
//        $this->type = $type;
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function setCards(array $cards)
    {
        $this->cards = $cards;
    }

    public function getRank()
    {
        return $this->type;
    }

    public function setRank($type)
    {
        $this->type = $type;
    }

}