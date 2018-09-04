<?php

require_once __DIR__ . '/vendor/autoload.php';

use PokerHandEval\ChainFactory;
use PokerHandEval\Hand;
use PokerHandEval\DeckFactory;
use PokerHandEval\Dealer;


$dealer = new Dealer();
$deck = (new DeckFactory())->createDeck();
$deck = $dealer->shuffleCards($deck, 52);

$cards1 = array_slice($deck, 0, 5);
$cards2 = array_slice($deck, 5, 5);

$hand1 = new Hand($cards1);
$hand2 = new Hand($cards2);

print_r($hand1);
print_r($hand2);

$chain = (new ChainFactory())->createChain();

$rank1 = $chain->handle($hand1);
$rank2 = $chain->handle($hand2);

print_r('Rank 1: '. $rank1);
print_r(PHP_EOL);
print_r('rank 2: '. $rank2);













