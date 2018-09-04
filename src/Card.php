<?php

namespace PokerHandEval;

class Card
{
    private $number;
    private $suit;

    public function __construct($n)
    {
        switch ($n) {

            case $n <= 13:
                $this->suit = 'clubs';
                $this->number = $n;
                break;

            case $n > 13 && $n <= 26:
                $this->suit = 'diamonds';
                $this->number = $n - 13;
                break;

            case $n > 26 && $n <= 39:
                $this->suit = 'hearts';
                $this->number = $n - 2*13;
                break;

            case $n > 39 && $n <= 52:
                $this->suit = 'spades';
                $this->number = $n - 3*13;
                break;

        }
    }

    public function getNumber()
    {
        return $this->number;
    }
}