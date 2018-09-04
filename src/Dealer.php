<?php

namespace PokerHandEval;

class Dealer
{

    public function printCards($cards)
    {
        for ($i = 0; $i < count($cards); $i++) {
            print_r($cards[$i]);
        }
    }

    public function shuffleCards($cards, $n)
    {
        for ($i = $n - 1; $i >= 0; $i--) {
            $j = $this->crypto_rand_secure(0, $i);

            $tmp = $cards[$i];
            $cards[$i] = $cards[$j];
            $cards[$j] = $tmp;
        }

        return $cards;
    }

    private function crypto_rand_secure($min, $max)
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
        }
        while ($rnd > $range);

        return $min + $rnd;
    }


    public function shuffleCardsMD5($cards, $n)
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
}