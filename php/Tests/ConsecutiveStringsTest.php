<?php

namespace Codewars;

require_once './../ConsecutiveStrings.php';

use function Codewars\longestConsec;

class ConsecutiveTestCases extends \PHPUnit_Framework_TestCase
{

private function revTest($actual, $expected) {
    $this->assertEquals($expected, $actual);
}
public function testBasics() {
    $this->revTest(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], 2), "abigailtheta");
    $this->revTest(longestConsec(["ejjjjmmtthh", "zxxuueeg", "aanlljrrrxx", "dqqqaaabbb", "oocccffuucccjjjkkkjyyyeehh"], 1), "oocccffuucccjjjkkkjyyyeehh");
    $this->revTest(longestConsec([], 3), "");
    $this->revTest(longestConsec(["itvayloxrp","wkppqsztdkmvcuwvereiupccauycnjutlv","vweqilsfytihvrzlaodfixoyxvyuyvgpck"], 2), "wkppqsztdkmvcuwvereiupccauycnjutlvvweqilsfytihvrzlaodfixoyxvyuyvgpck");
    $this->revTest(longestConsec(["wlwsasphmxx","owiaxujylentrklctozmymu","wpgozvxxiu"], 2), "wlwsasphmxxowiaxujylentrklctozmymu");
    $this->revTest(longestConsec(["zone", "abigail", "theta", "form", "libe", "zas"], -2), "");
    $this->revTest(longestConsec(["it","wkppv","ixoyx", "3452", "zzzzzzzzzzzz"], 3), "ixoyx3452zzzzzzzzzzzz");
    $this->revTest(longestConsec(["it","wkppv","ixoyx", "3452", "zzzzzzzzzzzz"], 15), "");
    $this->revTest(longestConsec(["it","wkppv","ixoyx", "3452", "zzzzzzzzzzzz"], 0), "");
}
private function _longestConsecTY($strarr, $k) {
    $n = count($strarr);
    if ($n === 0 || $k > $n || $k <= 0) return "";
    $arr = array_map(function ($u) { return strlen($u);}, $strarr);
    $sm = 0;
    for ($i = 0; $i < $k; $i++)
        $sm += $arr[$i];
    $mx_sm = $sm;
    $mx_nd = $k - 1;
    for ($u = $k; $u < $n;$u++) {
        $sm = $sm + $arr[$u] - $arr[$u - $k];
        if ($sm > $mx_sm) {
            $mx_sm = $sm;
            $mx_nd = $u;
        }
    }
    $start = $mx_nd - $k + 1;
    return implode("", array_slice($strarr, $start, $k));
}
private function doEx($k) {
    $a1 = array();
    $i = 0;
    while ($i < $k) {
        $res = "";
        $j = 0;
        while ($j < rand(6, 25)) {
            $n = rand(97, 122);
            $res .= chr($n);
            $j += 1;
        }
        array_push($a1, $res);
        $i += 1;
    }
    return $a1;
}
public function testRandom() {
    for($i = 0; $i < 100; $i++) {
        $s1 = $this->doEx(rand(10, 50));
        //print_r($s1);
        $k = rand(0, count($s1) + 2);
        $sol = $this->_longestConsecTY($s1, $k);
        $ans = longestConsec($s1, $k);
        //echo $ans."\n";
        $this->revTest($ans, $sol);
    }
}
}
