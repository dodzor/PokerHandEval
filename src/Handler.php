<?php

namespace PokerHandEval;

abstract class Handler
{
    private $succesor = null;

    public function __construct(Handler $handler = null)
    {
        $this->succesor = $handler;
    }

    final public function handle(Hand $hand)
    {
        $rank = $this->proccessing($hand);

        if ($rank == null) {
            // the hand has not been processed by this handler => see the next
            if ($this->succesor !== null) {
                $rank = $this->succesor->handle($hand);
            }
        }
        return $rank;
    }

    abstract protected function proccessing(Hand $hand);

}
