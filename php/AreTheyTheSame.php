<?php

/*
Given two arrays a and b write a function comp(a, b) (compSame(a, b) in Clojure) that checks whether the two arrays have the "same" elements, with the same multiplicities. "Same" means, here, that the elements in b are the elements in a squared, regardless of the order.
Examples
Valid arrays

a = [121, 144, 19, 161, 19, 144, 19, 11]
b = [121, 14641, 20736, 361, 25921, 361, 20736, 361]

comp(a, b) returns true because in b 121 is the square of 11, 14641 is the square of 121, 20736 the square of 144, 361 the square of 19, 25921 the square of 161, and so on. It gets obvious if we write b's elements in terms of squares:

a = [121, 144, 19, 161, 19, 144, 19, 11]
b = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19]

Invalid arrays

If we change the first number to something else, comp may not return true anymore:

a = [121, 144, 19, 161, 19, 144, 19, 11]
b = [132, 14641, 20736, 361, 25921, 361, 20736, 361]

comp(a,b) returns false because in b 132 is not the square of any number of a.

a = [121, 144, 19, 161, 19, 144, 19, 11]
b = [121, 14641, 20736, 36100, 25921, 361, 20736, 361]

comp(a,b) returns false because in b 36100 is not the square of any number of a.
Remarks

a or b might be [] (all languages). a or b might be nil or null or None (except in Haskell, Elixir, C++, Rust).

If a or b are nil (or null or None), the problem doesn't make sense so return false.

If a or b are empty the result is evident by itself.
Note for C

The two arrays have the same size (> 0) given as parameter in function comp.

*/

function comp($a1, $a2) {
    if (is_null($a1) || is_null($a2)) return false;
    sort($a1);
    sort($a2);
    // There is no comparison of arrays, only values.
    // The minimum number of iterations is 1, the maximum is n.
    foreach ($a2 as $key => $value) {
      if($a1[$key] ** 2 !== $value) return false;
    }
    return true;
}

// Еще вариант (первый переработанный. $a1 === null вместо неправильного $a1 == null)
function comp($a1, $a2) {
    if ($a1 === null || $a2 === null) return false;
    // if ($a1 == [] && $a2 == []) return true;
    sort($a1, SORT_NUMERIC);
    sort($a2, SORT_NUMERIC);
    // print_r($a1);
    // print_r($a2);
    foreach ($a2 as $key => $value) {
      if($a1[$key] ** 2 !== $value) return false;
    }
    return true;
}

// чужой лучший вариант
function comp($a1, $a2) {
    if (is_null($a1) || is_null($a2)) return false;
    $aa1 = array_values($a1); $aa2 = array_values($a2);
    sort($aa1); sort($aa2);
    foreach ($aa1 as $i => $___) {
        if (pow($aa1[$i], 2) != $aa2[$i]) return false;
    }
    return true;
}

// $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
// $b1 = [121, 14641, 20736, 361, 25921, 361, 20736, 361];
// // print_r(sort($a1, SORT_NUMERIC)); // true
// var_dump(comp($a1, $b1)); // true
//
// $a2 = [121, 144, 19, 161, 19, 144, 19, 11];
// $b2 = [132, 14641, 20736, 361, 25921, 361, 20736, 361];
// var_dump(comp($a2, $b2)); // false
//
// $a2 = [];
// $b2 = [132, 14641, 20736, 361, 25921, 361, 20736, 361];
// var_dump(comp($a2, $b2)); // false
//
// $a2 = null;
// $b2 = [132, 14641, 20736, 361, 25921, 361, 20736, 361];
// var_dump(comp($a2, $b2)); // false

$a5 = Array
(
    0 => 11,
    1 => 19,
    2 => 19,
    3 => 19,
    4 => 121,
    5 => 144,
    6 => 144,
    7 => 161,
);
$b5 = Array
(
    0 => 121,
    1 => 361,
    2 => 361,
    3 => 14641,
    4 => 20736,
    5 => 20736,
    6 => 25921,
    7 => 36100,
);
// var_dump(comp($a5, $b5)); // false

$a6 = [];
$b6 = null;
var_dump(comp($a6, $b6)); // false
// var_dump(is_null($a6));
// var_dump(is_null($b6));

$a7 = [];
$b7 = [];
var_dump(comp($a7, $b7)); // true



// Test
/*

class AreTheyTheSameTestCases extends TestCase
{
    private function revTest($actual, $expected) {
        $this->assertEquals($expected, $actual);
    }
    public function testBasics() {
        $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
        $a2 = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];
        $this->revTest(comp($a1, $a2), true);
        $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
        $a2 = [11*21, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];
        $this->revTest(comp($a1, $a2), false);
        $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
        $a2 = [11*11, 121*121, 144*144, 190*190, 161*161, 19*19, 144*144, 19*19];
        $this->revTest(comp($a1, $a2), false);
        $a1 = [];
        $a2 = [];
        $this->revTest(comp($a1, $a2), true);
        $a1 = [];
        $a2 = null;
        $this->revTest(comp($a1, $a2), false);
        $a1 = [121, 144, 19, 161, 19, 144, 19, 11, 1008];
        $a2 = [11*11, 121*121, 144*144, 190*190, 161*161, 19*19, 144*144, 19*19];
        $this->revTest(comp($a1, $a2), false);
        $a1 = [10000000, 100000000];
        $a2 = [10000000 * 10000000, 100000000 * 100000000];
        $this->revTest(comp($a1, $a2), true);
        $a1 = [10000001, 100000000];
        $a2 = [10000000 * 10000000, 100000000 * 100000000];
        $this->revTest(comp($a1, $a2), false);
        $a1 = [2, 2, 3];
        $a2 = [4, 9, 9];
        $this->revTest(comp($a1, $a2), false);
    }
    function _compHJ($a1, $a2) {
        if ($a1 == null || $a2 == null) return false;
        $aa1 = array_values($a1); $aa2 = array_values($a2);
        sort($aa1); sort($aa2);
        foreach ($aa1 as $i => $___) {
            if (pow($aa1[$i], 2) != $aa2[$i]) return false;
        }
        return true;
    }

    public function testRandom() {
        for($i = 0; $i < 200; $i++) {
            $testlen = rand(8, 25);
            $a1 = array(); $a2 = array();
            for ($j = 0; $j < $testlen; $j++){
                $elem=rand(0,100);
                array_push($a1, $elem);
                array_push($a2, $elem * $elem);
            }
            $pos = rand(0, count($a2) - 1);
            $a2[$pos] = $a2[$pos] + rand(0, 1);
            $sol = $this->_compHJ($a1, $a2);
            $ans = comp($a1, $a2);
            $this->revTest($ans, $sol);
        }
    }
}
*/
