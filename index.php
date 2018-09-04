<?php

require_once __DIR__ . '/vendor/autoload.php';

use PokerHandEval\ChainFactory;
use PokerHandEval\Hand;
use PokerHandEval\DeckFactory;

//
//$cards = [0, 1, 2, 3, 4, 5, 6, 7, 8,
//    9, 10, 11, 12, 13, 14, 15,
//    16, 17, 18, 19, 20, 21, 22,
//    23, 24, 25, 26, 27, 28, 29,
//    30, 31, 32, 33, 34, 35, 36,
//    37, 38, 39, 40, 41, 42, 43,
//    44, 45, 46, 47, 48, 49, 50, 51];
//
//
//$chain = (new ChainFactory())->createChain();
//$hand1 = new Hand(1);
//$hand2 = new Hand(3);

//$chain->handle($hand2);


$deck = (new DeckFactory())->createDeck();
$deck = shuffleCards($deck, 52);

$cards1 = array_slice($deck, 0, 5);
$cards2 = array_slice($deck, 5, 5);

//printCards($cards1);

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



//print_r($deck);



function printCards($cards)
{
    for ($i = 0; $i < count($cards); $i++) {
        print_r($cards[$i]);
    }
}


function shuffleCards($cards, $n)
{
    for ($i = $n - 1; $i >= 0; $i--) {
//        $j = rand(0, $i);
        $j = crypto_rand_secure(0, $i);

        $tmp = $cards[$i];
        $cards[$i] = $cards[$j];
        $cards[$j] = $tmp;
    }

    return $cards;
}


function shuffleCardsMD5($cards, $n)
{
    $shuffled = [];

    for ($i = $n - 1; $i >= 0; $i--) {
        $j = md5($i);

        $shuffled[$j] = $i;
    }

    print_r($shuffled);

    ksort($shuffled);

    print_r($shuffled);

    return $shuffled;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

//echo crypto_rand_secure(0, 51);


//shuffleCards($cards, 52);


//print_r(md5(3));

//print_r(shuffleCardsMD5($cards, 52));







