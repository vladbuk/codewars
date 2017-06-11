<?php

namespace Codewars;

require_once './../Playing_with_passphrases.php';

use function Codewars\playPass;

class ConsecutiveTestCases extends \PHPUnit_Framework_TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics() {
        $this->revTest(playPass("I LOVE YOU!!!", 1), "!!!vPz fWpM J");
        $this->revTest(playPass("I LOVE YOU!!!", 0), "!!!uOy eVoL I");
        $this->revTest(playPass("AAABBCCY", 1), "zDdCcBbB");
        $this->revTest(playPass("MY GRANMA CAME FROM NY ON THE 23RD OF APRIL 2015", 2),
            "4897 NkTrC Hq fT67 GjV Pq aP OqTh gOcE CoPcTi aO");
        $this->revTest(playPass("TO BE HONEST WITH YOU I DON'T USE THIS TEXT TOOL TOO OFTEN BUT HEY... MAYBE YOUR NEEDS ARE DIFFERENT.", 5),
            ".ySjWjKkNi jWf xIjJs wZtD JgDfR ...dJm yZg sJyKt tTy qTtY YcJy xNmY JxZ Y'StI N ZtD MyNb yXjStM Jg tY");
        $this->revTest(playPass("IN 2012 TWO CAMBRIDGE UNIVERSITY RESEARCHERS ANALYSED PASSPHRASES FROM THE AMAZON PAY SYSTEM...", 20),
            "...gYnMsM SuJ HiTuGu yBn gIlZ MyMuLbJmMuJ XyMsFuHu mLyBwLuYmYl sNcMlYpChO YaXcLvGuW IqN 7897 hC");
        $this->revTest(playPass("IN 2012 TWO CAMBRIDGE UNIVERSITY RESEARCHERS ANALYSED PASSPHRASES FROM THE AMAZON PAY SYSTEM...", 10),
            "...wOdCiC IkZ XyJkWk oRd wYbP CoCkBrZcCkZ NoCiVkXk cBoRmBkOcOb iDsCbOfSxE OqNsBlWkM YgD 7897 xS");
        $this->revTest(playPass("1ONE2TWO3THREE4FOUR5FIVE6SIX7SEVEN8EIGHT9NINE", 5), "JsNs0yMlNj1sJaJx2cNx3jAnK4WzTk5jJwMy6tBy7jSt8");
        $this->revTest(playPass("AZ12345678ZA", 1), "bA12345678aB");
        $this->revTest(playPass("!!!VPZ FWPM J", 25), "I LoVe yOu!!!");
        $this->revTest(playPass("BOY! YOU WANTED TO SEE HIM? IT'S YOUR FATHER:-)", 15),
            ")-:gTwIpU GjDn h'iX ?bXw tTh dI StIcPl jDn !NdQ");
        $this->revTest(playPass("FOR THIS REASON IT IS RECOMMENDED THAT PASSPHRASES NOT BE REUSED ACROSS DIFFERENT OR UNIQUE SITES AND SERVICES.", 15),
            ".hTrXkGtH ScP HtIxH TjFxCj gD IcTgTuUxS HhDgRp sThJtG Tq iDc hThPgWeHhPe iPwI StScTbBdRtG Hx iX CdHpTg hXwI GdU");
        $this->revTest(playPass("ONCE UPON A TIME YOU DRESSED SO FINE (1968)", 12), ")1308( qZuR Ae pQeEqDp gAk qYuF M ZaBg qOzA");
        $this->revTest(playPass("AH, YOU'VE GONE TO THE FINEST SCHOOL ALL RIGHT, MISS LONELY", 12),
            "KxQzAx eEuY ,fTsUd xXm xAaToE FeQzUr qTf aF QzAs qH'GaK ,tM");
        $this->revTest(playPass("THE SPECIES, NAMED AFTER THE GREEK GOD OF THE UNDERWORLD, LIVES SOME 3,600 FEET UNDERGROUND.", 8),
            ".LvCwZoZmLvC BmMn 993,6 mUwA AmDqT ,lTzWeZmLvC MpB Nw lWo sMmZo mPb zMbNi lMuIv ,AmQkMxA MpB");
    }

    private function _playPassJJ($s, $n) {
        $res = "";
        for ($i = 0; $i < strlen($s); $i++) {
            $d = $s[$i];
            if (ord($d) >= ord("A") && ord($d) <= ord("Z")) {
                $c = chr((ord($d) - ord("A") + $n) % 26 + ord("A"));
            } else {
                if (ord($d) >= ord("0") && ord($d) <= ord("9")) {
                        $c = chr(105 - ord($d));
                }
                else $c = $s[$i];
            }
            if ($i % 2 == 1)
                $c = strtolower($c);
            else $c = strtoupper($c);
            $res .= $c;
        }
        return strrev($res);
    }

     function doStr($k) {
        $s = ""; $j = 0;
        while ($j < $k) {
            if (rand(0, 10) % 2 == 0)
                $s .= chr(rand(64, 93));
            else $s .= chr(rand(48, 57));
            $j++;
        }
        return $s;
    }

    public function testRandom() {
        for($i = 0; $i < 100; $i++) {
            $s = $this->doStr(rand(30, 80));
            $n = rand(3, 12);
            $sol = $this->_playPassJJ($s, $n);
            $ans = playPass($s, $n);
            //echo $ans."\n";
            $this->revTest($ans, $sol);
        }
    }

}
